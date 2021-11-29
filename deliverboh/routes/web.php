<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
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
    // Route::get('/statistiche', 'HomeController@statistiche')->name('statistiche');
    Route::resource('/dishes', 'DishController');
    Route::resource('/orders','OrderController');
    Route::resource('/allergens','AllergenController');
});
