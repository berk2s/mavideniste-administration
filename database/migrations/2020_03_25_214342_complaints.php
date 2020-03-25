<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Complaints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->bigIncrements('complaint_id');

            $table->integer('branch_id');
            $table->string('user_name')->default(null)->nullable();
            $table->string('user_phone')->default(null)->nullable();
            $table->string('user_id')->default(null)->nullable();
            $table->string('order')->default(null)->nullable();
            $table->string('order_id')->default(null)->nullable();
            $table->text('complaint')->default(null)->nullable();

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
        Schema::dropIfExists('complaints');
    }
}
