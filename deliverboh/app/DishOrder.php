<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishOrder extends Model
{
    protected $table = 'dish_order';
    protected $fillablep = [ 'dish_id', 'order_id'];
}
