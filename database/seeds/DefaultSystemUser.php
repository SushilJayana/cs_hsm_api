<?php

use App\Entities\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultSystemUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_user = User::create([
        "name" => "admin",
        "username" => "admin",
        "email" => "admin@admin.com",
        "password" => Hash::make("admin123"),
        "user_type" => "administrator",
        "address" => "nepal",
        "contact" => 9000000000,
        "created_by" => 1
    ]);

        $admin_user->assignRole('administrator');
    }
}
