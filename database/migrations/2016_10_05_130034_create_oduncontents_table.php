<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOduncontentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oduncontents', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('oduntag_id')->unsigned();                       
            $table->string('title');
            $table->string('photo');
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
        Schema::drop('oduncontents');
    }
}
