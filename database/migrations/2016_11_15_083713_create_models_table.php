<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function(Blueprint $table) {
            $table->increments('id');
            $table->string('model', 255);
            $table->integer('brand_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('models', function (Blueprint $table) {
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('models');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
