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
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('user_id');

            $table->string('email')->unique();
            $table->string('password');

            $table->string('user_name')->default(null)->nullable();
            $table->string('user_phone')->default(null)->nullable();
            $table->text('user_address')->default(null)->nullable();

            $table->integer('user_role');
            $table->tinyInteger('is_theme_dark');

            $table->bigInteger('user_dealer');


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
        Schema::dropIfExists('users');
    }
}
