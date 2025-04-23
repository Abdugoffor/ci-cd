<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(getTranslation('home'), route('home', ['lang' => app()->getLocale()]));
});

// Offer (Aferta)
Breadcrumbs::for('aferta', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(getTranslation('aferta'), route('aferta', ['lang' => app()->getLocale()]));
});

// Check Application
Breadcrumbs::for('chack.application', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(getTranslation('action_button'), route('chack.application', ['lang' => app()->getLocale()]));
});

// Check Application Search
Breadcrumbs::for('chack.application.srach', function (BreadcrumbTrail $trail) {
    $trail->parent('chack.application');
    $trail->push('Search', route('chack.application.srach', ['lang' => app()->getLocale()]));
});

// Content Page
Breadcrumbs::for('page.index', function (BreadcrumbTrail $trail, $content) {
    $trail->parent('home');
    $title = is_object($content) && isset($content->title) ? getLocale($content->title) : 'Content';
    $id = is_object($content) && isset($content->id) ? $content->id : ($content ?? 'unknown');
    $trail->push($title, route('page.index', ['lang' => app()->getLocale(), 'content' => $id]));
});

// Hotel Single
Breadcrumbs::for('hotel.index', function (BreadcrumbTrail $trail, $hotel) {
    $trail->parent('home');
    $trail->push(getTranslation('hotels'), route('hotel.all', ['lang' => app()->getLocale()]));
    $title = is_object($hotel) && isset($hotel->title) ? getLocale($hotel->title) : 'Hotel';
    $id = is_object($hotel) && isset($hotel->id) ? $hotel->id : ($hotel ?? 'unknown');
    $trail->push($title, route('hotel.index', ['lang' => app()->getLocale(), 'hotel' => $id]));
});

// All Hotels
Breadcrumbs::for('hotel.all', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(getTranslation('hotels'), route('hotel.all', ['lang' => app()->getLocale()]));
});

// Latest News
Breadcrumbs::for('news.latest', function (BreadcrumbTrail $trail, $currentNews) {
    $trail->parent('home');
    $trail->push(getTranslation('news'), route('news.all', ['lang' => app()->getLocale()]));
    $title = is_object($currentNews) && isset($currentNews->title) ? getLocale($currentNews->title) : 'Latest News';
    $id = is_object($currentNews) && isset($currentNews->id) ? $currentNews->id : ($currentNews ?? 'unknown');
    $trail->push($title, route('news.latest', ['lang' => app()->getLocale(), 'currentNews' => $id]));
});

// All News
Breadcrumbs::for('news.all', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(getTranslation('news'), route('news.all', ['lang' => app()->getLocale()]));
});

// All FAQs
Breadcrumbs::for('faq.all', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(getTranslation('faqs'), route('faq.all', ['lang' => app()->getLocale()]));
});

// no lang

// Home
// Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
//     $trail->push(getTranslation('home'), route('home'));
// });


// // Offer (Aferta)
// Breadcrumbs::for('aferta', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push(getTranslation('aferta'), route('aferta'));
// });

// // Check Application
// Breadcrumbs::for('chack.application', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push(getTranslation('action_button'), route('chack.application'));
// });

// // Check Application Search
// Breadcrumbs::for('chack.application.srach', function (BreadcrumbTrail $trail) {
//     $trail->parent('chack.application');
//     $trail->push('Search', route('chack.application.srach'));
// });

// // Content Page
// Breadcrumbs::for('page.index', function (BreadcrumbTrail $trail, $content) {
//     $trail->parent('home');
//     $trail->push(getLocale($content['content']->title) ?? 'Content', route('page.index', $content));
// });

// // Hotel Single
// Breadcrumbs::for('hotel.index', function (BreadcrumbTrail $trail, $hotel) {
//     $trail->parent('home');
//     $trail->push(getTranslation('hotels'), route('hotel.all'));
//     $trail->push(getLocale($hotel['hotel']->title) ?? 'Hotel', route('hotel.index', $hotel));
// });

// // All Hotels
// Breadcrumbs::for('hotel.all', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push(getTranslation('hotels'), route('hotel.all'));
// });

// // Latest News
// Breadcrumbs::for('news.latest', function (BreadcrumbTrail $trail, $currentNews) {
//     $trail->parent('home');
//     $trail->push(getTranslation('news'), route('news.all'));

//     $trail->push(getLocale($currentNews['currentNews']->title) ?? 'Latest News', route('news.latest', $currentNews));
// });

// // All News
// Breadcrumbs::for('news.all', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push(getTranslation('news'), route('news.all'));
// });

// // All FAQs
// Breadcrumbs::for('faq.all', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push(getTranslation('faqs'), route('faq.all'));
// });

// no lang


// ishlatilmaydiganlar

// Application
// Breadcrumbs::for('application', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Application', route('application'));
// });



// Application Verify Email
// Breadcrumbs::for('application.verify.email', function (BreadcrumbTrail $trail, $model, $message) {
//     $trail->parent('application');
//     $trail->push('Verify Email', route('application.verify.email', [$model, $message]));
// });

// Login
// Breadcrumbs::for('login', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Login', route('login'));
// });

// Change Language
// Breadcrumbs::for('change.language', function (BreadcrumbTrail $trail, $lang) {
//     $trail->parent('home');
//     $trail->push('Change Language', route('change.language', $lang));
// });

// Verify Email Form
// Breadcrumbs::for('verify.email', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Verify Email', route('verify.email'));
// });

// Verify Code Form
// Breadcrumbs::for('verify.code', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Verify Code', route('verify.code'));
// });

// Verify Code with Participant
// Breadcrumbs::for('verify.code.post', function (BreadcrumbTrail $trail, $participant) {
//     $trail->parent('verify.code');
//     $trail->push('Verification', route('verify.code.post', $participant));
// });

// Badge Verify
// Breadcrumbs::for('badges.verify', function (BreadcrumbTrail $trail, $badges) {
//     $trail->parent('home');
//     $trail->push('Badge Verification', route('badges.verify', $badges));
// });
