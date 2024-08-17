<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* This PHP code snippet is a Seeder class named `PermissionSeeder` that is used in Laravel
        applications to populate the database with predefined permissions. */
        $permissions = [
            'view-role',
            'create-role',
            'update-role',
            'delete-role',
            'viewAny-role',
            'trashed-role',
            'restore-role',
            'forceDelete-role',

            'view-permission',
            'create-permission',
            'update-permission',
            'delete-permission',
            'trashed-permission',
            'viewAny-permission',
            'restore-permission',
            'forceDelete-permission',

            'view-city',
            'create-city',
            'update-city',
            'delete-city',
            'viewAny-city',
            'restore-city',
            'trashed-city',
            'forceDelete-city',

            'view-user',
            'create-user',
            'update-user',
            'delete-user',
            'viewAny-user',
            'restore-user',
            'trashed-user',
            'forceDelete-user',

            'view-client',
            'delete-client',
            'viewAny-client',
            'trashed-client',
            'update-client',
            'trashed-client',
            'restore-client',
            'forceDelete-client',

            'view-post',
            'delete-post',
            'viewAny-post',
            'restore-post',
            'trashed-post',
            'forceDelete-post',

            'view-bloodType',
            'create-bloodType',
            'viewAny-bloodType',

            'view-Donation',
            'delete-Donation',
            'viewAny-Donation',
            'trashed-Donation',
            'restore-Donation',
            'forceDelete-Donation',

            'view-category',
            'create-category',
            'update-category',
            'delete-category',
            'viewAny-category',
            'trashed-category',
            'restore-category',
            'forceDelete-category',

            'view-governorate',
            'create-governorate',
            'update-governorate',
            'delete-governorate',
            'viewAny-governorate',
            'viewAny-governorate',
            'restore-governorate',
            'forceDelete-governorate',

            'view-setting',
            'create-setting',
            'update-setting',
            'delete-setting',
            'viewAny-setting',
            'trashed-setting',
            'restore-setting',
            'forceDelete-setting',

            'view-contact',
            'create-contact',
            'update-contact',
            'delete-contact',
            'viewAny-contact',
            'viewAny-contact',
            'restore-contact',
            'forceDelete-contact',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
