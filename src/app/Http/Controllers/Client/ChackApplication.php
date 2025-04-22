<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckApplicationRequest;
use App\Models\AccreditationCategory;
use App\Models\Country;
use App\Models\Hotel;
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

            session()->put('participant_key', $participant->key);

            return view('client.chack', ['participant' => $participant]);
        } else {
            return back()->withErrors(['key' => getTranslation('invalid_key')])->withInput();
        }
    }

    public function participantEdit(Participant $participant)
    {
        if ($participant->status != 'approved') {

            $isRegistrationActive = $participant->tournament()
                ->where('registration_start', '<=', now())
                ->where('registration_end', '>=', now())
                ->exists();

            if ($isRegistrationActive) {

                if (in_array($participant->status, ['unfinished', 'pending', 'canceled'])) {
                    
                    if (session()->has('participant_key') && session()->get('participant_key') == $participant->key) {

                        $countries = Country::all();

                        $accreditationCategories = AccreditationCategory::where('is_active', true)->get();

                        $hotels = Hotel::where('is_active', true)->get();

                        return view('client.applications.additional', ['model' => $participant, 'hotels' => $hotels, 'notification' => getTranslation('notification'), 'countries' => $countries, 'accreditationCategories' => $accreditationCategories]);
                    }

                    return back()->withErrors('notification', "Turnir ro‘yxatdan o‘tish davri faol emas.");
                }
                return back()->withErrors('notification', "Turnir ro‘yxatdan o‘tish davri faol emas.");
            }
        } else {
            return back()->withErrors('notification', "Turnir ro‘yxatdan o‘tish davri faol emas.");
        }
    }
}
