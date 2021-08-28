<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
 
use Faker\Factory as Faker;
 
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

    	$faker = Faker::create('ar_SA');
		// $faker = Faker\Factory::create('ar_SA');
    	foreach (range(1,200) as $index) {
	        DB::table('ratings')->insert([
                'user_id'       => $faker->numberBetween(1,200),
                'rate_id'       => $faker->numberBetween(1,200),
                'type'          => $faker->numberBetween(0,1),
                'content'       => $faker->realText(200,2),
                'post_id'       => $faker->numberBetween(700,900),
                'buy_date'      => $faker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get()),
	            'created_at'	=> $faker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get()),
	            'updated_at'	=> $faker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get()),
	        ]);
        }
    }
}