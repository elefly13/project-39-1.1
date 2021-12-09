<?php

use App\DishOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
use App\Order;
use App\User;
use App\Dish;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewMail;
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

Route::post('/checkout', function(Request $request){

    $sum=0;
     
    for ($i=0; $i <count( $request['price']); $i++){
        $sum=$sum+ ( $request['price'][$i]*$request['quantity'][$i]);
    };
    
    
     $cart=[
        'dish_id'=>$request['id'],
        'name'=>$request['name'],
        'price'=> $request['price'],
        'description'=> $request['description'],
        'quantity'=> $request['quantity'],
        'sum'=>$sum
     ];
    //  $name=$request['name'];
    //  $price= $request['price'];
    //  $description= $request['description'];
    // $quantity= $request['quantity'];
    $gateway = new Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'zfjjgykn84td5wdp',
        'publicKey' => 'mctc6yb5cscswrmn',
        'privateKey' => 'ac3d4ee7cf509dd7573af794ecbb6a2d',
    ]);
 
    
    $token =$gateway->ClientToken()->generate();
    return view('checkout', ['token' => $token],['cart'=>$cart]);
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
    

    $new_order = new order();
    $new_order['email']=$request['email'];
    $new_order['lastname_user']=$request['lastname'];
    $new_order['name_user']=$request['name'];
    $new_order['delivery_address']=$request['address'];
    $new_order['date']= date("Y-m-d") ;
    $new_order['total']=$amount;
    $new_order['note']=$request['note'];
     
    //  $new_order->dishes()->attach($data['dish']);
    // dd( $new_order['lastname']);
    if ($result->success) 
    {
        $new_order['status']=1;
        $new_order->save();
        
        
        for ($i=0; $i< count( $request['id']); $i++ ){
            $prova= new DishOrder();
            $prova['dish_id']=$request['id'][$i];
            $prova['order_id']=$new_order['id'];
            $prova->save();
        };
        $dish = Dish::findOrFail($prova['dish_id']);
        
        $user=User::whereHas('dishes',function($q ) use ($dish) {
            $q->where('user_id', $dish['user_id']);
        })->get();
        $mailristorante=$user[0]['email'];
        Mail::to( $mailristorante)->send(new SendNewMail());
        Mail::to($new_order['email'])->send(new SendNewMail());
 
        $transaction = $result->transaction;
        return view('api.home');
        // header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);
        // return back()->with('success_message','Transaction complete ID:'. $transaction->id);
    } else {
        $errorString = "";
        $new_order['status']=0;
        $new_order->save();
        foreach($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }

        // $_SESSION["errors"] = $errorString;
        // header("Location: " . $baseUrl . "index.php");
        return back()->withErrors('An error occurred with the message: '.$result->message);
    }
});


