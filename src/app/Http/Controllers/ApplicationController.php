<?php
namespace App\Http\Controllers;

use App\Http\Requests\ApplicationStoreRequest;
use App\Jobs\VerifyEmailJob;
use App\Models\Participant;

class ApplicationController extends Controller
{
    public function store(ApplicationStoreRequest $request)
    {
        $models = Participant::create($request->all());

        $verificationCode = rand(100000, 999999);

        cache()->put('email_verification_' . $models->email, $verificationCode, now()->addMinutes(5));

        dispatch(new VerifyEmailJob($models->email, $verificationCode));

        return view('auth.verify_email', ['email' => $models->email]);
    }
}
