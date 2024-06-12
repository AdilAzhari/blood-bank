<?php

use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\GovernorateController;
use App\Http\Controllers\Dashboard\PostController;
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

Route::Resource('posts', PostController::class);
Route::Resource('cities', CityController::class);
// Route::Resource('blood_types', BloodTypeController::class);
// Route::Resource('donation_requests', DonationRequestController::class);
Route::Resource('governorates', GovernorateController::class);
// Route::Resource('categories', CategoryController::class);
// Route::Resource('contacts', ContactController::class);
// Route::Resource('settings', SettingController::class);
