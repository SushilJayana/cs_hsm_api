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
            "age" => 1,
            "gender" => "MALE",
            "photo" => "admin",
            "dob" => "2000-01-01",
            "nationality" => "nepali",
            "address" => "nepal",
            "contact" => 987654321,
            "guardian_name" => "admin",
            "guardian_contact" => 987654321,
            "guardian_occupation" => "admin",
            "created_by" => 1,
            "updated_by" => 1
        ]);

        $admin_user->assignRole('administrator');
    }
}
