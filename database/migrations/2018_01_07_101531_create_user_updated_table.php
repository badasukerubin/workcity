<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUpdatedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_updated', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('username');
            $table->string('home_address');
            $table->string('faculty');
            $table->string('department');
            $table->string('level');
            $table->string('HOD');
            $table->string('dean_name');
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('description');
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
        Schema::dropIfExists('user_updated');
    }
}
