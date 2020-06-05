<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\Account;

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
            'riceGradeType'     => "required",
            'riceType'          => "required",
            'riceShapeType'     => "required",
            'riceColorType'     => "required",
            'riceTextureType'   => "required",
            'riceQuantity'      => "required",
            'riceUnitType'      => "required",
            'price'             => "required",
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
        return response()->json([]);
    }

    public function addToCart(Request $request, $productId,$accountId)
    {
        $product = Product::find($productId);
        $oldCart = Session::has('cart'.$accountId) ? Session::get('cart'.$accountId) :null;
        $cart = new Cart($oldCart);
        $cart->add($product, $productId);
        $request->session()->put('cart'.$accountId,$cart);
        // dd($request->session()->get('cart'));
        // $cart->deleteAll();
        // Session::flush();
        // return redirect('productPage/products');
        // return back();
        $cartArray = [];
        array_push($cartArray, $cart->items,$cart->totalQuantity,$cart->totalPrice);
        return $cartArray;
    }

    public function showProductPage()
    {
        
        if (isset($_GET['accountId'])) {
            $user = Account::find($_GET['accountId']);
        }
        else{
            try {
                $user = auth()->userOrFail();
            } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
                // return response()->json(['error'=> $e->getMessage()]);
                $user = null;
            }
        }
        return view('productPage/product')->with('user',$user);
    }
    
    public function viewCart($id)
    {

        $account = Account::find($id);
        $email = $account->email;
        if(!Session::has('cart'.$id)){
            return response()->json(["Cart is currently empty"]);
            // return view('productPage/cart',['email'=>$email,'id'=>$id]);
        }
        else{
            $oldCart = Session::get('cart'.$id);
            $cart = new Cart($oldCart);

            $cartArray = [];
            array_push($cartArray,$cart->items,$cart->totalQuantity,$cart->totalPrice);
            return $cartArray;

            // return view('productPage/cart',['email'=>$email,'id'=>$id,'products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
        }
        
    }

    public function deleteCartItem(Request $request ,$id,$accountId)
    {
        
        $oldCart = Session::has('cart'.$accountId) ? Session::get('cart'.$accountId) :null;

        if($oldCart->totalQuantity == 1){
            Session::forget('cart'.$accountId);
            return response()->json([]);
            // return redirect('productPage/cart/'.$accountId); 
            
        }

        if($oldCart->items[$id]['quantity'] == 1){
            $oldCart->totalQuantity = $oldCart->totalQuantity-1;
            $oldCart->totalPrice = $oldCart->totalPrice - $oldCart->items[$id]['price'];
            unset($oldCart->items[$id]);
            $cartArray = [];
            return response()->json([]);
            // return redirect('productPage/cart/'.$accountId);
        }
        $basePrice = $oldCart->items[$id]['price']/$oldCart->items[$id]['quantity'];

        $oldCart->totalQuantity = $oldCart->totalQuantity-1;
        $oldCart->items[$id]['quantity'] = $oldCart->items[$id]['quantity']-1;
        $oldCart->items[$id]['price'] = $oldCart->items[$id]['price'] - $basePrice;
        $oldCart->totalPrice = $oldCart->totalPrice - $basePrice;
        
        // $request->session()->put('cart',$oldCart);
        return response()->json([]);
        // return redirect('productPage/cart/'.$accountId); 
    }

    public function deleteCartItemAll(Request $request, $id,$accountId)
    {
        $oldCart = Session::has('cart'.$accountId) ? Session::get('cart'.$accountId) :null;
        $oldCart->totalPrice = $oldCart->totalPrice - $oldCart->items[$id]['price'];
        $oldCart->totalQuantity = $oldCart->totalQuantity - $oldCart->items[$id]['quantity'];
        unset($oldCart->items[$id]);
        if($oldCart->items == null){
            Session::forget('cart'.$accountId);
            // Session::flush();
        }
        return response()->json([]);
        // return redirect('productPage/cart/'.$accountId); 
    }

    
}
 




















