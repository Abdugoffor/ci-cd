<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckApplicationRequest;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChackApplication extends Controller
{
    public function chack()
    {
        return view('client.chack');
    }
    public function search(CheckApplicationRequest $request)
    {
        $id = $request->participant_id;
        
        $participant = Participant::where('id', $id)->first();

        if (Hash::check($request->key, $participant->key)) {
            return view('client.chack', ['participant' => $participant]);
        } else {
            return back()->withErrors(['key' => __('lang.invalid_key')]);
        }
        
    }
}
