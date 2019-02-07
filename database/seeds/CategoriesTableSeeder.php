<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
           DB::table('categories')->truncate();

        DB::table('categories')->insert([
        [
        	'title' => 'Internet',
        	'slug' => 'internet'

        ],
         [
        	'title' => 'Hardware Repairs',
        	'slug' => 'hardware-repairs'

        ],
         [
        	'title' => 'Printer',
        	'slug' => 'internet-technology'

        ],
        [
        	'title' => 'Photography',
        	'slug' => 'photography'

        ],


        ]);

        //update the tickets
          for ($ticket_id = 1; $ticket_id <= 10; $ticket_id++)
        {
        	 $faker = Faker::create();

 
        	$category_id = $faker->numberBetween(1,3);
           DB::table('tickets')
           		->where('id',$ticket_id)
           		->update(['category_id' => $category_id]);
		}
        }

     
    }

