<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Container\Attributes\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        Auth()->attempt($request->only('email', 'password'));

        isActive();
        if (auth()->user()->role == 'admin' || auth()->user()->role == 'user' || auth()->user()->role == 'moderator') {

            return redirect()->route('application.index');
        }
        return redirect()->route('support-applications.index');
    }
}
