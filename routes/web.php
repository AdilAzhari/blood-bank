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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('dashboard.Profile');

require __DIR__.'/auth.php';
require __DIR__.'/front.php';


Route::middleware(['auth','AdminAuthIfUnauthenticated'])->group(function () {

    route::Resource('admin/posts',PostController::class);
    Route::controller(postController::class)->group(function () {
        Route::get('admin/posts/trashed', 'trashed')->name('posts.trashed');
        Route::get('admin/posts/restore/{post}', 'restore')->name('posts.restore');
        Route::delete('admin/posts/forceDelete/{post}', 'forceDelete')->name('posts.forceDelete');
    });

    route::Resource('admin/roles',RoleController::class);
    Route::controller(roleController::class)->group(function () {
        Route::get('admin/roles/trashed', 'trashed')->name('roles.trashed');
        Route::get('admin/roles/restore/{role}', 'restore')->name('roles.restore');
        Route::delete('admin/roles/forceDelete/{role}', 'forceDelete')->name('roles.forceDelete');
    });

    route::Resource('admin/permissions',PermissionController::class);
    Route::controller(permissionController::class)->group(function () {
        Route::get('admin/permissions/trashed', 'trashed')->name('permissions.trashed');
        Route::get('admin/permissions/restore/{permission}', 'restore')->name('permissions.restore');
        Route::delete('admin/permissions/forceDelete/{permission}', 'forceDelete')->name('permissions.forceDelete');
    });

    route::Resource('admin/users',UserController::class);
    Route::controller(userController::class)->group(function () {
        Route::get('admin/users/trashed', 'trashed')->name('users.trashed');
        Route::get('admin/users/restore/{user}', 'restore')->name('users.restore');
        Route::delete('admin/users/forceDelete/{user}', 'forceDelete')->name('users.forceDelete');
    });

    Route::Resource('admin/cities', CityController::class);
    Route::controller(cityController::class)->group(function () {
        Route::get('admin/cities/trashed', 'trashed')->name('cities.trashed');
        Route::get('admin/cities/restore/{city}', 'restore')->name('cities.restore');
        Route::delete('admin/cities/forceDelete/{city}', 'forceDelete')->name('cities.forceDelete');
    });

    Route::Resource('admin/blood_types', BloodTypeController::class);
    Route::controller(bloodTypeController::class)->group(function () {
        Route::get('admin/blood_types/trashed', 'trashed')->name('blood_types.trashed');
        Route::get('admin/blood_types/restore/{blood_type}', 'restore')->name('blood_types.restore');
        Route::delete('admin/blood_types/forceDelete/{blood_type}', 'forceDelete')->name('blood_types.forceDelete');
    });

    Route::Resource('admin/donations', DonationRequestController::class)->only(['index', 'show', 'destroy']);
    Route::controller(DonationRequestController::class)->group(function () {
        Route::get('admin/donations/trashed', 'trashed')->name('donations.trashed');
        Route::get('admin/donations/restore/{donation}', 'restore')->name('donations.restore');
        Route::delete('admin/donations/forceDelete/{donation}', 'forceDelete')->name('donations.forceDelete');
    });

    Route::Resource('admin/governorates', GovernorateController::class);
    Route::controller(governorateController::class)->group(function () {
        Route::get('admin/governorates/trashed', 'trashed')->name('governorates.trashed');
        Route::get('admin/governorates/restore/{governorate}', 'restore')->name('governorates.restore');
        Route::delete('admin/governorates/forceDelete/{governorate}', 'forceDelete')->name('governorates.forceDelete');
    });

    Route::Resource('admin/clients', ClientController::class);
    Route::controller(clientController::class)->group(function () {
        Route::get('admin/clients/trashed', 'trashed')->name('clients.trashed');
        Route::get('admin/clients/restore/{client}', 'restore')->name('clients.restore');
        Route::delete('admin/clients/forceDelete/{client}', 'forceDelete')->name('clients.forceDelete');
    });

    Route::resource('admin/contacts', ContactsController::class)->only(['index', 'destroy']);
    Route::controller(ContactsController::class)->group(function () {
        Route::get('admin/contacts/trashed', 'trashed')->name('contacts.trashed');
        Route::get('admin/contacts/restore/{contact}', 'restore')->name('contacts.restore');
        Route::delete('admin/contacts/forceDelete/{contact}', 'forceDelete')->name('contacts.forceDelete');
    });

    Route::Resource('admin/categories', CategoryController::class);
    Route::controller(categoryController::class)->group(function () {
        Route::get('admin/categories/trashed', 'trashed')->name('categories.trashed');
        Route::get('admin/categories/restore/{category}', 'restore')->name('categories.restore');
        Route::delete('admin/categories/forceDelete/{category}', 'forceDelete')->name('categories.forceDelete');
    });

    Route::controller(SettingController::class)->group(function () {
        Route::put('admin/settings', 'update')->name('settings.update');
        Route::get('admin/settings', 'index')->name('settings.index');
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
