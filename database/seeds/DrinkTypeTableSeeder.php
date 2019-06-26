<?php

use Illuminate\Database\Seeder;

class DrinkTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('drink_types')->insert([
            'name' => 'pet',
        ]);

        DB::table('drink_types')->insert([
            'name' => 'garrafa',
        ]);

        DB::table('drink_types')->insert([
            'name' => 'lata',
        ]);
    }
}
