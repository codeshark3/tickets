<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TicketsTableSeeder extends Seeder
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
        DB::table('tickets')->truncate();

        //generate 10 dummy post data
        $tickets = [];

        for ($i = 1; $i <= 20; $i++)
        {
        	$image = "Post_Image_" . rand(1,5) . ".jpg"; 
        	$date = date("Y-m-d H:i:s", strtotime("2016-07-18 08:00:00 +{$i} days"));
        	 $faker = Faker::create();

        	$tickets[] = [
        		'user_id' => $faker->numberBetween(1,3),
        		'title' => $faker->sentence(rand(8,12)),
        		'description' => $faker->paragraph(rand(5,7).true),
        		'slug' => $faker->slug(),
        		'cover_image'=>$faker->randomDigit(0,1) == 1 ? $image : NULL,
        		
        		'category_id' =>  $faker->numberBetween(1,100),
    			'specialist_id' => $faker->numberBetween(1,3),
    			'status' => "Open",
        		'created_at' => $date,
        		'updated_at' => $date

        	];
        }

        DB::table('tickets')->insert($tickets);

    }
    }

