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
        $sys_user_type = explode(',', trim(env('SYS_USER_TYPE')));
        foreach ($sys_user_type as $user_type) {
            Role::create(['name' => $user_type, 'guard_name' => 'api']);
        }
    }
}
