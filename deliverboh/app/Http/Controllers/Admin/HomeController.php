<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Dish;
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
        return view('admin.statistiche');
    }
}
