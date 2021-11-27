<?php

use Illuminate\Database\Seeder;
use App\DishOrder;

class Dish_OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishOrders = config('dish_order');
        foreach ($dishOrders as $dishOrder){
            $new_dishOrder = new dishOrder();
            $new_dishOrder->dish_id = $dishOrder['dish_id'];
            $new_dishOrder->order_id = $dishOrder['order_id'];
            $new_dishOrder->quantity = $dishOrder['quantity'];
            $new_dishOrder->save();
        }
    }
}
