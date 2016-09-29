<?php

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
        Schema::create('cars', function(Blueprint $table) {
            $table->increments('id');
            $table->string('brand', 255);
            $table->string('model', 255);
            $table->string('keyword', 255);
            $table->string('price', 255)->comment("price in euro");
            $table->integer('mileage')->comment('mileage in km');
            $table->integer('year');
            $table->string('color', 255);
            $table->string('transmission', 255);
            $table->string('body', 255);
            $table->string('fuel', 255);
            $table->string('license_plate', 255);
            $table->string('main_img', 255);
            $table->text('description');
            $table->boolean('sold')->default('0');
            $table->integer('spend_on')->comment("the amount of money that is spend on this car")->nullable();
            $table->integer('sold_for')->comment("the amount of money received for this car")->nullable();
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
        Schema::drop('cars');
    }
}
