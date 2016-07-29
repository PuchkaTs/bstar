<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeNullableCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companys', function ($table) {
            $table->integer('companysubtype_id')->nullable()->change();     
            $table->integer('menu_id')->nullable()->change();  
            $table->integer('companyType_id')->nullable()->change();

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
