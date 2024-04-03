<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //User
        Permission::create(['name' => 'user-view']);
        Permission::create(['name' => 'user-create']);
        Permission::create(['name' => 'user-edit']);
        Permission::create(['name' => 'user-delete']);

        //Role
        Permission::create(['name' => 'role-view']);
        Permission::create(['name' => 'role-create']);
        Permission::create(['name' => 'role-edit']);
        Permission::create(['name' => 'role-delete']);
        Permission::create(['name' => 'role-give-permission']);

        //Settings
        Permission::create(['name' => 'general-settings-view']);
        Permission::create(['name' => 'general-settings-edit']);
        Permission::create(['name' => 'system-settings-view']);
        Permission::create(['name' => 'system-settings-edit']);

        //Location
        Permission::create(['name' => 'location-view']);
        Permission::create(['name' => 'location-create']);
        Permission::create(['name' => 'location-edit']);
        Permission::create(['name' => 'location-delete']);

        //Mouza
        Permission::create(['name' => 'mouza-view']);
        Permission::create(['name' => 'mouza-create']);
        Permission::create(['name' => 'mouza-edit']);
        Permission::create(['name' => 'mouza-delete']);

        //Mouza new
        Permission::create(['name' => 'mouzanew-view']);
        Permission::create(['name' => 'mouzanew-create']);
        Permission::create(['name' => 'mouzanew-edit']);
        Permission::create(['name' => 'mouzanew-delete']);

        //Dag
        Permission::create(['name' => 'dag-view']);
        Permission::create(['name' => 'dag-create']);
        Permission::create(['name' => 'dag-edit']);
        Permission::create(['name' => 'dag-delete']);


        Role::create(['name' => 'Super Admin', 'description' => 'This is Super admin', 'status' => 1]);
        Role::create(['name' => 'Admin', 'description' => 'This is admin', 'status' => 1]);
        Role::create(['name' => 'User', 'description' => 'This is user', 'status' => 1]);
        Role::create(['name' => 'Manager', 'description' => 'This is manager', 'status' => 1]);
        Role::create(['name' => 'Writer', 'description' => 'This is writer', 'status' => 1]);
        Role::create(['name' => 'Developer', 'description' => 'This is developer', 'status' => 1]);

        $super_admin = User::create([
            'username' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'phone' => '01992327887',
            'password' => bcrypt('12345678')
        ]);

        $super_admin->assignRole('Super Admin');
    }
}
