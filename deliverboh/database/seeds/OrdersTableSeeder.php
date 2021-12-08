<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = config('orders');
        foreach ($orders as $order){
            $new_order = new order();
            $new_order->date = $order['date'];
            $new_order->delivery_address = $order['delivery_address'];
            $new_order->status = $order['status'];
            $new_order->total = $order['total'];
            $new_order->name_user = $order['name_user'];
            $new_order->lastname_user = $order['lastname_user'];
            $new_order->note = $order['note'];
            $new_order->email = $order['email'];
            $new_order->created_at = $order['created_at'];
            $new_order->updated_at = $order['updated_at'];
            $new_order->save();
            // $new_order->dishes()->attach($order['id']);
        }
    }
}
