<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('car_model_id');
            $table->foreign('car_model_id')->references('id')->on('car_models')->onDelete('cascade');
            $table->string('name');
            $table->integer('stock');
            $table->integer('price');
            $table->string('plate_number'); 
            $table->integer('booking_percent');
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
        Schema::dropIfExists('cars');
    }
}
