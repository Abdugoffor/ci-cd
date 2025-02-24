<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrRequest;
use App\Jobs\VerifyEmailJob;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegistrController extends Controller
{
    public function index()
    {
        return view('auth.registr');
    }
    public function registr(RegistrRequest $request)
    {
        $user = User::create($request->all());

        Auth::login($user);

        $verificationCode = rand(100000, 999999);

        cache()->put('email_verification_' . $user->email, $verificationCode, now()->addMinutes(3));

        dispatch(new VerifyEmailJob($verificationCode));
        
        return redirect()->route('verify.code');
    }
}
