<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsmFacultySubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hsm_faculty_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faculty_id')->unsigned();
            $table->foreign('faculty_id')->references('id')->on('hsm_faculties');
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('hsm_subjects');
            $table->integer('class_section_id')->unsigned();
            $table->foreign('class_section_id')->references('id')->on('hsm_classroom_section_relation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hsm_faculty_subjects');
    }
}
