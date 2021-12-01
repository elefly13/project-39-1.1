<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dish;
use App\User;
use App\Category;
use App\Allergen;
use App\Order;

class ApiController extends Controller
{
    public function dishes()
    {
        $dishes= Dish::all();
        for ($i=0; $i<Count($dishes); $i++){
            $dishes[$i]->quantity = 1;
        }
        return response()->json([
            'success'=>true,
            'results'=>$dishes
        ]);
    }
    public function users()
    {
        $users= User::all();
        return response()->json([
            'success'=>true,
            'results'=>$users
        ]);
    }
    public function categories()
    {
        $categories= Category::all();
        return response()->json([
            'success'=>true,
            'results'=>$categories
        ]);
    }
    public function allergens()
    {
        $allergens= Allergen::all();
        return response()->json([
            'success'=>true,
            'results'=>$allergens
        ]);
    }
    public function orders()
    {
        $orders= Order::all();
        return response()->json([
            'success'=>true,
            'results'=>$orders
        ]);
    }

}
