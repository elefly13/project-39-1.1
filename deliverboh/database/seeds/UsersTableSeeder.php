<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = config('URs');
        foreach ($users as $user){
            $new_user = new user();
            $new_user->id = $user['id'];
            $new_user->name = $user['name'];
            $new_user->email = $user['email'];
            $new_user->password = $user['password'];
            $new_user->restaurant_name = $user['restaurant_name'];
            $new_user->address = $user['address'];
            $new_user->vat_number = $user['vat_number'];
            $new_user->save();
        }
    }
}
