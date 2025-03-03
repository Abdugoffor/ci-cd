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
    public function search(Request $request)
    {
        $models = Participant::query();

        if ($request->filled('first_name')) {
            $models->where('first_name', 'like', "%{$request->first_name}%");
        }

        if ($request->filled('fide_id')) {
            $models->orWhere('fide_id', 'like', "%{$request->fide_id}%");
        }

        if ($request->filled('accreditation_category_id')) {
            $models->orWhere('accreditation_category_id', $request->accreditation_category_id);
        }

        if ($request->filled('date_of_birth')) {
            $models->orWhere('date_of_birth', $request->date_of_birth);
        }

        if ($request->filled('email')) {
            $models->orWhere('email', 'like', "%{$request->email}%");
        }

        if ($request->filled('updated_at')) {
            $models->whereDate('updated_at', $request->updated_at);
        }

        if ($request->filled('status')) {
            $models->orWhere('status', $request->status);
        }

        $models = $models->paginate(10);

        $accreditationCategories = AccreditationCategory::all();
        return view("admin.applications.index", [
            'models'                  => $models,
            'accreditationCategories' => $accreditationCategories,
        ]);
    }

}
