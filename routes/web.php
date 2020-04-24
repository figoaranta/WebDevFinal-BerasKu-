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