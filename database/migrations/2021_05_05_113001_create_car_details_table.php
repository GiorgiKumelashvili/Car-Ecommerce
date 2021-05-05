<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarDetailsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('car_details', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_levied');
            $table->string('category', 50);
            $table->string('manufacturer', 50);
            $table->string('model', 50);
            $table->smallInteger('release_year');
            $table->string('fuel_type', 50);
            $table->unsignedDecimal('engine_capacity', 3, 1);
            $table->unsignedSmallInteger('cylinders');
            $table->string('gear_box', 50);
            $table->string('wheel_side', 20);
            $table->string('color', 50);
            $table->string('vin_code', 20)->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('car_details');
    }
}
