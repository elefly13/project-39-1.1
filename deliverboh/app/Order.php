<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'date', 'delivery_address', 'status', 'total', 'name_user', 'lastname_user', 'note', 'email'
    ];
    public function dishes(){
        return $this->belongsToMany('App\Dish');
    }
}
