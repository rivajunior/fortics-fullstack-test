<?php

use Illuminate\Database\Seeder;

class DrinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(App\Models\Drink::class, 50)->create();
    }
}
