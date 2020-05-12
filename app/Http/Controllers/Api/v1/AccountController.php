<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Resources\AccountResource;
use App\Http\Resources\AccountResourceCollection;
use App\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wishlist;

class AccountController extends Controller
{
    public function show(Account $account):AccountResource
    {
        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error'=> $e->getMessage()]);
        }
        
    	return new AccountResource($account);
    }

    public function index():AccountResourceCollection
    {
    	return new AccountResourceCollection(Account::paginate());
    }

    public function store(Request $request)
    {
    	$request->validate([
    		// 'firstName' 	=>'required',
    		// 'lastName' 		=>'required',
    		// 'userName' 		=>'required',
            'email'         =>'required',
    		// 'NIM' 			=>'required',
    		// 'dateOfBirth' 	=>'required',
            // 'address'       =>'required',
    		'phoneNumber' 	=>'required',
    		'password' 		=>'required',
    		'userType' 		=>'required',
    	]);

        if($request->userName == null){

            $newUserName =  '';

            if($request->firstName and $request->lastName ){
                $newUserName = $request->firstName.$request->lastName;
            }
            elseif($request->firstName){
                $newUserName = $newUserName.$request->firstName;
            }
            elseif($request->lastName){
                $newUserName = $newUserName.$request->lastName;
            }

            $request->userName = $newUserName;
        }


    	// $account = Account::create($request->all());
        $account = Account::create([
            'firstName'=>$request->firstName,
            'lastName'=>$request->lastName,
            'userName'=>$request->userName,
            'email'=>$request->email,
            'NIM'=>$request->NIM,
            'dateOfBirth'=>$request->dateOfBirth,
            'address'=>$request->address,
            'email'=>$request->email,
            'phoneNumber'=>$request->phoneNumber,
            'password'=>bcrypt($request->password),
            'userType'=>$request->userType
        ]);

    	return new AccountResource($account);
    }

    public function update(Account $account,Request $request):AccountResource
    {

    	$account->update($request->except(['password']));
        $account->update([
            'password'=>bcrypt($request->password)
        ]);

    	return new AccountResource($account);
    }

    public function destroy(Account $account)
    {
    	$account->delete();

    	return response()->json();
    }

    public function resetPassword(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if($password == ''){
            return response()->json(['Error! Please Input Password']);
        }
        $account = Account::where('email',$email)->first();
        if($account  ==  []){
            return response()->json(['Error! Account not found']);
        }
        $account->update([
            'password' => bcrypt($password),
        ]);
        return $account;
    }

    public function showWishlist($accountId)
    { 
        $wishlists = Wishlist::where('accountId',$accountId)->get();
        $accountWishlists = [];

        foreach ($wishlists as $wishlist) {
            array_push($accountWishlists, $wishlist);
        }

        return $accountWishlists;
    }
}
