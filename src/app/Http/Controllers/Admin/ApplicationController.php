<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ApporveEmailJob;
use App\Models\AccreditationCategory;
use App\Models\ApplicationCancellation;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ApplicationController extends Controller
{
    public function index()
    {
        $accreditationCategories = AccreditationCategory::all();
        $models                  = Participant::orderBy('id', 'desc')->paginate(perPage: 10);

        return view("admin.applications.index", ['models' => $models, 'accreditationCategories' => $accreditationCategories]);
    }
    public function search(Request $request)
    {
        $query = Participant::query();

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
            $qk_code = $participant->id . '$' . Str::random(70);

            $participant->update([
                'status'  => $status,
                'qk_code' => $qk_code,
            ]);

            $qrCodePath = 'qrcodes/qk_code_' . time() . '_' . $participant->id . '.svg';

            if (! file_exists(public_path('qrcodes'))) {
                mkdir(public_path('qrcodes'), 0777, true);
            }

            file_put_contents(public_path($qrCodePath), QrCode::format('svg')->size(300)->generate($qk_code));

            if (file_exists(public_path($qrCodePath))) {
                // return view('send_messages', ['qrCodePath' => $qrCodePath]);

                // dd(file_get_contents(public_path($qrCodePath)), ($qrCodePath));

                // $qrCodePath = file_get_contents(public_path($qrCodePath));

                dispatch(new ApporveEmailJob($participant->email, $qrCodePath));
            }

        }

        return back();
    }
    public function cancel(Request $request, Participant $participant)
    {
        ApplicationCancellation::create([
            'participant_id' => $participant->id,
            'cancel_reason'  => $request->cancel_reason,
        ]);

        $participant->update(['status' => 'canceled']);

        dispatch(new ApporveEmailJob($participant->email, $request->cancel_reason));

        return back();
    }

}
