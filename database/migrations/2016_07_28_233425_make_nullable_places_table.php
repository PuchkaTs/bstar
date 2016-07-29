<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeNullablePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function ($table) {
            $table->integer('placesubtype_id')->nullable()->change();   
            $table->integer('placemenu_id')->nullable()->change(); 
            $table->integer('placeType_id')->nullable()->change();   
        });       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
