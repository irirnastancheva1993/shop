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

Route::get('/home', 'HomeController@index');

Route::get('/', 'PagesController@home');
Route::get('about', 'PagesController@about');
Route::get('cards', 'CardsController@index');
Route::get('cards/{card}', 'CardsController@show')-> where ('card', '[0-9]');
Route::post('cards/{card}/notes', 'NotesController@store');
Route::get('/goods', 'GoodsController@index');
Route::get('/goods/{id}', 'GoodsController@index')-> where ('id', '[0-9]');
Route::get('/aboutus', 'MainController@aboutusAction');
Route::get('/main', 'MainController@getMain');
Route::get('/users', 'MainController@getAllUsers');
Route::get('/users/{id}', 'MainController@getUser')-> where ('id', '[0-9]');

Route::get('/orders', 'MainController@getAllOrders');
Route::get('/orders/{id}', 'MainController@getOrder')-> where ('id', '[0-9]');
Route::get('/categories', 'MainController@getAllCategories');
Route::get('/categories/{id}', 'MainController@getCategories')-> where ('id', '[0-9]');


