<?php

use App\Http\Controllers\Front\DonationRequestController;
use App\Http\Controllers\Front\FavoriteController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/contact-us', 'contactUs')->name('contact-us');
    Route::get('/who-are-us', 'whoAreUs')->name('who-are-us');
    Route::get('/donation-requests', 'donationRequest')->name('donation-request');
    Route::get('/donation-request-details/{donationRequest}', 'insideRequest')->name('inside.request');
    Route::get('/articles', 'article')->name('articles');
    Route::get('/article/{post}', 'showArticle')->name('article-details');
    Route::get('/about', 'about')->name('about');
    Route::get('/', 'index')->name('home');
});

Route::middleware('auth:client')->group(function () {

    Route::controller(ProfileController::class)->prefix('/profile')->name('profile.')->group(function () {
        Route::get('/', 'show')->name('show');
        Route::put('/', 'update')->name('update');
    });

    Route::controller(FavoriteController::class)->prefix('favorites')->name('favorite.')->
            group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/{post}', 'toggle')->name('toggle');
    });

    Route::controller(DonationRequestController::class)->name('donation-request.')->group(function () {
        Route::get('/ask-donation', 'create')->name('create');
        Route::post('/ask-donation', 'store')->name('store');
    });
});

Route::view('front/login', 'front.login')->name('front.Sign-in.login');

Route::controller(LoginController::class)->name('front.')->group(function () {
    Route::post('register-account', 'register')->name('register.store');
    Route::get('create-account', 'showRegistrationForm')->name('register');
    Route::post('Sign-in', 'login')->name('login');
    Route::post('Sign-Out', 'authLogout')->name('logout');
    Route::get('password/reset', 'showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
    Route::post('password/reset', 'reset')->name('password.update');
});
