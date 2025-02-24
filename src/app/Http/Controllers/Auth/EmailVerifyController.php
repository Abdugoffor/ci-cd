<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailCodeRequest;
use Illuminate\Http\Request;

class EmailVerifyController extends Controller
{
    public function showVerifyForm()
    {
        return view('auth.email');
    }
    public function codeForm()
    {
        return view('auth.verify_email');
    }
    public function verifyCode(EmailCodeRequest $request)
    {
        $code = $request->code;

        $user = auth()->user()->email;

        $cachedCode = cache()->get('email_verification_' . $user->email);

        if ($cachedCode != $code) {
            return redirect()->back()->withErrors(['code' => __('lang.invalid_code')]);
        }
        
        $user->update(['email_verified_at' => now()]);

        return redirect()->route('admin');
    }
}
