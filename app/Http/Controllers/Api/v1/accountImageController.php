<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\accountImage;
use App\Http\Resources\accountImageResource;
use App\Http\Resources\accountImageResourceCollection;
use Illuminate\Http\Request;

class accountImageController extends Controller
{
    public function index():accountImageResourceCollection
    {
        return new accountImageResourceCollection(accountImage::paginate());
    }

    public function show(AccountImage $accountImage):accountImageResource
    {
        return new accountImageResource($accountImage);
    	// return response()->file((public_path('/sources/images/'.$accountImage->profilePic)));
    }

    // public function store(Request $request){
    // 	$request->validate([
    // 		'id' 			=>'required',
    // 		'profilePic' 	=>'required',
    // 	]);

    // 	if($request->hasFile('profilePic')){
    //         $file = $request->file('profilePic');
    //         $extension = $file->getClientOriginalExtension();
    //         $filename = time().".".$extension;
    //         $file->move('sources/images',$filename);
    //         $photoURL = url('/sources/images/'.$filename);
    //     }
    // 	$account = accountImage::create([
    // 		'id'=>$request->id,
    // 		'profilePic'=>$filename,
    // 	]);
    // 	return response()->json(['Status'=>'Success','URL'=>$photoURL],200);
    // }
    
    public function store(Request $request){
        $request->validate([
            'id'            =>'required',
            'profilePic'    =>'required',
        ]);

        if($request->hasFile('profilePic')){
            $file = $request->file('profilePic');
            $extension = $file->getClientOriginalExtension();
            $filename = time().".".$extension;
            $file->move('sources/images',$filename);
            $photoURL = url('/sources/images/'.$filename);
        }
        $account = accountImage::create([
            'id'=>$request->id,
            'profilePic'=>$filename,
        ]);
        return response()->json(['Status'=>'Success','URL'=>$photoURL],200);
    }
    
    public function update(Request $request, AccountImage $accountImage)
    {
    	if($request->hasFile('profilePic')){
            $file = $request->file('profilePic');
            $extension = $file->getClientOriginalExtension();
            $filename = time().".".$extension;
            $file->move('sources/images',$filename);
            $photoURL = url('/sources/images/'.$filename);
        }
        $accountImage->update([
        	'profilePic' => $filename
        ]);
    	return response()->json(['Status'=>'Success','URL'=>$photoURL],200);
    }

    public function destroy(AccountImage $accountImage)
    {
    	$accountImage->delete();
    	return response()->json();
    }

}














