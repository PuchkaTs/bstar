<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyTypes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->smallInteger('position')->unsigned();
            $table->integer('menu_id');
            $table->integer('comp_number');   //how many companies to show in menu
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
        Schema::drop('companyTypes');
    }
}
