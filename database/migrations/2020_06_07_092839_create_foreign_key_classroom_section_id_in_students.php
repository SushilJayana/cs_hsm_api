<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeyClassroomSectionIdInStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hsm_students', function (Blueprint $table) {
            $table->foreign('class_section_id')->references('id')->on('hsm_classroom_section_relation');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hsm_students', function (Blueprint $table) {
            //
        });
    }
}
