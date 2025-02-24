<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmailCodeRequest;

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
        $code  = $request->code;
        $email = $request->email;

        $cachedCode = cache()->get('email_verification_' . $email);

        if ($cachedCode != $code) {

            return redirect()->back()->withErrors(['code' => __('lang.invalid_code')]);
        } else {
            dd($code, $email, $cachedCode);
        }

        // return redirect()->route('admin');
    }
}
