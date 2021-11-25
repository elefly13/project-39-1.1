<?php

use Illuminate\Database\Seeder;
use App\Dish;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = config('dishes');
        foreach ($dishes as $dish){
            $new_dish = new dish();
            $new_dish->user_id = $dish['user_id'];
            $new_dish->name = $dish['name'];
            $new_dish->ingredients = $dish['ingredients'];
            $new_dish->price = $dish['price'];
            $new_dish->description = $dish['description'];
            $new_dish->visibility = $dish['visibility'];
            $new_dish->image = $dish['image'];
            $new_dish->course = $dish['course'];
            $new_dish->save();
        }
    }
}
