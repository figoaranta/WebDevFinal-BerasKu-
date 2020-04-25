<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\productImage;
use Illuminate\Http\Request;
use App\Http\Resources\ProductImageResourceCollection;

class productImageController extends Controller
{
    public function show(productImage $productId)
    {
    	$productImages = productImage::all();
    	$images = [];
    	foreach ($productImages as $productImage) {
    		if($productImage->productId = $productId){
    			$productImage = $productImage->productImage;
    			array_push($images, $productImage);
    		}
    	}
    	// return response()->file((public_path('/sources/productImages/'.$images[0])));

    	return response()->json(["data"=>["productImage"=>$images]]);
    }

    public function index():ProductImageResourceCollection
    {
    	return new ProductImageResourceCollection(productImage::paginate());
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'productId'=>'required',
    		'productImage'=>'required'
    	]);

    	if($request->hasfile('productImage')){
    		$file = $request->file('productImage');
    		$extension = $file->getClientOriginalExtension();
    		$filename = time(). '.' . $extension;
    		$file->move('sources/productImages',$filename);
            $photoURL = url('/sources/productImages/'.$filename);
    	}

    	$productImage = productImage::create([
    		'productId'=>$request->productId,
    		'productImage'=>$filename,
    	]);

    	return response()->json(["Status"=>"Success","Path"=>$photoURL],200);
    }

    public function update(Request $request, ProductImage $productId)
    {
    	$count = $request->elementImage;
    	$productImages = productImage::all();
    	foreach ($productImages as $productImage) {
    		if($productImage->productId = $productId){
    			$count--;
    			if($count == 0){
    				if($request->hasfile('productImage')){
			    		$file = $request->file('productImage');
			    		$extension = $file->getClientOriginalExtension();
			    		$filename = time(). '.' . $extension;
			    		$file->move('sources/productImages',$filename);
			            $photoURL = url('/sources/productImages/'.$filename);
			    	}

			    	$productImage->update([
			    		'productId' => $request->productId,
			        	'productImage' => $filename
			        ]);
			    	return response()->json(['Status'=>"Success",'URL'=>$photoURL],200);
    			}
    			
    		}
    	}
    }

    public function destroy(Request $request, productImage $productId)
    {
    	$count = $request->elementImage;
    	$productImages = productImage::all();
    	foreach ($productImages as $productImage) {
    		if($productImage->productId = $productId){
    			$count--;
    			if($count == 0){
    				$productImage->delete();
			    	return response()->json(["Status"=>"Success"],200);
    			}
    		}
    	}
    }


/* //For Always Updating First Element Of Image.
    public function update(Request $request, ProductImage $productId)
    {
    	$productImages = productImage::all();
    	foreach ($productImages as $productImage) {
    		if($productImage->productId = $productId){
    			if($request->hasfile('productImage')){
		    		$file = $request->file('productImage');
		    		$extension = $file->getClientOriginalExtension();
		    		$filename = time(). '.' . $extension;
		    		$file->move('sources/productImages',$filename);
		            $photoURL = url('/sources/productImages/'.$filename);
		    	}

		    	$productImage->update([
		    		'productId' => $request->productId,
		        	'productImage' => $filename
		        ]);
		    	return response()->json(['Status'=>"Success",'URL'=>$photoURL],200);
    		}
    	}
    }
*/

/* //For Always Deleting First Element Of Image.

    public function destroy(productImage $productId)
    {
    	$productImages = productImage::all();
    	foreach ($productImages as $productImage) {
    		if($productImage->productId = $productId){	
				$productImage->delete();
	    		return response()->json(["Status"=>"Success"],200);
    			
    		}
    	}
    }
*/

}












