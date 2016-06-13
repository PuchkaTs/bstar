<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSubTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productsubtypes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->smallInteger('position')->unsigned();
            $table->integer('producttype_id');
            $table->integer('product_number');
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
        Schema::drop('productsubtypes');
    }
}
