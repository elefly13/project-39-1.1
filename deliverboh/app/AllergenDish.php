<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllergenDish extends Model
{
    protected $table = 'allergen_dish';
    protected $fillable = [ 'allergen_id', 'dish_id'];
}
