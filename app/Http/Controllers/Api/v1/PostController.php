<?php

namespace App\Http\Controllers\Api\v1;
use App\Post;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostResourceCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post):PostResource
    {
    	return new PostResource($post);
    }

    public function index():PostResourceCollection
    {
    	return new PostResourceCollection(Post::paginate());
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'userId' => 'required',
    		'productId' => 'required',
    		'postTitle' => 'required',
    		'postDescription' =>'required'
    	]);

    	$post = post::create($request->all());
    	return new PostResource($post);
    }

    public function update(Request $request, Post $post):PostResource
    {
    	$post->update($request->all());
    	return new PostResource($post);
    }

    public function destroy(Post $post)
    {
    	$post->delete();
    	return response()->json([]);
    }
}
