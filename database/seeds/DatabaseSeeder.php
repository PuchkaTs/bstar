<?php
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$this->call('UserSeeder');

    	$this->call('MenuSeeder');

    	$this->call('CompanyTypeSeeder');

    	$this->call('CompanySeeder');

    	$this->call('ProductMenuSeeder');

    	$this->call('ProductTypeSeeder');

    	$this->call('ProductSeeder');

    }
}
