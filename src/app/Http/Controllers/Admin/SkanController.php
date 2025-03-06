<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QkCodeRequest;
use App\Models\Participant;
use App\Models\Presence;

class SkanController extends Controller
{
    public function index()
    {
        return view("admin.skan.index");
    }
    public function store(QkCodeRequest $request)
    {
        $qk_code = $request->qk_code;

        $cleaned = substr($qk_code, 7);

        $participant = Participant::where('qk_code', $cleaned)->first();

        if ($participant) {

            Presence::create([
                'participant_id' => $participant->id,
                'date'           => date('Y-m-d'),
            ]);

            return view('admin.skan.index', ['participant' => $participant]);
        }
        return view('admin.skan.index', ['errorMessage' => getTranslation('scanner_messages')]);
    }
}
