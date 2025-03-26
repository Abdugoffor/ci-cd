<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckApplicationRequest;
use App\Models\Participant;

class ChackApplication extends Controller
{
    public function chack()
    {
        return view('client.chack');
    }
    public function search(CheckApplicationRequest $request)
    {
        $id = $request->participant_id;

        $key = $request->key;
        
        $participant = Participant::where('id', $id)->where('key', $key)->first();

        if ($participant) {
            return view('client.chack', ['participant' => $participant]);
        } else {
            return back()->withErrors(['key' => __('lang.invalid_key')]);
        }

    }
}
