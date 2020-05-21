<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\Wishlist;
use App\Http\Resources\WishlistResource;
use App\Http\Resources\WishlistResourceCollection;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
	public function index():WishlistResourceCollection
	{
		return new WishlistResourceCollection(Wishlist::paginate());
	}

    public function show(Wishlist $wishlist):WishlistResource
    {
    	return new WishlistResource($wishlist);
    }
   
    public function store(Request $request)
    {
    	$request->validate([
    		'postId' => 'required',
    		'accountId' => 'required'
    	]);

    	$wishlist = Wishlist::create($request->all());
    	return $wishlist;
    }

    public function update(Request $request , Wishlist $wishlist):WishlistResource
    {
    	$wishlist->update($request->all());
    	return new WishlistResource($wishlist);
    }

    public  function destroy(Wishlist $wishlist)
    {
    	$wishlist->delete();
    	return response()->json();
    }
}
