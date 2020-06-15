<?php

namespace App\Http\Controllers\Api\v1;
use App\Comment;
use App\Http\Resources\CommentResource;
use App\Http\Resources\CommentResourceCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CommentController extends Controller
{
    public function show($postId)
    {
        $commentArray = [];
    	$comments = Comment::all();
        foreach ($comments as $comment) {
            if ($comment->postId == $postId) {
                array_push($commentArray,$comment);
            }
        }
        return $commentArray;
    }

    public function index():CommentResourceCollection
    {
    	return new CommentResourceCollection(Comment::all());
    }

    public function store(Request $request)
    {   
    	$request->validate([
    		"postId" => 'required',
    		"commentatorId" => 'required',
    		"comment" => 'required'
    	]);

    	$comment = Comment::create($request->all());

    	return new CommentResource($comment);
    }

    public function update(Request $request, Comment $comment)
    {
        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error'=> $e->getMessage()]);
        }

        if($comment->commentatorId != $user->id){
            return response()->json(["error"=>"unable to update other's comment"]);
        }

    	// $comment->update($request->all());
        $comment->update([
            'comment'=> $request->comment
        ]);

    	return new CommentResource($comment);
    }

    public function destroy(Comment $comment)
    {
        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error'=> $e->getMessage()]);
        }

        if($comment->commentatorId != $user->id){
            return response()->json(["error"=>"unable to delete other's comment"]);
        }

    	$comment->delete();
    	return response()->json([]);
    }
}
