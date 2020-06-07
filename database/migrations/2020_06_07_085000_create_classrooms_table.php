<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateClassroomsTable.
 */
class CreateClassroomsTable extends Migration
{
	/**
	 * Run the migrations.c
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hsm_classrooms', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name',25);
            $table->string('slug',25)->unique();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->softDeletes();
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
		Schema::drop('hsm_classrooms');
	}
}
