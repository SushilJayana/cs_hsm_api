<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hsm_users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name',50);
            $table->string('username',50)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->smallInteger('age')->nullable();
            $table->enum('gender',['MALE','FEMALE','OTHER']);
            $table->string('photo',25);
            $table->timestamp('dob')->nullable();
            $table->string('nationality',20)->nullable();
            $table->string('address');
            $table->bigInteger('contact');
            $table->string('guardian_name',50)->nullable();
            $table->bigInteger('guardian_contact')->nullable();
            $table->string('guardian_occupation',50)->nullable();
            $table->tinyInteger('created_by');
            $table->tinyInteger('updated_by');
            $table->rememberToken();
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
        Schema::dropIfExists('hsm_users');
    }
}
