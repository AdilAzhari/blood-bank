<?php

use App\Http\Controllers\Dashboard\BloodTypeController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\ContactsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DonationRequestController;
use App\Http\Controllers\Dashboard\GovernorateController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
require __DIR__ . '/front.php';

Route::middleware(['auth','check-permission'])->group(function () {
    Route::Resource('posts', PostController::class);
    Route::Resource('cities', CityController::class);
    Route::Resource('blood_types', BloodTypeController::class);
    Route::Resource('donations', DonationRequestController::class)->only(['index', 'show', 'destroy']);
    Route::Resource('governorates', GovernorateController::class);
    Route::Resource('categories', CategoryController::class);
    Route::Resource('clients', ClientController::class);
    Route::resource('contacts', ContactsController::class)->only(['index', 'destroy']);
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::resource('permissions', PermissionController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

