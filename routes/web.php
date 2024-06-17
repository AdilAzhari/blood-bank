<?php

use App\Http\Controllers\Dashboard\AdminController;
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
use App\Http\Controllers\Dashboard\RolePermissionController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use App\Livewire\Governorate;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {
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
    Route::resource('roles', RolePermissionController::class);
    Route::resource('permissions', PermissionController::class);

    // Start Roles and Permissions==================================================================
    Route::controller(RolePermissionController::class)->group(function () {
        Route::get('add-permission', 'addPermissions')->name('add-permission');
        Route::get('show-roles', 'show')->name('show-roles');
        Route::get('create-roles', 'createRole')->name('create-roles');
        Route::post('add-role', 'create')->name('add-role');
        Route::get('edit-role/{role}', 'editRole')->name('edit-role');
        Route::post('update-role', 'updateRole')->name('update-role');
        Route::get('delete-role/{role}', 'delete')->name('delete-role');
    });
    // End Roles and Permissions==================================================================

    // Route::put('/admin/change-password', [AdminController::class, 'changePassword'])->name('admin.change-password');
    Route::resource('users', UserController::class);
});
Route::get('/sidebar-test', function () {
    return view('layouts.sidbar');
});
