<?php

namespace App\Http\Controllers;
use Cartalyst\Stripe\Laravel\Facades\ Stripe;
use Illuminate\Http\Request;
use Session;

\Stripe\Stripe::setApiKey('sk_test_Z5nyrQe93T2hIZdrX7A1bPHG003aB4x50Q');

class CheckoutController extends Controller
{
    public function index()
    {
    	return view('testStripe/checkout');
    }

    public function store(Request $request)
    {
    	// dd($request->all());

    	try {
    		$customer = \Stripe\Customer::create([
	            'name' => $request->name,
	            'source' => $request->stripeToken,
	            'email' => $request->email,
	            // 'phone' => $request->phone,
	            'description' => 'MacBook Purchasement',
        	]);

    		$charge = Stripe::charges()->create([
    			'amount' => 500,
    			'currency' => 'usd',
                'customer' => $customer->id,
    			'description' => 'MacBook Purchasement',
    			// 'receipt_email' => $request->email,
    			'metadata'=>[
                    'contents' => 'MacBook Pro 2020',
                    'quantity' => 1
    			],
    		]);

    		return back()->with('message','Thank you! your payment has been successfully accepted!');
    	} catch (\Stripe\Exception\CardException $e) {
    		return back()->withErrors('Error! ' . $e->getMessage());
    	}

    }

}
