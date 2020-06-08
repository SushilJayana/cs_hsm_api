<?php

use Illuminate\Database\Seeder;

class DefaultStudentClassSection extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class = \App\Entities\Classroom::create([
            "name" => "Nursery",
            "slug" => "nursery",
            "created_by" => 1
        ]);

        $section = \App\Entities\Section::create([
            "name" => "Section A",
            "slug" => "section_a",
            "created_by" => 1
        ]);

        $classSection = \App\Entities\ClassSection::create([
            "class_id" => $class->id,
            "section_id" => $section->id
        ]);

        $classSection = \App\Entities\Student::create([
            "name" => "Default Student",
            "class_section_id" => $classSection->id,
            "gender" => "MALE",
            "address" => "Default Student Address",
            "contact" => 123456789,
            "guardian_name" => "Default Student Gaurdian",
            "guardian_contact" => 987654321,
            "guardian_address" => "Default Student G Address",
            "created_by" => 1
        ]);


    }
}
