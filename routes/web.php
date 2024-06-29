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

// Route::get('/posts', [PostController::class, 'index'])->middleware(['auth', 'check-permission:viewAny-post'])->name('posts.index');
// Route::get('/posts/create', [PostController::class, 'create'])->middleware(['auth', 'checkPermission:create-post'])->name('posts.create');
// Route::post('/posts', [PostController::class, 'store'])->middleware(['auth', 'checkPermission:create-post'])->name('posts.store');
// Route::get('/posts/{post}', [PostController::class, 'show'])->middleware(['auth', 'checkPermission:view-post'])->name('posts.show');
// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->middleware(['auth', 'checkPermission:update-post'])->name('posts.edit');
// Route::put('/posts/{post}', [PostController::class, 'update'])->middleware(['auth', 'checkPermission:update-post'])->name('posts.update');
// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware(['auth', 'checkPermission:delete-post'])->name('posts.destroy');


Route::middleware([ 'auth','check-permission'])->group(function () {

    // Route::Resource('posts', PostController::class)->middleware([
    //     'index' => 'permission:viewAny-post',
    //     'create' => 'permission:create-post',
    //     'store' => 'permission:create-post',
    //     'show' => 'permission:view-post',
    //     'edit' => 'permission:update-post',
    //     'update' => 'permission:update-post',
    //     'destroy' => 'permission:delete-post',
    // ]);
    // Route::resource('posts', PostController::class);

    // Route::middleware(['checkPermission:view posts'])->only(['index', 'show']);
    // Route::middleware(['checkPermission:create posts'])->only(['create', 'store']);
    // Route::middleware(['checkPermission:edit posts'])->only(['edit', 'update']);
    // Route::middleware(['checkPermission:delete posts'])->only(['destroy']);

    Route::Resource('cities', CityController::class)->middleware([
        'index' => 'permission:viewAny-city',
        'create' => 'permission:create-city',
        'store' => 'permission:create-city',
        'show' => 'permission:view-city',
        'edit' => 'permission:update-city',
        'update' => 'permission:update-city',
        'destroy' => 'permission:delete-city',
    ]);

    Route::Resource('blood_types', BloodTypeController::class)->middleware([
        'index' => 'permission:viewAny-blood_type',
        'create' => 'permission:create-blood_type',
        'store' => 'permission:create-blood_type',
        'show' => 'permission:view-blood_type',
        'edit' => 'permission:update-blood_type',
        'update' => 'permission:update-blood_type',
        'destroy' => 'permission:delete-blood_type',
    ]);

    Route::Resource('donations', DonationRequestController::class)->only(['index', 'show', 'destroy'])->middleware([
        'index' => 'permission:viewAny-donation_request',
        'show' => 'permission:view-donation_request',
        'destroy' => 'permission:delete-donation_request',
    ]);

    Route::Resource('front/governorates', GovernorateController::class)->middleware([
        'index' => 'permission:viewAny-governorate',
        'create' => 'permission:create-governorate',
        'store' => 'permission:create-governorate',
        'show' => 'permission:view-governorate',
        'edit' => 'permission:update-governorate',
        'update' => 'permission:update-governorate',
        'destroy' => 'permission:delete-governorate',
    ]);

    Route::Resource('categories', CategoryController::class)->middleware([
        'index' => 'permission:viewAny-category',
        'create' => 'permission:create-category',
        'store' => 'permission:create-category',
        'show' => 'permission:view-category',
        'edit' => 'permission:update-category',
        'update' => 'permission:update-category',
        'destroy' => 'permission:delete-category',
    ]);

    Route::Resource('clients', ClientController::class)->middleware([
        'index' => 'permission:viewAny-client',
        'create' => 'permission:create-client',
        'store' => 'permission:create-client',
        'show' => 'permission:view-client',
        'edit' => 'permission:update-client',
        'update' => 'permission:update-client',
        'destroy' => 'permission:delete-client',
    ]);

    Route::resource('contacts', ContactsController::class)->only(['index', 'destroy'])->middleware([
        'index' => 'permission:viewAny-contact',
        'destroy' => 'permission:delete-contact',
    ]);

    Route::put('settings', [SettingController::class, 'update'])->name('settings.update')->middleware('permission:update-setting');

    Route::get('settings', [SettingController::class, 'index'])->name('settings.index')->middleware('permission:viewAny-setting');

    Route::resource('permissions', PermissionController::class)->middleware([
        'index' => 'permission:viewAny-permission',
        'create' => 'permission:create-permission',
    ]);

    Route::resource('roles', RoleController::class)->middleware([
        'index' => 'permission:viewAny-role',
        'create' => 'permission:create-role',
    ]);

    Route::resource('users', UserController::class)->middleware([
        'index' => 'permission:viewAny-user',
        'create' => 'permission:create-user',
    ]);
});
