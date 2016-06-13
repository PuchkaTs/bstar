<?php

use App\ProductSubType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ProductSubTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

  		//disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    	ProductSubType::truncate();

       	factory(ProductSubType::class, 100)->create();

        // supposed to only apply to a single connection and reset it's self
        // but I like to explicitly undo what I've done for clarity
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

       	Model::reguard();
    }
}
