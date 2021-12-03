<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('/test1', 'Api\Postcontroller');
Route::get('/dishes', 'Api\ApiController@dishes');
Route::get('/users', 'Api\ApiController@users');
Route::get('/categories', 'Api\ApiController@categories');
Route::get('/allergens', 'Api\ApiController@allergens');
Route::get('/orders', 'Api\ApiController@orders');
Route::get('/dishOrders', 'Api\ApiController@dishOrders');
Route::get('/allergenDishes', 'Api\ApiController@allergenDishes');
Route::get('/categoryUsers', 'Api\ApiController@categoryUsers');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
