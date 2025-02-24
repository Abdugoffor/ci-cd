<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmailCodeRequest;
use App\Models\Participant;

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
        $email = $request->email;

        $cachedCode = cache()->get('email_verification_' . $email);

        $model = Participant::where('email', $email)->first();

        if ($cachedCode != $code || !$model) {

            return redirect()->back()->withErrors(['code' => __('lang.invalid_code')]);
        }

        $model->update(['email_verified_at' => now()]);

        return redirect()->route('application.additional', ['application' => $model->id]);
    }
}
