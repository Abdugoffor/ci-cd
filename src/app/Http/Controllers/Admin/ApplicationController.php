<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ApporveEmailJob;
use App\Models\ApplicationCancellation;
use App\Models\Participant;
use App\Traits\SearchColumTranslations;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected $searhcModel = Participant::class;
    protected $path = "applications";
    use SearchColumTranslations;

    public function index()
    {
        $models = Participant::orderBy('id', 'desc')->paginate(perPage: 10);

        return view("admin.applications.index", ['models' => $models]);
    }
    public function status(Participant $participant, string $status)
    {
        if ($status == 'approved') {
            $participant->update(['status' => $status]);
        }

        dispatch(new ApporveEmailJob($participant->email));

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
