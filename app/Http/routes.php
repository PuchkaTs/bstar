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
Route::get('/search', [
    'as'=>'search_path',
    'uses'=>'WelcomeController@search'
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
    'uses'=>'CardController@checkout'
]);
Route::get('/success', [
    'as'=>'success_path',
    'uses'=>'WelcomeController@success'
]);

Route::get('/stores', [
    'as'=>'store_index_path',
    'uses'=>'WelcomeController@store_index'
]);

Route::get('/stores/{companyUrl}', [
    'as'=>'store_path',
    'uses'=>'WelcomeController@store_show'
]);

Route::get('/stores-type/{id}', [
    'as' => 'store_type_path',
    'uses'=>'WelcomeController@store_type'
]);
Route::get('/news', [
    'as' => 'news_path',
    'uses'=>'NewsController@index'
]);
Route::get('/news/{id}', [
    'as' => 'news_show_path',
    'uses'=>'NewsController@show'
]);
Route::get('/blogs', [
    'as' => 'posts_path',
    'uses'=>'NewsController@posts_index'
]);
Route::post('/blogs', [
    'as' => 'posts_path',
    'uses'=>'NewsController@post_store'
]);
Route::get('/blogs/{id}', [
    'as' => 'post_show_path',
    'uses'=>'NewsController@post_show'
]);
Route::get('/subtype/{id}', [
    'as' => 'subtype_path',
    'uses'=>'WelcomeController@subType'
]);
Route::get('/brand/{id}', [
    'as' => 'brand_path',
    'uses'=>'WelcomeController@brand'
]);
Route::get('/places/{companyUrl}', [
    'as'=>'place_path',
    'uses'=>'WelcomeController@place_show'
]);
Route::get('/places-in-menu/{id}', [
    'as'=>'place_menu_path',
    'uses'=>'WelcomeController@place_menu'
]);
Route::get('/places-in-type/{id}', [
    'as'=>'placeSubType_path',
    'uses'=>'WelcomeController@place_subtype'
]);
Route::get('/ads', [
    'as'=>'ads_path',
    'uses'=>'AdsController@index'
]);
Route::get('/ads/{id}', [
    'as'=>'ads_show_path',
    'uses'=>'AdsController@show'
]);
Route::get('/createad', [
    'as'=>'createad_path',
    'uses'=>'AdsController@create'
]);
Route::post('/createad', [
    'as'=>'createad_path',
    'uses'=>'AdsController@store'
]);
Route::post('/ads/photos', [
    'as'=>'save_photo_path',
    'uses'=>'AdsController@photos'
]);
Route::get('/menu/{id}', [
    'as'=>'menu_path',
    'uses'=>'WelcomeController@menu'
]);
Route::get('/type/{id}', [
    'as'=>'type_path',
    'uses'=>'WelcomeController@type'
]);
Route::get('/content/{url}', [
    'as'=>'content_path',
    'uses'=>'WelcomeController@article'
]);
Route::get('/open-store', [
    'as'=>'open_store_path',
    'uses'=>'StoresController@show'
]);
Route::post('/open-store', [
    'as'=>'open_store_path',
    'uses'=>'StoresController@store'
]);
Route::get('/search', [
    'as'=>'search_path',
    'uses'=>'WelcomeController@search'
]);
Route::get('/sale-products', [
    'as'=>'sale_products_path',
    'uses'=>'WelcomeController@saleProducts'
]);
Route::get('/new-products', [
    'as'=>'new_products_path',
    'uses'=>'WelcomeController@newProducts'
]);
Route::auth();

Route::post('/test', [
    'as' => 'test_path',
    'uses' => 'CardController@post'
]);
Route::get('/card/approve', [
    'as' => 'approve_path',
    'uses' => 'CardController@approve'
]);
Route::get('/card/cancel', [
    'as' => 'cancel_path',
    'uses' => 'CardController@cancel'
]);
Route::get('/card/decline', [
    'as' => 'decline_path',
    'uses' => 'CardController@decline'
]);
Route::get('/career', [
    'as' => 'career_path',
    'uses' => 'WelcomeController@career'
]);
Route::get('/downloads/anket', function(){
    return response()->file('./assets/common/anket.docx');
});
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