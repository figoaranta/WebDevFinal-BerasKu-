<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('account', 'AccountCrudController');
    // CRUD::resource('account', 'AccountCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::crud('post', 'PostCrudController');
    Route::crud('comment', 'CommentCrudController');
    Route::crud('wishlist', 'WishlistCrudController');
    Route::crud('notification', 'NotificationCrudController');
}); // this should be the absolute last line of this file