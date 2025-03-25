<?php
namespace App\Http\Controllers\Admin;

use App\Exports\ParticipantExport;
use App\Http\Controllers\Controller;
use App\Jobs\Client\CencelAppJob;
use App\Jobs\Client\SuccessAppJob;
use App\Models\AccreditationCategory;
use App\Models\ApplicationCancellation;
use App\Models\Participant;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ApplicationController extends Controller
{
    public function index()
    {
        $accreditationCategories = AccreditationCategory::all();

        $models = Participant::orderBy('id', 'desc')->paginate(perPage: 10);

        return view("admin.applications.index", ['models' => $models, 'accreditationCategories' => $accreditationCategories]);
    }
    public function search(Request $request)
    {
        $query = Participant::query();

        if ($request->filled('id')) {
            $query->where('id', 'LIKE', "%{$request->id}%");
        }

        if ($request->filled('first_name')) {
            $query->where('first_name', 'LIKE', "%{$request->first_name}%");
        }

        if ($request->filled('fide_id')) {
            $query->where('fide_id', 'LIKE', "%{$request->fide_id}%");
        }

        if ($request->filled('accreditation_category_id')) {
            $query->where('accreditation_category_id', $request->accreditation_category_id);
        }

        if ($request->filled('date_of_birth')) {
            $query->where('date_of_birth', $request->date_of_birth);
        }

        if ($request->filled('email')) {
            $query->where('email', 'LIKE', "%{$request->email}%");
        }

        if ($request->filled('updated_at')) {
            $query->whereDate('updated_at', $request->updated_at);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $models = $query->paginate(10);
        $models->appends($request->only([
            'id',
            'first_name',
            'fide_id',
            'accreditation_category_id',
            'date_of_birth',
            'email',
            'updated_at',
            'status',
        ]));

        $accreditationCategories = AccreditationCategory::all();

        return view("admin.applications.index", [
            'models'                  => $models,
            'accreditationCategories' => $accreditationCategories,
        ]);
    }
    public function status(Participant $participant, string $status)
    {
        if ($status == 'approved') {

            if ($participant->status != $status) {

                $qkCode = $participant->id . Str::random(70);

                $participant->update([
                    'status'  => $status,
                    'qk_code' => $qkCode,
                ]);
            }

            $domain = request()->getSchemeAndHttpHost();

            $qk_code_url = "{$domain}/badge-verify/{$participant->qk_code}";

            $qrCode = QrCode::create($qk_code_url)
                ->setSize(300)
                ->setMargin(5);

            $result = (new PngWriter())->write($qrCode);

            $fileName = "qrcode_{$participant->id}.png";
            $filePath = "qrcodes/{$fileName}";

            $fullFilePath = public_path($filePath);

            $dirPath = dirname($fullFilePath);

            if (! is_dir($dirPath)) {
                mkdir($dirPath, 0777, true);
            }

            file_put_contents($fullFilePath, $result->getString());

            $participant->update([
                'qk_code_path' => $filePath,
            ]);

            $data = [
                'participant'  => $participant,
                'auth'         => Auth::user()->name,
                'fullFilePath' => $fullFilePath,
            ];

            dispatch(new SuccessAppJob($data));
        }

        return back()->with('notification', getTranslation('notification'));
    }

    public function show(Participant $participant)
    {
        return view('admin.applications.show', ['model' => $participant]);
    }
    public function cancel(Request $request, Participant $participant)
    {
        ApplicationCancellation::create([
            'participant_id' => $participant->id,
            'cancel_reason'  => $request->cancel_reason,
        ]);

        $participant->update([
            'status'  => 'canceled',
            'qk_code' => null,
        ]);
        $data = [
            'participant'   => $participant,
            'auth'          => Auth::user()->name,
            'cancel_reason' => $request->cancel_reason,
        ];
        dispatch(new CencelAppJob($data));

        return back()->with('notification', getTranslation('notification'));
    }

    public function participantExport()
    {
        return Excel::download(new ParticipantExport, 'participants.xlsx');
    }

}
