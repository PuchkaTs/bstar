<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductMenuPromotionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productmenu_promotion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productmenu_id')->unsigned()->index();
            $table->foreign('productmenu_id')->references('id')->on('productmenus')->onDelete('cascade');
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
        Schema::drop('productmenu_promotion');
    }
}
