<?php

use App\Http\Controllers\Dashboard\BloodTypeController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\ContactsController;
use App\Http\Controllers\Dashboard\DonationRequestController;
use App\Http\Controllers\Dashboard\GovernorateController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('dashboard.Profile');

require __DIR__.'/auth.php';
require __DIR__.'/front.php';

Route::middleware(['auth', 'AdminAuthIfUnauthenticated'])->prefix('admin')->group(function () {

    route::Resource('/posts', PostController::class);
    Route::controller(postController::class)->prefix('/posts')->name('posts.')->group(function () {
        Route::get('/trashed', 'trashed')->name('trashed');
        Route::get('/restore/{post}', 'restore')->name('restore');
        Route::delete('/forceDelete/{post}', 'forceDelete')->name('forceDelete');
    });

    route::Resource('/roles', RoleController::class);
    Route::controller(roleController::class)->prefix('/roles')->name('roles.')->group(function () {
        Route::get('/trashed', 'trashed')->name('trashed');
        Route::get('/restore/{role}', 'restore')->name('restore');
        Route::delete('/forceDelete/{role}', 'forceDelete')->name('forceDelete');
    });

    route::Resource('/permissions', PermissionController::class);
    Route::controller(permissionController::class)->prefix('/permissions')->name('permissions.')->group(function () {
        Route::get('/trashed', 'trashed')->name('trashed');
        Route::get('/restore/{permission}', 'restore')->name('restore');
        Route::delete('/forceDelete/{permission}', 'forceDelete')->name('forceDelete');
    });

    route::Resource('/users', UserController::class);
    Route::controller(userController::class)->prefix('/users')->name('users.')->group(function () {
        Route::get('/trashed', 'trashed')->name('trashed');
        Route::get('/restore/{user}', 'restore')->name('restore');
        Route::delete('/forceDelete/{user}', 'forceDelete')->name('forceDelete');
    });

    Route::Resource('/cities', CityController::class);
    Route::controller(cityController::class)->prefix('/cities')->name('cities.')->group(function () {
        Route::get('/trashed', 'trashed')->name('trashed');
        Route::get('/restore/{city}', 'restore')->name('restore');
        Route::delete('/forceDelete/{city}', 'forceDelete')->name('forceDelete');
    });

    Route::Resource('/blood_types', BloodTypeController::class);
    Route::controller(bloodTypeController::class)->prefix('/blood_types')->name('blood_types.')->group(function () {
        Route::get('/trashed', 'trashed')->name('trashed');
        Route::get('/restore/{blood_type}', 'restore')->name('restore');
        Route::delete('/forceDelete/{blood_type}', 'forceDelete')->name('forceDelete');
    });

    Route::Resource('/donations', DonationRequestController::class)->only(['index', 'show', 'destroy']);
    Route::controller(DonationRequestController::class)->prefix('/donations')->name('donations.')->group(function () {
        Route::get('/trash', 'trash')->name('trashed');
        Route::get('/restores', 'restores');
        Route::get('/restore/{donation}', 'restore')->name('restore');
        Route::delete('/forceDelete/{donation}', 'forceDelete')->name('forceDelete');
    });

    Route::Resource('/governorates', GovernorateController::class);
    Route::controller(governorateController::class)->prefix('/governorates')->name('governorates.')->group(function () {
        Route::get('/trashed', 'trashed')->name('trashed');
        Route::get('/restore/{governorate}', 'restore')->name('restore');
        Route::delete('/forceDelete/{governorate}', 'forceDelete')->name('forceDelete');
    });

    Route::Resource('/clients', ClientController::class);
    Route::controller(clientController::class)->prefix('/clients')->name('clients.')->group(function () {
        Route::get('/trashed', 'trashed')->name('trashed');
        Route::get('/restore/{client}', 'restore')->name('restore');
        Route::delete('/forceDelete/{client}', 'forceDelete')->name('forceDelete');
    });

    Route::resource('/contacts', ContactsController::class)->only(['index', 'destroy']);
    Route::controller(ContactsController::class)->prefix('/contacts')->name('contacts.')->group(function () {
        Route::get('/trashed', 'trashed')->name('trashed');
        Route::get('/restore/{contact}', 'restore')->name('restore');
        Route::delete('/forceDelete/{contact}', 'forceDelete')->name('forceDelete');
    });

    Route::Resource('/categories', CategoryController::class);
    Route::controller(categoryController::class)->prefix('/categories')->name('categories.')->group(function () {
        Route::get('/trashed', 'trashed')->name('trashed');
        Route::get('/restore/{category}', 'restore')->name('restore');
        Route::delete('/forceDelete/{category}', 'forceDelete')->name('forceDelete');
    });

    Route::controller(SettingController::class)->prefix('/settings')->name('settings.')->group(function () {
        Route::put('/', 'update')->name('update');
        Route::get('/', 'index')->name('index');
    });

    Route::controller(NotificationController::class)->prefix('notifications')->name('notifications.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/{id}/mark-as-read', 'markAsRead')->name('markAsRead');
    });
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
