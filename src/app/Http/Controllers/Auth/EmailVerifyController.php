<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmailCodeRequest;
use App\Jobs\SendPassword;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmailVerifyController extends Controller
{
    public function showVerifyForm()
    {
        return view('auth.email');
    }

    public function verifyEmailCode(Request $request)
    {
        $email            = $request->email;
        $user             = User::where('email', $email)->first();
        $verificationCode = Str::random(8);
        if ($user) {
            $user->update(['password' => Hash::make($verificationCode)]);
            dispatch(new SendPassword($email, $verificationCode));
        }
        return redirect()->route('login');
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

        $model = Participant::where('email', $email)->orderBy('id', 'desc')->first();

        if ($cachedCode != $code || ! $model) {

            return redirect()->back()->withErrors(['code' => __('lang.invalid_code')]);
        }

        $model->update(['email_verified_at' => now()]);

        return redirect()->route('application.additional');
    }
}
