<?php

use Illuminate\Database\Seeder;
use App\Allergen;

class AllergensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allergens = config('allergens');
        foreach ($allergens as $allergen){
            $new_allergen = new allergen();
            $new_allergen->name = $allergen['name'];
            $new_allergen->save();
        }
    }
}
