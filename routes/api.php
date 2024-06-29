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
})->middleware('auth');

Route::post('v1/register', [authController::class, 'register']);

Route::prefix('v1')->middleware('always-accept-json')->group(function () {

    Route::controller(authController::class)->group(function () {
        Route::POST('login', 'login');
        Route::POST('logout', 'logout');

        Route::post('password/reset', 'sendResetCode');
        Route::post('password/reset/verify', 'resetPassword');
        Route::post('donationRequest', 'createDonationRequest');
        Route::post('notification/setting', 'notificationSetting');
        Route::post('user/profile', 'profile');
        Route::post('user/update', 'updateProfile');
    });

    // Route::resource('clients', ClientController::class)->name([
    //     'index' => 'clients.index',
    //     'store' => 'clients.store',
    //     'show' => 'clients.show',
    //     'update' => 'clients.update',
    //     'destroy' => 'clients.destroy',
    // ]);
    // Route::resource('notifications', NotificationController::class);
    // Route::resource('posts', PostController::class);
    // Route::resource('cities', CityController::class);
    // Route::resource('blood_types', BloodTypeController::class);

    Route::controller(DonationRequestController::class)->group(function () {
        Route::get('donation_requests', 'index');
        Route::post('donation_requests', 'store');
        Route::put('donation_requests/{id}', 'update');
        Route::get('donation_requests/{id}', 'show');
    });

    Route::controller(GovernorateController::class)->group(function () {
        Route::get('governorates', 'index');
        Route::post('governorates', 'store');
        Route::put('governorates/{id}', 'update');
        Route::delete('governorates/{id}', 'destroy');
    });

    Route::get('/notifications', [NotificationController::class, 'index']);

        // Settings routes
    Route::get('/settings', [SettingController::class, 'index']);
    Route::post('/settings', [SettingController::class, 'store']);
    // Route::resource('categories', CategoryController::class);
    // Route::resource('contacts', ContactController::class);
    // Route::resource('settings', SettingController::class);
    // Route::get('main',[MainController::class, 'index']);

    // Route::get('blood_types', [BloodTypeController::class, 'index']);});
    // Route::get('cities', [CityController::class, 'index']);
});
