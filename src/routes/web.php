<?php

use App\Http\Controllers\Admin\ApplicationController as AdminAppController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\TournamentController;
use App\Http\Controllers\Admin\TranslationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\EmailVerifyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrController;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\CheckEmailSession;
use App\Http\Middleware\LangMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(LangMiddleware::class)->group(function () {

    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('loginSubmit');
    Route::get('/registr', [RegistrController::class, 'index'])->name('registr');
    Route::post('/registr', [RegistrController::class, 'registr'])->name('registrSubmit');

    Route::get('/application/{application}', [IndexController::class, 'application'])->name('application');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('application.store');
    Route::get('/applications-additional', [ApplicationController::class, 'createAdditional'])->middleware(CheckEmailSession::class)->name('application.additional');
    Route::post('/applications-additional', [ApplicationController::class, 'storeAdditional'])->middleware(CheckEmailSession::class)->name('application.store.additional');

    Route::get('/verify-email', [EmailVerifyController::class, 'showVerifyForm'])->name('verify.email');
    Route::post('/verify-email', [EmailVerifyController::class, 'verifyEmailCode'])->name('verify.email.post');

    Route::get('/verify-code', [EmailVerifyController::class, 'codeForm'])->name('verify.code');
    Route::post('/verify-code', [EmailVerifyController::class, 'verifyCode'])->name('verify.code.post');

    Route::get('/lang/{lang}', [IndexController::class, 'changeLanguage'])->name('change.language');

    Route::prefix('dashboard')->middleware(['auth'])->group(function () {

        Route::resource('/tournaments', TournamentController::class);
        Route::resource('/users', UserController::class);
        Route::resource('/languages', LanguageController::class);
        Route::resource('/translations', TranslationController::class);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/news', NewsController::class);
        Route::resource('/hotels', HotelController::class);
        Route::resource('/contacts', ContactController::class);

        Route::get('/news-status/{hotel}', [NewsController::class, 'status'])->name('news.status');
        Route::get('/hotels-status/{hotel}', [HotelController::class, 'status'])->name('hotels.status');
        Route::get('/contacts-status/{contacts}', [ContactController::class, 'status'])->name('contacts.status');
        Route::get('/language-status/{language}', [LanguageController::class, 'status'])->name('language.status');
        Route::get('/users-status/{user}', [UserController::class, 'status'])->name('users.status');

        Route::get('/tournament/{tournament}/{status}', [TournamentController::class, 'statusUpdate'])->name('status.update');
        Route::get('/applications', [AdminAppController::class, 'index'])->name('application.index');
        Route::get('/applications-status/{participant}/{ststus}', [AdminAppController::class, 'status'])->name('application.status');
        Route::post('/applications-cancel/{participant}', [AdminAppController::class, 'cancel'])->name('application.cancel');

    });

});
