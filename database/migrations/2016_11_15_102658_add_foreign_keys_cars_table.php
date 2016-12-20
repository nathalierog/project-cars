<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('brand');
            $table->dropColumn('model');
            $table->integer('brand_id')->after('id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->integer('model_id')->after('brand_id')->unsigned();
            $table->foreign('model_id')->references('id')->on('models');
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
        Schema::dropIfExists('cars');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
