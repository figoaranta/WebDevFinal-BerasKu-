<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product):ProductResource
    {
    	return new ProductResource($product);
    }

    public function index():ProductResourceCollection
    {
    	return new ProductResourceCollection(Product::paginate());
    }
    public function store(Request $request)
    {
    	$request->validate([
    		'riceGradeType' 	=> "required",
	        'riceType' 			=> "required",
	        'riceShapeType' 	=> "required",
	        'riceColorType' 	=> "required",
	        'riceTextureType' 	=> "required",
	        'quantity' 			=> "required",
	        'riceUnitType' 		=> "required",
	        'price' 			=> "required",
    	]);

    	$product = Product::create($request->all());
    	return new ProductResource($product);
    }
    public function update(Product $product,Request $request):ProductResource
    {

    	$product->update($request->all()); 

    	return new ProductResource($product);
    }
    public function destroy(Product $product)
    {
    	$product->delete();
    	return response()->json();
    }
}
 