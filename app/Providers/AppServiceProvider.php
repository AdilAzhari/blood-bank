<?php

namespace App\Providers;

use App\Policies\BloodTypePolicy;
use App\Policies\CategoryPolicy;
use App\Policies\CityPolicy;
use App\Policies\ClientPolicy;
use App\Policies\ContactPolicy;
use App\Policies\DonationRequestPolicy;
use App\Policies\GovernoratePolicy;
use App\Policies\PostPolicy;
use App\Policies\RolePolicy;
use App\Policies\SettingPolicy;
use App\Policies\UserPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        // posts Gate
        Gate::define('update-post', [PostPolicy::class, 'update']);
        Gate::define('delete-post', [PostPolicy::class, 'delete']);
        Gate::define('create-post', [PostPolicy::class, 'create']);
        gate::define('view-post', [PostPolicy::class, 'view']);
        Gate::define('viewAny-post', [PostPolicy::class, 'viewAny']);

        // users Gate
        Gate::define('update-user', [UserPolicy::class, 'update']);
        Gate::define('delete-user', [UserPolicy::class, 'delete']);
        Gate::define('create-user', [UserPolicy::class, 'create']);
        gate::define('view-user', [UserPolicy::class, 'view']);
        Gate::define('viewAny-user', [UserPolicy::class, 'viewAny']);

        // blood_types Gate
        Gate::define('update-blood_type', [BloodTypePolicy::class, 'update']);
        Gate::define('delete-blood_type', [BloodTypePolicy::class, 'delete']);
        Gate::define('create-blood_type', [BloodTypePolicy::class, 'create']);
        gate::define('view-blood_type', [BloodTypePolicy::class, 'view']);
        Gate::define('viewAny-blood_type', [BloodTypePolicy::class, 'viewAny']);

        // contacts Gate
        Gate::define('update-contact', [ContactPolicy::class, 'update']);
        Gate::define('delete-contact', [ContactPolicy::class, 'delete']);
        Gate::define('create-contact', [ContactPolicy::class, 'create']);
        gate::define('view-contact', [ContactPolicy::class, 'view']);
        Gate::define('viewAny-contact', [ContactPolicy::class, 'viewAny']);

        // categories Gate
        Gate::define('update-category', [CategoryPolicy::class, 'update']);
        Gate::define('delete-category', [CategoryPolicy::class, 'delete']);
        Gate::define('create-category', [CategoryPolicy::class, 'create']);
        gate::define('view-category', [CategoryPolicy::class, 'view']);
        Gate::define('viewAny-category', [CategoryPolicy::class, 'viewAny']);

        // cities Gate
        Gate::define('update-city', [CityPolicy::class, 'update']);
        Gate::define('delete-city', [CityPolicy::class, 'delete']);
        Gate::define('create-city', [CityPolicy::class, 'create']);
        gate::define('view-city', [CityPolicy::class, 'view']);
        Gate::define('viewAny-city', [CityPolicy::class, 'viewAny']);

        // countries Gate
        // Gate::define('update-country', [CountryPolicy::class, 'update']);
        // Gate::define('delete-country', [CountryPolicy::class, 'delete']);
        // Gate::define('create-country', [CountryPolicy::class, 'create']);
        // gate::define('view-country', [CountryPolicy::class, 'view']);

        // donations Gate
        Gate::define('update-donation', [DonationRequestPolicy::class, 'update']);
        Gate::define('delete-donation', [DonationRequestPolicy::class, 'delete']);
        Gate::define('create-donation', [DonationRequestPolicy::class, 'create']);
        gate::define('view-donation', [DonationRequestPolicy::class, 'view']);
        Gate::define('viewAny-donation', [DonationRequestPolicy::class, 'viewAny']);

        // governorates Gate
        Gate::define('update-governorate', [GovernoratePolicy::class, 'update']);
        Gate::define('delete-governorate', [GovernoratePolicy::class, 'delete']);
        Gate::define('create-governorate', [GovernoratePolicy::class, 'create']);
        gate::define('view-governorate', [GovernoratePolicy::class, 'view']);
        Gate::define('viewAny-governorate', [GovernoratePolicy::class, 'viewAny']);

        // posts Gate
        Gate::define('update-post', [PostPolicy::class, 'update']);
        Gate::define('delete-post', [PostPolicy::class, 'delete']);
        Gate::define('create-post', [PostPolicy::class, 'create']);
        Gate::define('create-post', [PostPolicy::class, 'edit']);
        gate::define('view-post', [PostPolicy::class, 'view']);
        Gate::define('viewAny-post', [PostPolicy::class, 'viewAny']);

        // roles Gate
        Gate::define('update-role', [RolePolicy::class, 'update']);
        Gate::define('delete-role', [RolePolicy::class, 'delete']);
        Gate::define('create-role', [RolePolicy::class, 'create']);
        gate::define('view-role', [RolePolicy::class, 'view']);
        Gate::define('viewAny-role', [RolePolicy::class, 'viewAny']);

        // settings Gate
        Gate::define('update-setting', [SettingPolicy::class, 'update']);
        Gate::define('delete-setting', [SettingPolicy::class, 'delete']);
        Gate::define('create-setting', [SettingPolicy::class, 'create']);
        gate::define('view-setting', [SettingPolicy::class, 'view']);
        Gate::define('viewAny-setting', [SettingPolicy::class, 'viewAny']);

        // clients Gate
        Gate::define('update-client', [ClientPolicy::class, 'update']);
        Gate::define('delete-client', [ClientPolicy::class, 'delete']);
        Gate::define('create-client', [ClientPolicy::class, 'create']);
        gate::define('view-client', [ClientPolicy::class, 'view']);
        Gate::define('viewAny-client', [ClientPolicy::class, 'viewAny']);


        // Paginator::defaultView('view.front.custom-pagination');
        // Paginator::useBootstrap();
    }
}
