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

Route::prefix('v1')->middleware(['api'])->group(function () {

    Route::controller(authController::class)->group(function () {
        Route::post('register', 'register');
        Route::post('login', 'login');
        Route::post('password/reset', 'sendResetCode');
        Route::post('password/reset/verify', 'verifyResetCode');
    });

    Route::apiResource('clients', ClientController::class);
    Route::apiResource('notifications', NotificationController::class);
    Route::apiResource('posts', PostController::class);
    Route::apiResource('cities', CityController::class);
    Route::apiResource('blood_types', BloodTypeController::class);
    Route::apiResource('donation_requests', DonationRequestController::class);
    Route::apiResource('governorates', GovernorateController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('contacts', ContactController::class);
    Route::apiResource('settings', SettingController::class);
    Route::get('main', [MainController::class, 'index']);
    Route::get('cities', [MainController::class, 'cities']);
});
