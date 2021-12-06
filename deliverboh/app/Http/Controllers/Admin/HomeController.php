<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Dish;
use App\DishOrder;
use App\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // $id = Auth::id();


        return view('admin.dashboard',compact('user'));
    }
    public function menu($id)
    {
        $menu=Dish::where('user_id', $id)->get();
        
        
        return view('admin.menu', compact('menu'));
    }
    public function ordini()
    {
        return view('admin.ordini');
    }
    public function statistiche()

    {
        $data_month=[];
        $year_now=now()->year;
        $user = Auth::user();
        for ($i = 1; $i <= 12; $i++) {
            $temp =count( Order::whereMonth('created_at', $i)->whereYear('created_at', $year_now )->get());
           array_push($data_month, $temp);
        };


        $data_year=[];
        for ($i = 0; $i <= 4; $i++) {
            $temp =count( Order::whereYear('created_at', ($year_now - $i))->get());
           array_push($data_year, $temp);
        };
       
       
        $test=Order::whereHas('dishes',function($q ) use ($user) {
            $q->where('user_id', $user['id']);
        })->get();

        $sum=0;
          for ($i = 0; $i < count($test); $i++){
            $sum=$test[$i]['total']+$sum;
        };
    
         
        return view('admin.statistiche',compact('test'));
    }
}
