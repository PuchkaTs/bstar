<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topbanners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image');
            $table->string('url');
            $table->string('description');
            $table->integer('position');
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
        Schema::drop('topbanners');
    }
}
