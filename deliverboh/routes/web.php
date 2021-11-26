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
Route::get('/', 'HomeController@index')->name('index');

Route::get('/vue-home', 'HomeController@home')->name('homepage');
 
Auth::routes();

 
Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')
->group(function(){
    
    // Route::get('/', 'HomeController@index')->name('index');
    // Route::get('/creazione-menu', 'HomeController@menu')->name('menu');
    Route::get('/ordini', 'HomeController@ordini')->name('ordini');
    Route::get('/statistiche', 'HomeController@statistiche')->name('statistiche');
    Route::get('/', 'DishController@index')->name('dashboard');
    Route::resource('/', 'DishController');
    Route::get('/show', 'DishController@show')->name('show');
    Route::get('/create', 'DishController@create')->name('create');
    Route::get('/{id}/edit', 'DishController@edit')->name('edit');
    Route::put('/{id}', 'DishController@update')->name('update');
    Route::delete('/{id}', 'DishController@destroy')->name('destroy');
    
});
