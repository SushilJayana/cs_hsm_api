<?php

use Illuminate\Database\Seeder;

class DefaultSystemUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            "name" => "admin",
            "username" => "admin",
            "email" => "admin@admin.com",
            "password" => "admin123",
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
            "updated_by" => 1,
            "user_type" => "administrator"
        ];

        \Illuminate\Foundation\Auth\User::save($user);
    }
}
