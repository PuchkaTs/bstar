<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacemenuPromotionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placemenu_promotion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('placemenu_id')->unsigned()->index();
            $table->foreign('placemenu_id')->references('id')->on('placemenus')->onDelete('cascade');
            $table->integer('promotion_id')->unsigned()->index();
            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('cascade');
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
        Schema::drop('placemenu_promotion');
    }
}
