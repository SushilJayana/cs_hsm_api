<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateFacultiesTable.
 */
class CreateFacultiesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hsm_faculties', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->integer('salary');
            $table->string('email',50)->unique()->nullable();
            $table->smallInteger('age')->nullable();
            $table->enum('gender',['MALE','FEMALE','OTHER']);
            $table->string('photo',25)->nullable();
            $table->timestamp('dob')->nullable();
            $table->string('nationality',20)->nullable();
            $table->string('address',100);
            $table->bigInteger('contact');
            $table->string('guardian_name',50)->nullable();
            $table->bigInteger('guardian_contact')->nullable();
            $table->string('guardian_address',100)->nullable();
            $table->string('guardian_occupation',30)->nullable();
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
		Schema::drop('hsm_faculties');
	}
}
