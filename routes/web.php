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
Route::get('welcome', 'MainController@indexAction');

Route::get('cards', 'CardsController@index');
Route::get('cards/{card}', 'CardsController@show')-> where ('card', '[0-9]');
Route::post('cards/{card}/notes', 'NotesController@store');

Route::get('category', 'GoodsController@indexAction');
Route::get('category/{id}', 'GoodsController@categoryAction');
Route::get('category/goods/{id}', 'GoodsController@goodAction');
Route::post('category/goods/{goods}/edit', 'CommentController@editAction');
Route::post('category/goods/{goods}/add', 'GoodsController@addGood');
Route::post('category/goods/{goods}/buy', 'OrdersController@buyGood');

Route::get('aboutus', 'HomeController@about');

Route::get('users', 'HomeController@getAllUsers');
Route::get('users/{id}', 'HomeController@getUser')-> where ('id', '[0-9]');

Route::get('orders', 'HomeController@getAllOrders');
Route::get('orders/{id}', 'HomeController@getOrder')-> where ('id', '[0-9]');


