<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $student = Role::create(['name' => 'student']);
        $teacher = Role::create(['name' => 'teacher']);
        $admin = Role::create(['name' => 'admin']);

        $permissionSeeCrono = Permission::create(['name' => 'see crono']);
        $teacher->givePermissionTo($permissionSeeCrono);
    }
}
