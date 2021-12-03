<?php

use Illuminate\Database\Seeder;
use App\AllergenDish;

class Allergen_DishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allergenDishes = config('allergen_dish');
        foreach ($allergenDishes as $allergenDish){
            $new_allergenDish = new allergenDish();
            $new_allergenDish->allergen_id = $allergenDish['allergen_id'];
            $new_allergenDish->dish_id = $allergenDish['dish_id'];
            $new_allergenDish->save();
        }
    } 
}
