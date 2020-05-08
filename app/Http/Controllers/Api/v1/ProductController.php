<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Cart;

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

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart',$cart);
        // dd($request->session()->get('cart'));
        // $cart->deleteAll();
        // Session::flush();
        return redirect('productPage/products');
        
    }

    public function viewCart()
    {
        if(!Session::has('cart')){
            return view('productPage/cart');
        }
        else{
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('productPage/cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
        }
        
    }

    public function deleteItem(Request $request ,$id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') :null;

        if($oldCart->totalQuantity == 1){
            Session::forget('cart');
            return redirect('productPage/cart'); 
            
        }

        if($oldCart->items[$id]['quantity'] == 1){
            $oldCart->totalQuantity = $oldCart->totalQuantity-1;
            $oldCart->totalPrice = $oldCart->totalPrice - $oldCart->items[$id]['price'];
            unset($oldCart->items[$id]);
            return redirect('productPage/cart');
        }
        $basePrice = $oldCart->items[$id]['price']/$oldCart->items[$id]['quantity'];

        $oldCart->totalQuantity = $oldCart->totalQuantity-1;
        $oldCart->items[$id]['quantity'] = $oldCart->items[$id]['quantity']-1;
        $oldCart->items[$id]['price'] = $oldCart->items[$id]['price'] - $basePrice;
        $oldCart->totalPrice = $oldCart->totalPrice - $basePrice;
        
        // $request->session()->put('cart',$oldCart);
        return redirect('productPage/cart'); 
    }

    public function deleteItemAll(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') :null;
        $oldCart->totalPrice = $oldCart->totalPrice - $oldCart->items[$id]['price'];
        $oldCart->totalQuantity = $oldCart->totalQuantity - $oldCart->items[$id]['quantity'];
        unset($oldCart->items[$id]);
        if($oldCart->items == null){
            Session::flush();
        }
        return redirect('productPage/cart'); 
    }

    public function showProductPage()
    {
        return view('productPage/product');
    }
}
 



















