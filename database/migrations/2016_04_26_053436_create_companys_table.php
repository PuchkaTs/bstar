<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companys', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->integer('companyType_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->date('year');
            $table->string('cover');
            $table->string('logo');
            $table->text('about');
            $table->string('address');
            $table->string('phone');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('website');
            $table->string('youtube');
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
        Schema::drop('companys');
    }
}
