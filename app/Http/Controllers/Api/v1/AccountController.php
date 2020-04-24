<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Resources\AccountResource;
use App\Http\Resources\AccountResourceCollection;
use App\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function show(Account $account):AccountResource
    {
    	return new AccountResource($account);
    }

    public function index():AccountResourceCollection
    {
    	return new AccountResourceCollection(Account::paginate());
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'firstName' 	=>'required',
    		'lastName' 		=>'required',
    		'userName' 		=>'required',
    		'NIM' 			=>'required',
    		'dateOfBirth' 	=>'required',
    		'email' 		=>'required',
    		'phoneNumber' 	=>'required',
    		'password' 		=>'required',
    		'userType' 		=>'required',
    	]);

    	// $account = Account::create($request->all());
        $account = Account::create([
            'firstName'=>$request->firstName,
            'lastName'=>$request->lastName,
            'userName'=>$request->userName,
            'NIM'=>$request->NIM,
            'dateOfBirth'=>$request->dateOfBirth,
            'email'=>$request->email,
            'phoneNumber'=>$request->phoneNumber,
            'password'=>bcrypt($request->password),
            'userType'=>$request->userType
        ]);

    	return new AccountResource($account);
    }

    public function update(Account $account,Request $request):AccountResource
    {

    	$account->update($request->all());

    	return new AccountResource($account);
    }

    public function destroy(Account $account)
    {
    	$account->delete();

    	return response()->json();
    }
}
