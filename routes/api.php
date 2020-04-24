<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('v1')->group(function(){
	Route::apiResource('/account','Api\v1\AccountController')->only(['show','destroy','update','store']);
	Route::apiResource('/accounts','Api\v1\AccountController')->only(['index']);
	Route::apiResource('/product','Api\v1\ProductController')->only(['show','destroy','update','store']);
	Route::apiResource('/products','Api\v1\ProductController')->only(['index']);
	Route::apiResource('/accountImage','Api\v1\accountImageController');
});
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Api\v1\AuthController@login');
    Route::post('logout', 'Api\v1\AuthController@logout');
    Route::post('refresh', 'Api\v1\AuthController@refresh');
    Route::post('me', 'Api\v1\AuthController@me');
    Route::post('payload', 'Api\v1\AuthController@payload');
});

// 171149
// 170642