<?php

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
    Route::get('log', 'Admin\LoginController@index');
    Route::post('log', 'Admin\LoginController@login');

    Route::get('goods', 'Admin\AdminProductsController@index');
    Route::post('goods', 'Admin\AdminProductsController@create');
    Route::put('goods/{id}', 'Admin\AdminProductsController@update');
    Route::delete('goods/{id}', 'Admin\AdminProductsController@destroy');

    Route::get('categories', 'Admin\AdminCategoriesController@index');
    Route::put('categories/{id}', 'Admin\AdminCategoriesController@update');
    Route::post('categories', 'Admin\AdminCategoriesController@create');
    Route::delete('categories/{id}', 'Admin\AdminCategoriesController@destroy');

    Route::get('pages', 'Admin\AdminPagesController@index');

    Route::get('orders', 'Admin\AdminOrdersController@index');

    Route::get('users', 'Admin\AdminUsersController@index');
    Route::post('users', 'Admin\AdminUsersController@create');
    Route::put('users/{id}', 'Admin\AdminUsersController@update');
    Route::delete('users/{id}', 'Admin\AdminUsersController@destroy');

});

Route::group(['prefix' => 'api.v1', 'middleware' => 'auth:api'], function(){
    Route::post('/short', 'UrlMapperController@store');
    Route::get('categories', 'ApiController@categories');
    Route::get('categories/goods/{id}', 'ApiController@getGoodId');
    Route::get('categories/{id}', 'ApiController@categoryGoods');
    Route::get('users', 'ApiController@showUsers');
    Route::post('orders', 'ApiController@createOrders');
    Route::delete('orders/{id}', 'ApiController@destroyOrders');
});
