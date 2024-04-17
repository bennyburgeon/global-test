<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * the cities is large, we need to break it in parts
     * @return void
     */
    public function run()
    {
        //
 DB::table('cities')->delete();
$cities = array(
            array('name' => "Coimbatore",'state_id' => 35),
            array('name' => "Chennai",'state_id' => 35),
            array('name' => "Delhi",'state_id' => 10),
            array('name' => "New Delhi",'state_id' => 10)
		);
        DB::table('cities')->insert($cities);
    }
}
