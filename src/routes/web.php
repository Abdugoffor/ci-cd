<?php

use App\Http\Controllers\Admin\TournamentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\EmailVerifyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrController;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\LangMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginSubmit');
Route::get('/registr', [RegistrController::class, 'index'])->name('registr');
Route::post('/registr', [RegistrController::class, 'registr'])->name('registrSubmit');

Route::get('/application/{application}', [IndexController::class, 'application'])->name('application');
Route::post('/applications', [ApplicationController::class, 'store'])->name('application.store');
Route::get('/applications-additional/{application}', [ApplicationController::class, 'createAdditional'])->name('application.additional');
Route::post('/applications-additional/{application}', [ApplicationController::class, 'storeAdditional'])->name('application.store.additional');

Route::get('/verify-email', [EmailVerifyController::class, 'showVerifyForm'])->name('verify.email');
Route::post('/verify-email', [EmailVerifyController::class, 'verifyEmailCode'])->name('verify.email.post');

Route::get('/verify-code', [EmailVerifyController::class, 'codeForm'])->name('verify.code');
Route::post('/verify-code', [EmailVerifyController::class, 'verifyCode'])->name('verify.code.post');

Route::prefix('dashboard')->middleware(LangMiddleware::class)->group(function () {
    Route::resource('/tournament', TournamentController::class);
});
