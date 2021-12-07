<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Braintree\Gateway;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.welcome');
    }

    public function home(){
        return view('api.home');
    }
    public function checkout()
    {
        // $gateway = new Braintree\Gateway([
        //     'environment' => getenv('BT_ENVIRONMENT'),
        //     'merchantId' => getenv('BT_MERCHANT_ID'),
        //     'publicKey' => getenv('BT_PUBLIC_KEY'),
        //     'privateKey' => getenv('BT_PRIVATE_KEY')
        // ]);


        return view('checkout');
    }
}