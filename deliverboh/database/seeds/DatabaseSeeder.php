<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AllergensTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(DishesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(Dish_OrderTableSeeder::class);
        $this->call(Allergen_DishTableSeeder::class);
        $this->call(Category_UserTableSeeder::class);
    }
}
