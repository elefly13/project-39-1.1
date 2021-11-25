<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name', 'ingredients', 'price', 'description', 'visibility', 'image','course'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function allergens(){
        return $this->belongsToMany('App\Allergen');
    }
    public function orders(){
        return $this->belongsToMany('App\Order');
    }
}
