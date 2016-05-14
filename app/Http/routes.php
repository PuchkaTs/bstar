<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as'=>'home_path',
    'uses'=>'WelcomeController@index'
]);
Route::get('/product/{id}', [
    'as'=>'product_path',
    'uses'=>'WelcomeController@product'
]);
Route::get('/cart', [
    'as'=>'cart_path',
    'uses'=>'WelcomeController@cart'
]);
Route::get('/checkout', [
    'as'=>'checkout_path',
    'uses'=>'WelcomeController@checkout'
]);
Route::get('/success', [
    'as'=>'success_path',
    'uses'=>'WelcomeController@success'
]);
Route::get('/stores/{id}', [
    'as'=>'store_path',
    'uses'=>'WelcomeController@store_show'
]);
Route::get('@{companyUrl}', [
    'as' => 'store_path',
    'uses'=>'WelcomeController@store_show'
]);

Route::auth();

// Route::get('/home', 'HomeController@index');

/**
 * Super Admin
 */
Route::get('ncst', [
    'as'   => 'ncst_path',
    'uses' => 'UsersController@ncst'
]);
Route::post('ncst', [
    'as'   => 'ncst_path',
    'uses' => 'UsersController@ncst_store'
]);