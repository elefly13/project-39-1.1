<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = config('restaurant_types');
        foreach ($categories as $category){
            $new_category = new category();
            $new_category->cuisine = $category['cuisine'];
            $new_category->save();
        }
    }
}
