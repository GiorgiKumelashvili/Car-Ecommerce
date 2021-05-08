<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price_usd')->nullable();
            $table->string('img_url', 2100);
            $table->integer('distance');
            $table->unsignedBigInteger('car_details_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('car_details_id')->references('id')->on('car_details');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('cars');
    }
}
