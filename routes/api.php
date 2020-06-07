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
	Route::delete('/cartDeleteAll/{id}/{accountId}','Api\v1\ProductController@deleteCartItemAll');
	Route::delete('/cartDelete/{id}/{accountId}', 'Api\v1\ProductController@deleteCartItem');
	Route::post('/addToCart/{productId}/{accountId}','Api\v1\ProductController@addToCart');
	Route::get('/cart/{id}', 'Api\v1\ProductController@viewCart');
	Route::get('/account/wishlist/{id}','Api\v1\AccountController@showWishlist');
	Route::put('/account/resetPassword','Api\v1\AccountController@resetPassword');
	Route::apiResource('/account','Api\v1\AccountController')->only(['show','destroy','update','store']);
	Route::apiResource('/accounts','Api\v1\AccountController')->only(['index']);
	Route::apiResource('/product','Api\v1\ProductController')->only(['show','destroy','update','store']);
	Route::apiResource('/products','Api\v1\ProductController')->only(['index']);
	Route::apiResource('/productImages','Api\v1\productImageController')->only(['index']);
	Route::apiResource('/productImage','Api\v1\productImageController')->only(['show','destroy','update','store']);
	Route::apiResource('/accountImages','Api\v1\accountImageController')->only(['index']);
	Route::apiResource('/accountImage','Api\v1\accountImageController')->only(['show','destroy','update','store']);
	Route::apiResource('/posts','Api\v1\PostController')->only(['index']);
	Route::get('/post/self','Api\v1\PostController@self');
	Route::apiResource('/post','Api\v1\PostController')->only(['show','destroy','update','store']);
	Route::apiResource('/comments','Api\v1\CommentController')->only(['index']);
	Route::apiResource('/comment','Api\v1\CommentController')->only(['show','destroy','update','store']);
	Route::apiResource('/wishlists','Api\v1\WishlistController')->only(['index']);
	Route::apiResource('/wishlist','Api\v1\WishlistController')->only(['show','destroy','update','store']);
	Route::apiResource('/notifications','Api\v1\NotificationController')->only(['index']);
	Route::apiResource('/notification','Api\v1\NotificationController')->only(['show','destroy','update','store']);
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Api\v1\AuthController@login');
    Route::post('logout', 'Api\v1\AuthController@logout');
    Route::post('refresh', 'Api\v1\AuthController@refresh');
    Route::post('me', 'Api\v1\AuthController@me');
    Route::post('payload', 'Api\v1\AuthController@payload');
});
