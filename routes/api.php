<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    AuthController,
    BloodTypeController,
    CategoryController,
    CityController,
    ClientController,
    ContactController,
    DonationRequestController,
    GovernorateController,
    MainController,
    NotificationController,
    PostController,
    SettingController
};

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// 'always-accept-json'
Route::post('register', [authController::class, 'register']);
Route::prefix('v1')->middleware(['api'])->group(function () {

    Route::controller(authController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('password/reset', 'sendResetCode');
        Route::post('password/reset/verify', 'resetPassword');
        Route::post('donationRequest', 'createDonationRequest');
        Route::post('notification/setting', 'notificationSetting');
        Route::post('user/profile', 'profile');
    });

    Route::apiResource('clients', ClientController::class);
    Route::controller(NotificationController::class)->group(function () {
        Route::get('/notifications', 'index');
        // Route::post('/orders', 'store');
    });

    Route::get('main', [MainController::class, 'index']);
    Route::get('cities', [MainController::class, 'cities']);
});
