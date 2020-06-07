<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateStudentsTable.
 */
class CreateStudentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hsm_students', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->integer('class_section_id')->unsigned();
            $table->string('email',50)->unique()->nullable();
            $table->smallInteger('age')->nullable();
            $table->enum('gender',['MALE','FEMALE','OTHER']);
            $table->string('photo',25)->nullable();
            $table->timestamp('dob')->nullable();
            $table->string('nationality',20)->nullable();
            $table->string('address',100);
            $table->bigInteger('contact');
            $table->string('guardian_name',50);
            $table->bigInteger('guardian_contact');
            $table->string('guardian_address',100);
            $table->string('guardian_occupation',30)->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
		Schema::drop('hsm_students');
	}
}
