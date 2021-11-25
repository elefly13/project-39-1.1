<?php

use Illuminate\Database\Seeder;
use App\CategoryUser;
class Category_UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restUsers = config('user_types');
        foreach ($restUsers as $categoryUser){
            $new_categoryUser = new categoryUser();
            $new_categoryUser->user_id = $categoryUser['user_id'];
            $new_categoryUser->category_id = $categoryUser['category_id'];
            $new_categoryUser->save();
        }
    }
}
