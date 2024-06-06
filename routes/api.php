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

Route::prefix('v1')->group(function () {
    // Route::resource('clients', ClientController::class);
    // Route::resource('notifications', NotificationController::class);
    // Route::resource('posts', PostController::class);
    // // Route::resource('cities', CityController::class);
    // Route::resource('blood_types', BloodTypeController::class);
    // Route::resource('donation_requests', DonationRequestController::class);
    // Route::resource('governorates', GovernorateController::class);
    // Route::resource('categories', CategoryController::class);
    // Route::resource('contacts', ContactController::class);
    // Route::resource('settings', SettingController::class);
    // Route::get('main',[MainController::class, 'index']);
    Route::get('cities', [MainController::class, 'cities']);
    Route::get('governorates', [MainController::class, 'governorates']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});
