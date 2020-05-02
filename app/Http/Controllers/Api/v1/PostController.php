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

    public function update(Request $request, Post $post)
    {
        
        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error'=> $e->getMessage()]);
        }

        if($post->userId != $user->id){
            return response()->json(['error'=> "Unable to modify other user's post"]);
        }

        if($request->userId != $user->id){
            return response()->json(['error'=> "Unable to modify post for other user"]);
        }

    	$post->update($request->all());
    	return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error'=> $e->getMessage()]);
        }

        if($post->userId != $user->id){
            return response()->json(['error'=> "Unable to delete other user's post"]);
        }
    	$post->delete();
    	return response()->json([]);
    } 

    public function self()
    {

       try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error'=> $e->getMessage()]);
        } 
        $post = Post::where('userId',$user->id)->first();
        return $post;
    } 

    public function store(Request $request)
    {
        $request->validate([
            'userId' => 'required',
            'productId' => 'required',
            'postTitle' => 'required',
            'postDescription' =>'required'
        ]);

        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error'=> $e->getMessage()]);
        } 
        if($request->userId != $user->id){
            return response()->json(['error'=> "Unable to add post for other user"]);
        }
        $post = post::create($request->all());
        return new PostResource($post);
    }
    
}









