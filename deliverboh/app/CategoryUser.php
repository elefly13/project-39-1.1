<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryUser extends Model
{
    protected $table = 'category_users';
    protected $fillable = [
        'category_id', 'user_id'
    ];
}
