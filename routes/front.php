<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/contact-us', 'contactUs')->name('contact-us');
    Route::get('/who-are-us', 'whoAreUs')->name('who-are-us');
    Route::get('/donation-request', 'donationRequest')->name('donation-request');
    Route::get('/donation-request-details/{donationRequest}', 'insideRequest')->name('inside.request');
    Route::get('/article', 'article')->name('articles');
    Route::get('/article/{post}', 'showArticle')->name('article-details');
    Route::post('/favorite/{post}','toggle')->name('favorite.toggle');

    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'show')->name('profile.show');
    Route::post('/favorite/{article}', 'toggle')->name('favorite.toggle');
});
