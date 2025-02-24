<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrController;
use App\Http\Controllers\Auth\EmailVerifyController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('layouts.admin');
})->name('admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginSubmit');
Route::get('/registr', [RegistrController::class, 'index'])->name('registr');
Route::post('/registr', [RegistrController::class, 'registr'])->name('registrSubmit');

Route::get('/verify-email', [EmailVerifyController::class, 'showVerifyForm'])->name('verify.email');
Route::post('/verify-email', [EmailVerifyController::class, 'verifyEmailCode'])->name('verify.email.post');

Route::get('/verify-code', [EmailVerifyController::class, 'codeForm'])->name('verify.code');
Route::post('/verify-code', [EmailVerifyController::class, 'verifyCode'])->name('verify.code.post');

