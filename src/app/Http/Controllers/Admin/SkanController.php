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
        $qkCode = $request->qk_code;

        $domain = request()->getSchemeAndHttpHost() . '/badge-verify';

        $cleaned = substr($qkCode, 7);

        $cleaned = str_replace($domain . '/', '', $cleaned);

        $participant = Participant::where('qk_code', $cleaned)->first();

        if ($participant) {

            Presence::create([
                'participant_id' => $participant->id,
            ]);

            return view('admin.skan.index', ['participant' => $participant]);
        }
        return view('admin.skan.index', ['errorMessage' => getTranslation('scanner_messages')]);
    }
}
