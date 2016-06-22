<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuPromotionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_promotion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->unsigned()->index();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
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
        Schema::drop('menu_promotion');
    }
}
