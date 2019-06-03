<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('home_address');
            $table->string('bvn');
            $table->string('drivers_license');
            $table->string('account_type');
            $table->string('account_number');
            $table->string('account_name');
            $table->string('bank');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->integer('account_status')->default(0);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('location_id')
                    ->references('id')
                    ->on('locations')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
