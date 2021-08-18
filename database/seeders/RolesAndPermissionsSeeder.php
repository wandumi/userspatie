<?php

namespace Database\Seeders;


use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //User Model
        $UserPermission1 = Permission::create(['name' => 'create:user', 'description' => 'create user']);

        $UserPermission2 = Permission::create(['name' => 'read:user', 'description' => 'read user']);

        $UserPermission3 = Permission::create(['name' => 'update:user', 'description' => 'update user']);

        $UserPermission4 = Permission::create(['name' => 'delete:user', 'description' => 'delete user']);

        //Role Model
        $RolePermission1 = Permission::create(['name' => 'create:role', 'description' => 'create role']);

        $RolePermission2 = Permission::create(['name' => 'read:role', 'description' => 'read role']);

        $RolePermission3 = Permission::create(['name' => 'update:role', 'description' => 'update role']);

        $RolePermission4 = Permission::create(['name' => 'delete:role', 'description' => 'delete role']);

        //Permission Model
        $Permission1 = Permission::create(['name' => 'create:permission', 'description' => 'create permission']);

        $Permission2 = Permission::create(['name' => 'read:permission', 'description' => 'read permission']);

        $Permission3 = Permission::create(['name' => 'update:permission', 'description' => 'update permission']);

        $Permission4 = Permission::create(['name' => 'delete:permission', 'description' => 'delete permission']);

        //Admin Model
        $AdminPermission1 = Permission::create(['name' => 'update:admin', 'description' => 'update admin']);

        $AdminPermission2 = Permission::create(['name' => 'read:admin', 'description' => 'read admin']);

        // Create the users in the system
        $SuperAdminRole = Role::create(['name' => 'super-admin']);

        $AdminRole = Role::create(['name' => 'admin']);

        $ModeratorRole = Role::create(['name' => 'manager']);

        $UserRole = Role::create(['name' => 'user']);

        //Assign the permissions (Sync)
        $SuperAdminRole->syncPermissions([
            $UserPermission1,
            $UserPermission2,
            $UserPermission3,
            $UserPermission4,
            $RolePermission1,
            $RolePermission2,
            $RolePermission3,
            $RolePermission4,
            $Permission1,
            $Permission2,
            $Permission3,
            $Permission4,
            $AdminPermission1,
            $AdminPermission2,
            $UserPermission1
        ]);

        $AdminRole->syncPermissions([
            $UserPermission1,
            $UserPermission2,
            $UserPermission3,
            $UserPermission4,
            $RolePermission1,
            $RolePermission2,
            $RolePermission3,
            $RolePermission4,
            $Permission1,
            $Permission2,
            $Permission3,
            $Permission4,
            $AdminPermission1,
            $AdminPermission2,
            $UserPermission1
        ]);

        
        $ModeratorRole->syncPermissions([
            $UserPermission2,
            $RolePermission2,
            $Permission2,
            $AdminPermission1
        ]);

        $UserRole->syncPermissions([
           
        ]);

        //Create the users 
        $SuperAdmin = User::create([
            'name' => 'super admin',
            'is_admin' => 1,
            'email' => 'super@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        $Admin = User::create([
            'name' => 'admin',
            'is_admin' => 1,
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        $Moderator = User::create([
            'name' => 'manager',
            'is_admin' => 1,
            'email' => 'manager@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        $User = User::create([
            'name' => 'test',
            'is_admin' => 0,
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        // Sync the roles to the users
        $SuperAdmin->syncRoles([$SuperAdminRole])->syncPermissions([
            $UserPermission1,
            $UserPermission2,
            $UserPermission3,
            $UserPermission4,
            $RolePermission1,
            $RolePermission2,
            $RolePermission3,
            $RolePermission4,
            $Permission1,
            $Permission2,
            $Permission3,
            $Permission4,
            $AdminPermission1,
            $AdminPermission2,
            $UserPermission1
        ]);

        $Admin->syncRoles([$AdminRole])->syncPermissions([
            $UserPermission1,
            $UserPermission2,
            $UserPermission3,
            $UserPermission4,
            $RolePermission1,
            $RolePermission2,
            $RolePermission3,
            $RolePermission4,
            $Permission1,
            $Permission2,
            $Permission3,
            $Permission4,
            $AdminPermission1,
            $AdminPermission2,
            $UserPermission1
        ]);

        $Moderator->syncRoles([$ModeratorRole])->syncPermissions([
            $UserPermission2,
            $RolePermission2,
            $AdminPermission1,
        ]);

        $User->syncRoles($UserRole);

    }
}
