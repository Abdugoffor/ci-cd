<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (auth()->attempt($request->only('email', 'password'))) {
            
            $user = auth()->user();
            
            isActive();
            
            if (in_array($user->role, ['admin', 'user', 'moderator'])) {

                return redirect()->route('application.index');
            }

            return redirect()->route('support-applications.index');
        }

        return back()->withErrors(['email' => 'Email yoki parol noto‘g‘ri']);
    }
}
