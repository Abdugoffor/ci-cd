<?php

use App\Http\Controllers\Admin\AccreditationCategoryController;
use App\Http\Controllers\Admin\AfertaController;
use App\Http\Controllers\Admin\ApplicationController as AdminAppController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MenyuController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SkanController;
use App\Http\Controllers\Admin\TournamentController;
use App\Http\Controllers\Admin\TranslationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailVerifyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client\ApplicationController;
use App\Http\Controllers\Client\BadgesController;
use App\Http\Controllers\Client\ChackApplication;
use App\Http\Controllers\Client\HotelController as ClientHotelController;
use App\Http\Controllers\Client\IndexController;
use App\Http\Controllers\Client\NewsController as ClientNewsController;
use App\Http\Controllers\Client\PageController;
use App\Http\Controllers\Client\PresenceController;
use App\Http\Middleware\CheckEmailSession;
use App\Http\Middleware\LangMiddleware;
use App\Models\Page;
use Illuminate\Support\Facades\Route;

Route::middleware(LangMiddleware::class)->group(function () {

    Route::get('/', [IndexController::class, 'index'])->name('home');

    Route::get('/application/{tournament}', [ApplicationController::class, 'application'])->name('application');
    Route::get('/applications-verify-email/{model}/{message}', [ApplicationController::class, 'applicationVerifyEmail'])->name('application.verify.email');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('application.store');
    Route::get('/aferta', [ApplicationController::class, 'aferta'])->name('aferta');

    Route::get('/applications-additional/{model}', [ApplicationController::class, 'createAdditional'])->middleware(CheckEmailSession::class)->name('application.additional');
    Route::post('/applications-additional/{model}', [ApplicationController::class, 'storeAdditional'])->middleware(CheckEmailSession::class)->name('application.store.additional');

    Route::get('/chack-application', [ChackApplication::class, 'chack'])->name('chack.application');
    Route::get('/chack-application-srach', [ChackApplication::class, 'search'])->name('chack.application.srach');

    Route::get('/page/{page}', [PageController::class, 'index'])->name('page.index');
    Route::get('/hotel/{hotel}', [ClientHotelController::class, 'index'])->name('hotel.index');
    Route::get('/news-latest/{currentNews}', [ClientNewsController::class, 'index'])->name('news.latest');

    Route::get('/admin', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('loginSubmit');

    Route::get('/lang/{lang}', [IndexController::class, 'changeLanguage'])->name('change.language');

    Route::get('/verify-email', [EmailVerifyController::class, 'showVerifyForm'])->name('verify.email');
    Route::post('/verify-email', [EmailVerifyController::class, 'verifyEmailCode'])->name('verify.email.post');

    Route::get('/verify-code', [EmailVerifyController::class, 'codeForm'])->name('verify.code');
    Route::get('/verify-code/{participant}', [EmailVerifyController::class, 'verifyCode'])->name('verify.code.post');

    Route::prefix('dashboard')->middleware(['auth'])->group(function () {

        Route::get('/profile', [AuthController::class, 'edit'])->name('profile.edit');
        Route::post('/profile', [AuthController::class, 'update'])->name('profile.update');
        Route::post('/profile/logout', [AuthController::class, 'logout'])->name('profile.logout');

        Route::middleware(['role:admin'])->group(function () {

            Route::resource('/users', UserController::class);
            Route::get('/users-status/{user}', [UserController::class, 'status'])->name('users.status');
            Route::get('/users-search', [UserController::class, 'search'])->name('users.search');
        });

        Route::middleware(['role:admin,moderator'])->group(function () {

            Route::resource('/tournaments', TournamentController::class);
            Route::get('/tournament/{tournament}/{status}', [TournamentController::class, 'statusUpdate'])->name('status.update');
            Route::get('/tournaments-search', [TournamentController::class, 'search'])->name('tournaments.search');

            Route::resource('/accreditation-categories', AccreditationCategoryController::class);
            Route::get('/accreditation-categories-status/{category}', [AccreditationCategoryController::class, 'status'])->name('accreditation-categories.status');
            Route::get('/accreditation-categories-show/{accreditation_category}', [AccreditationCategoryController::class, 'show'])->name('accreditation-categories.show');
            Route::get('/accreditation-categories-search', [AccreditationCategoryController::class, 'search'])->name('accreditation-categories.search');

            Route::resource('/categories', CategoryController::class);
            Route::get('/categories-status/{category}', [CategoryController::class, 'status'])->name('categories.status');
            Route::get('/categories-search', [CategoryController::class, 'search'])->name('categories.search');

            Route::resource('/languages', LanguageController::class);
            Route::get('/language-status/{language}', [LanguageController::class, 'status'])->name('language.status');
            Route::get('/languages-search', [LanguageController::class, 'search'])->name('languages.search');

            Route::resource('/translations', TranslationController::class);
            Route::get('/translations-search', [TranslationController::class, 'search'])->name('translations.search');

            Route::resource('/menus', MenyuController::class);
            Route::get('/menus-status/{menyu}', [MenyuController::class, 'status'])->name('menus.status');
            Route::get('/menus-search', [MenyuController::class, 'search'])->name('menus.search');

            Route::resource('/hotels', HotelController::class);
            Route::get('/hotels-search', [HotelController::class, 'search'])->name('hotels.search');

            Route::resource('/aferta', AfertaController::class);
            Route::get('/aferta-search', [AfertaController::class, 'search'])->name('aferta.search');

            Route::resource('/news', NewsController::class);
            Route::get('/news-search', [NewsController::class, 'search'])->name('news.search');

            Route::resource('/pages', AdminPageController::class);
            Route::get('/pages-search', [AdminPageController::class, 'search'])->name('pages.search');

            Route::resource('/partners', PartnerController::class);
            Route::get('/partners-search', [PartnerController::class, 'search'])->name('partners.search');

            Route::resource('/contacts', ContactController::class);
            Route::get('/contacts-search', [ContactController::class, 'search'])->name('contacts.search');

            Route::resource('/media', MediaController::class);

            Route::get('/media-search', [MediaController::class, 'search'])->name('media.search');

        });

        Route::middleware(['role:admin,moderator,user'])->group(function () {

            Route::get('/applications', [AdminAppController::class, 'index'])->name('application.index');
            Route::get('/applications-status/{participant}/{ststus}', [AdminAppController::class, 'status'])->name('application.status');
            Route::post('/applications-cancel/{participant}', [AdminAppController::class, 'cancel'])->name('application.cancel');
            Route::get('/applications-show/{participant}', [AdminAppController::class, 'show'])->name('application.show');
            Route::get('/applications-search', [AdminAppController::class, 'search'])->name('application.search');
            Route::get('/participant-export', [AdminAppController::class, 'participantExport'])->name('participant.export');

            Route::get('/skan', [SkanController::class, 'index'])->name('skan.index');
            Route::post('/skan', [SkanController::class, 'store'])->name('skan.store');
            Route::get('/presence', [PresenceController::class, 'index'])->name('presence.index');
        });

    });

    Route::get('/badge-verify/{badges}', [BadgesController::class, 'verify'])->name('badges.verify');

});
