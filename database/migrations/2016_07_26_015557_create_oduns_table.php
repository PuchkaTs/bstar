<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oduns', function(Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('title');
            $table->string('photo');
            $table->string('photobottom');
            $table->text('body');
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
        Schema::drop('oduns');
    }
}
