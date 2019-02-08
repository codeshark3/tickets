<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SpecialistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //reset table
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
     	DB::table('specialists')->truncate();
     	
     	//generate 3 fake users

     	DB::table('specialists')->insert([
		[
			'name' => "John Doe",
			// 'email' =>"johndoe@test.com",
			// 'password' => root
		], 
		[
			'name' => "Jane Doe",
			// 'email' =>"janendoe@test.com",
			// 'password' => bcrypt('secret')
		],     						
    	[
			'name' => "Malt",
			// 'email' =>"malt@yahoo.com",
			// 'password' => admin
		],     			


     	]);
    }
}
