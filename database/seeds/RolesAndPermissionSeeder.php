<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');
        Role::create(['name' => 'administrator', 'guard_name' => 'api']);
        Role::create(['name' => 'faculty', 'guard_name' => 'api']);
        Role::create(['name' => 'student', 'guard_name' => 'api']);
    }
}
