<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Appsettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appsettings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('has_update')->default(null)->nullable();;
            $table->double('version')->default(null)->nullable();;
            $table->boolean('is_update_required')->default(null)->nullable();

            $table->string('playstore_link')->default(null)->nullable();
            $table->string('appstore_link')->default(null)->nullable();

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
        Schema::dropIfExists('appsettings');
    }
}
