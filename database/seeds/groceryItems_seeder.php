<?php

use Illuminate\Database\Seeder;

class groceryItems_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($x = 0; $x < 10; $x++){
            DB::table('grocery_items')->insert([
                'name' => str_random(10),
                'inCart' => 0,
                'bought' => 0
            ]);
        }

    }
}
