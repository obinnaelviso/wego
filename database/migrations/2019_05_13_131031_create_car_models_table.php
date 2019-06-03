<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->unsignedBigInteger('car_make_id');
            $table->foreign('car_make_id')->references('id')->on('car_makes')->onDelete('cascade');
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->string('name');
            $table->integer('price')->nullable();
            $table->string('plate_number'); 
            $table->integer('booking_percent')->nullable();
            $table->integer('year');
            $table->string('colour');
            $table->string('img_path');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('car_models');
    }
}
