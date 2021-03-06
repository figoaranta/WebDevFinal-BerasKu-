<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\accountImage;
use App\Http\Resources\accountImageResource;
use App\Http\Resources\accountImageResourceCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class accountImageController extends Controller
{
    public function index():accountImageResourceCollection
    {
        return new accountImageResourceCollection(accountImage::all());
    }

    public function show(AccountImage $accountImage)
    {
        // return new accountImageResource($accountImage);
        $url =  Storage::disk('s3')->url($accountImage->profilePic);

        $url = substr($url, 4);
        $url = "https" . $url;
        return response()->json(["imageURL" => $url]);
    	// return response()->file((public_path('/sources/images/'.$accountImage->profilePic)));
    }
    
    public function store(Request $request){
        $request->validate([
            'id'            =>'required',
            'profilePic'    =>'required',
        ]);

        if($request->hasFile('profilePic')){
            $file = $request->file('profilePic');
            $extension = $file->getClientOriginalExtension();
            $filename = time().".".$extension;
            $filePath = 'accountImage/'.$filename;
            $path =request()->file('profilePic')->store('accountImage','s3');
            // $storage = Storage::disk('s3');
            // $storage->put($filePath,  fopen($file,  'r+'), 'public'); 
        }   

        $account = accountImage::create([
            'id'=>$request->id,
            'profilePic'=>$path,
        ]);
        // return $path;
        // return Storage::disk('s3')->url($path);
        
        return response()->json(['Status'=>'Success','URL'=>$path],200);
    }
    
    public function update(Request $request, AccountImage $accountImage)
    {
        Storage::disk('s3')->delete($accountImage->profilePic);

    	if($request->hasFile('profilePic')){
            $file = $request->file('profilePic');
            $extension = $file->getClientOriginalExtension();
            $filename = time().".".$extension;
            $filePath = 'accountImage/'.$filename;
            $path =request()->file('profilePic')->store('accountImage','s3');
        }
        $accountImage->update([
        	'profilePic' => $path
        ]);
    	return response()->json(['Status'=>'Success','imageURL'=>$path],200);
    }

    public function destroy(AccountImage $accountImage)
    {
        $filePath = $accountImage->profilePic;
        Storage::disk('s3')->delete($filePath);
    	$accountImage->delete();
    	return response()->json();
    }

}














