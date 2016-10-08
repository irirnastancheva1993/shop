<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();

Route::get('home', 'HomeController@index');
Route::get('welcome', 'HomeController@welcome');
Route::get('aboutus', 'HomeController@about');

Route::get('cards', 'CardsController@index');
Route::get('cards/{card}', 'CardsController@show')-> where ('card', '[0-9]');
Route::post('cards/{card}/notes', 'NotesController@store');

Route::get('category', 'GoodsController@indexAction');
Route::get('category/{id}', 'GoodsController@categoryAction');
Route::get('category/goods/{id}', 'GoodsController@goodAction');
Route::post('category/goods/{goods}/edit', 'CommentController@editAction');

Route::get('basket', 'OrdersController@basketGoods');
Route::post('basket/update', 'OrdersController@updateBasket');
Route::post('orders/goods/{id}', 'OrdersController@successfulAdd');

Route::group(['prefix' => 'admin'], function (){
    Route::get('login', 'AdminAuthController@index');
    Route::get('products', 'AdminProductsController@index');
    Route::get('categories', 'AdminCategoriesController@index');
    Route::get('pages', 'AdminPagesController@index');
    Route::get('main', 'AdminMainController@index');
});

Route::group(['prefix' => 'api.v1'], function(){
    Route::get('products', 'ApiController@products');
    Route::get('products/category/{id}', 'ApiController@productCategoryId');
    Route::get('products/{id}', 'ApiController@productId');
    Route::get('users', 'ApiController@showUsers');
    Route::post('orders', 'ApiController@createOrders');
    Route::delete('orders/{id}', 'ApiController@deleteOrderId');
});
