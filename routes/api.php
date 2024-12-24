<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DonationRequestController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth');

Route::post('v1/register', [authController::class, 'register']);
Route::post('v1/login', [authController::class, 'login']);

Route::prefix('v1/')->middleware(['always-accept-json', 'auth:sanctum'])->group(function () {

    Route::controller(authController::class)->group(function () {
        Route::POST('logout', 'logout');

        Route::post('password/reset', 'sendResetCode');
        Route::post('password/reset/verify', 'resetPassword');
        Route::post('notification/setting', 'notificationSetting');
        Route::post('user/profile', 'profile');
        Route::post('user/update', 'updateProfile');
    });

    Route::controller(GeneralController::class)->group(function () {
        Route::get('governorates', 'governorates');
        Route::get('cities', 'cities');
        Route::get('bloodTypes', 'bloodTypes');
        Route::get('settings', 'settings');
        Route::post('contactus', 'contactUs');
        Route::get('categories', 'categories');
    });

    Route::controller(PostController::class)->group(function () {
        Route::get('posts', 'index');
        Route::get('post/{id}', 'post');
        Route::get('favourites', 'listFavourites');
        Route::post('toggle-favourite/{postId}', 'toggleFavourite');
    });

    Route::controller(DonationRequestController::class)->group(function () {
        Route::get('donation-requests', 'index');
        Route::get('donation-request/{id}', 'donationRequest');
        Route::post('donation-request/create', 'createDonationRequest');
    });

});
