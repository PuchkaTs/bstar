<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('adsTag_id')->unsigned()->index();
            $table->integer('location_id')->unsigned()->index();
            $table->integer('age_id')->unsigned()->index();
            $table->integer('price')->unsigned();
            $table->string('title');
            $table->string('phone');
            $table->text('description');
            $table->integer('position');
            $table->enum('gender', ['Хүү', 'Охин']);            
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
        Schema::drop('ads');
    }
}
