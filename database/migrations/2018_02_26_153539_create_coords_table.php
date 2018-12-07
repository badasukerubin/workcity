<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coords', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fullname');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('dob');
            $table->string('school');
            $table->string('faculty');
            $table->string('department');
            $table->string('level');
            $table->string('cgpa');
            $table->string('phonenumber');
            $table->string('work_exp');
            $table->string('marital');
            $table->string('location');
            $table->string('que_edited');
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
        Schema::dropIfExists('coords');
    }
}
