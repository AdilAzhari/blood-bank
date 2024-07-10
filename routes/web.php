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
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('dashboard.Profile');

require __DIR__.'/auth.php';
require __DIR__.'/front.php';


Route::middleware(['auth','AdminAuthIfUnauthenticated'])->group(function () {

    route::Resource('admin/posts',PostController::class);

    route::Resource('admin/roles',RoleController::class);

    route::Resource('admin/permissions',PermissionController::class);

    route::Resource('admin/users',UserController::class);

    Route::Resource('admin/cities', CityController::class);

    Route::Resource('admin/blood_types', BloodTypeController::class);

    Route::Resource('admin/donations', DonationRequestController::class)->only(['index', 'show', 'destroy']);

    Route::Resource('admin/governorates', GovernorateController::class);

    Route::Resource('admin/clients', ClientController::class);

    Route::resource('admin/contacts', ContactsController::class)->only(['index', 'destroy']);

    Route::controller(SettingController::class)->group(function () {

        Route::put('admin/settings', 'update')->name('settings.update');
        Route::get('admin/settings', 'index')->name('settings.index');
    });


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
