<?php

namespace App\Http\Controllers;
use Cartalyst\Stripe\Laravel\Facades\ Stripe;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
    	return view('checkout');
    }

    public function store(Request $request)
    {
    	dd($request->email);
    	// try {
    	// 	$charge = Stripe::charges()->create([
    	// 		'amount' => 500,
    	// 		'currency' => 'USD',
    	// 		'source' => $request->stripeToken,
    	// 		'description' => 'Order',
    	// 		'receipt_mail' => $request->email,
    	// 		'metadata'=>[
    	// 		],
    	// 	]);
    	// 	return back()->with('success_message','Thank you! your payment has been successfully accepted!');
    	// } catch (Exception $e) {
    		
    	// }
    }
}
