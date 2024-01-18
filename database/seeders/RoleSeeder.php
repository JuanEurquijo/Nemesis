<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_doctor = Role::create(['name' => 'doctor']);
        $role_admin = Role::create(['name' => 'admin']);
    
        $permission_create_role = Permission::create(['name' => 'create roles']);
        $permission_read_role = Permission::create(['name' => 'read roles']);
        $permission_update_role = Permission::create(['name' => 'update roles']);
        $permission_delete_role = Permission::create(['name' => 'delete roles']);
    
        $permission_create_medicine = Permission::create(['name' => 'create medicines']);
        $permission_read_medicine = Permission::create(['name' => 'read medicines']);
        $permission_update_medicine = Permission::create(['name' => 'update medicines']);
        $permission_delete_medicine = Permission::create(['name' => 'delete medicines']);

        $permission_admin = [$permission_create_role,$permission_read_role,$permission_update_role,$permission_delete_role];
        $permission_doctor = [$permission_create_medicine,$permission_read_medicine,$permission_update_medicine,$permission_delete_medicine];
        $role_admin->syncPermissions($permission_admin);
        $role_doctor->syncPermissions($permission_doctor);
    }
}
