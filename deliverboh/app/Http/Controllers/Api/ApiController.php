<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dish;
use App\User;
use App\Category;
use App\Allergen;
use App\Order;
use App\DishOrder;
use App\AllergenDish;
use App\CategoryUser;
use PHPUnit\Framework\Constraint\Count;

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
    public function dishOrders()
    {
        $disheOrders= DishOrder::all();
        return response()->json([
            'success'=>true,
            'results'=>$disheOrders
        ]);
    }
    public function allergenDishes()
    {
        $allergenDishes= AllergenDish::all();
        return response()->json([
            'success'=>true,
            'results'=>$allergenDishes
        ]);
    }
    public function categoryUsers()
    {
        $categoryUsers= CategoryUser::all();
        return response()->json([
            'success'=>true,
            'results'=>$categoryUsers
        ]);
    }

}
