<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckApplicationRequest;
use App\Models\Participant;

class ChackApplication extends Controller
{
    public function chack()
    {
        return view('client.chack', ['notification' => getTranslation('chack_application')]);
    }
    public function search(CheckApplicationRequest $request)
    {
        $id = $request->participant_id;

        $key = $request->key;

        $participant = Participant::where('id', $id)->where('key', $key)->first();

        if ($participant) {
            return view('client.chack', ['participant' => $participant]);
        } else {
            return back()->withErrors(['key' => getTranslation('invalid_key')])->withInput();
        }
    }

    public function participantEdit(Participant $participant)
    {
        $isRegistrationActive = $participant->tournament()
            ->where('registration_start', '<=', now())
            ->where('registration_end', '>=', now())
            ->exists();

        if ($isRegistrationActive) {
            if ($participant->status != 'approved') {
                if (in_array($participant->status, ['unfinished', 'pending', 'canceled'])) {
                    dd($participant->tournament);
                }
            }
        } else {
            return back()->withErrors('notification', "Turnir ro‘yxatdan o‘tish davri faol emas.");
        }
    }
}
