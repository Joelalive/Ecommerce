<?php

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

Route::get('/', 'FrontendController@index')->name('index');
Route::get('/product/{id}', 'FrontendController@singleProduct')->name('product.single');

Route::post('/cart/add', 'ShoppingController@add_to_cart')->name('cart.add');
Route::get('/cart', 'ShoppingController@cart')->name('cart');
Route::get('/cart/delete/{id}', 'ShoppingController@cart_delete')->name('cart.delete');
Route::get('/cart/incr/{id}/{qty}', 'ShoppingController@incr')->name('cart.incr');
Route::get('/cart/decr/{id}/{qty}', 'ShoppingController@decr')->name('cart.decr');
Route::get('/cart/rapid/add/{id}', 'ShoppingController@rapid_add')->name('cart.rapid.add');

Route::get('/cart/checkout', 'CheckoutController@index')->name('cart.checkout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/product/create', 'ProductsController@create')->name('product.create');
Route::post('/product/store', 'ProductsController@store')->name('product.store');
Route::get('/product/edit/{product}', 'ProductsController@edit')->name('product.edit');
Route::get('/product/delete/{product}', 'ProductsController@destroy')->name('product.delete');
Route::post('/product/update/{product}', 'ProductsController@update')->name('product.update');

