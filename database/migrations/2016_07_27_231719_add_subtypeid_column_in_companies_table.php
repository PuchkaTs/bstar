<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubtypeidColumnInCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companys', function ($table) {
            $table->integer('companysubtype_id');    
            $table->integer('menu_id');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companys', function ($table) {
            $table->dropColumn('companysubtype_id');         
            $table->dropColumn('menu_id');         
        });
    }
}
