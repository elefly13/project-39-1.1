<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function menu()
    {
        return view('admin.menu');
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
