<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productImage;
class ProductImageCRUDController extends Controller
{
    public function view()
    {
    	return view('productImageCRUD/insertProductImage');
    }

    public function store(Request $request)
    {
    	$productImage = new ProductImage();
    	$productImage->productId = $request->input('productId');

    	if($request->hasfile('productImage')){
    		$file = $request->file('productImage');
    		$extension = $file->getClientOriginalExtension();
    		$filename = time(). '.' .$extension;
    		$file->move('sources/productImages',$filename);
    		$productImage->productImage = $filename;
    	}
    	else{
    		return $request;
    		$productImage->productImage = '';
    	}

    	$productImage->save();
    	return redirect('productImageCRUD/productImagePage');
    }

    public function index()
    {
    	$productImages = ProductImage::all();
    	return view('productImageCRUD/productImagePage')->with('productImages',$productImages);
    }

    public function edit($id)
    {
    	$productImage = productImage::find($id);
        return view('productImageCRUD/updateProductImage')->with('productImage',$productImage);
    }

    public function update(Request $request , $id)
    {
    	$productImage = ProductImage::find($id);
    	$productImage->productId = $request->input('productId');

    	if($request->hasfile('productImage')){
    		$file = $request->file('productImage');
    		$extension = $file->getClientOriginalExtension();
    		$filename = time(). '.' .$extension;
    		$file->move('sources/productImages',$filename);
    		$productImage->productImage = $filename;
    	}

    	$productImage->save();
    	return redirect('productImageCRUD/productImagePage')->with('productImage',$productImage);
    }

    public function delete($id)
    {
    	$productImage = productImage::find($id);
    	$productImage->delete();
    	return redirect('productImageCRUD/productImagePage')->with('productImage',$productImage);
    }
}
















