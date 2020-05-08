<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/accountImageCRUD')->group(function(){
	Route::get('/insertAccountImage','AccountImageCRUDController@view');
	Route::post('/addimage','AccountImageCRUDController@store')->name('addimage');
	Route::get('/accountImagepage','AccountImageCRUDController@index');
	Route::get('/editImage/{id}','AccountImageCRUDController@edit');
	Route::put('/editImage/updateimage/{id}','AccountImageCRUDController@update');
	Route::get('/deleteImage/{id}','AccountImageCRUDController@delete');
});

Route::prefix('/productImageCRUD')->group(function(){
	Route::get('/insertProductImage','ProductImageCRUDController@view');
	Route::post('/addProductImage','ProductImageCRUDController@store')->name('addProductImage');
	Route::get('/productImagePage','ProductImageCRUDController@index');
	Route::get('/editProductImage/{id}','ProductImageCRUDController@edit');
	Route::put('/editProductImage/updateProductImage/{id}','ProductImageCRUDController@update');
	Route::get('deleteImage/{id}','ProductImageCRUDController@delete');
});

Route::prefix('/testStripe')->group(function(){
	Route::get('/checkout','CheckoutController@index');
	Route::post('/checkout','CheckoutController@store')->name('checkout.store');
});

Route::prefix('/productPage')->group(function(){
	Route::get('/products', 'Api\v1\ProductController@showProductPage');
	Route::get('/productDelete/{id}', 'Api\v1\ProductController@deleteItem');
	Route::get('/addProduct/{id}','Api\v1\ProductController@addToCart');
	Route::get('/cart', 'Api\v1\ProductController@viewCart');
	Route::get('/productDeleteAll/{id}','Api\v1\ProductController@deleteItemAll');
});

