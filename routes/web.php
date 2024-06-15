<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\DonationRequestController;
use App\Http\Controllers\Dashboard\GovernorateController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\RolePermissionController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Livewire\Governorate;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::Resource('posts', PostController::class);
    Route::Resource('cities', CityController::class);
    // Route::Resource('blood_types', BloodTypeController::class);
    Route::Resource('donation_requests', DonationRequestController::class);
    Route::Resource('governorates', GovernorateController::class);
    Route::Resource('categories', CategoryController::class);
    Route::Resource('clients', ClientController::class);
    // Route::Resource('contacts', ContactController::class);
    Route::Resource('settings', SettingController::class);
    Route::resource('roles', RolePermissionController::class);
    Route::resource('permissions', PermissionController::class);
});
