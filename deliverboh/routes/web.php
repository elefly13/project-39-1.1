<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
use App\Order;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', 'HomeController@index')->name('index');

Route::get('/', 'HomeController@home')->name('homepage');

Auth::routes();


 
Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')
->group(function(){
    
    Route::get('/', 'HomeController@index')->name('index');
    // Route::get('/creazione-menu', 'HomeController@menu')->name('menu');
    // Route::get('/ordini', 'HomeController@ordini')->name('ordini');
    Route::get('/statistiche', 'HomeController@statistiche')->name('statistiche');
    Route::resource('/dishes', 'DishController');
    Route::resource('/orders','OrderController');
    Route::resource('/categories','CategoriesController');
    Route::resource('/user','UserCategoryController');
    Route::resource('/allergens','AllergenController');
});









// Route::get('/checkout', 'HomeController@checkout')->name('homepage');

Route::get('/checkout', function(){
    $gateway = new Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'zfjjgykn84td5wdp',
        'publicKey' => 'mctc6yb5cscswrmn',
        'privateKey' => 'ac3d4ee7cf509dd7573af794ecbb6a2d',
    ]);
 
    
    $token =$gateway->ClientToken()->generate();
    return view('checkout', ['token' => $token]);
}); 

Route::post('/conferma', function(Request $request){
     
    // $order= [
    //     $request->lastname,
    //     $request->name,
    //     $request->lastname,
    //     // $request->lastname
    // ];
    // dd($order);
    $gateway = new Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'zfjjgykn84td5wdp',
        'publicKey' => 'mctc6yb5cscswrmn',
        'privateKey' => 'ac3d4ee7cf509dd7573af794ecbb6a2d',
    ]);

    $amount = $request->amount;
    $nonce = $request->payment_method_nonce;

    $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => true
        ]
    ]);
    
    $data = $request->all();
    $new_order = new order();
    // $new_order->fill($data);
    $new_order['lastname_user']=$request['lastname'];
    $new_order->save();
    // dd( $new_order['lastname']);
    if ($result->success) 
    {
      
        // $new_order->dishes()->attach($data['dish']);
 
        $transaction = $result->transaction;
        // header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);
        return back()->with('success_message','Transaction complete ID:'. $transaction->id);
    } else {
        $errorString = "";

        foreach($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }

        // $_SESSION["errors"] = $errorString;
        // header("Location: " . $baseUrl . "index.php");
        return back()->withErrors('An error occurred with the message: '.$result->message);
    }
});


