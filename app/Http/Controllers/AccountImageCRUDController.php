<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\accountImage;
class AccountImageCRUDController extends Controller
{
    public function view()
    {
        return view('accountImageCRUD/insertAccountImage');
    }
    public function store(Request $request)
    {
        $accountImage = new accountImage();
        $accountImage->id = $request->input('userId');
        // $accountImage->profilePic= $request->input('profilePic');

        if($request->hasFile('profilePic')){
            $file = $request->file('profilePic');
            $extension = $file->getClientOriginalExtension();
            $filename = time().".".$extension;
            $file->move('sources/images',$filename);
            $accountImage->profilePic = $filename;
        }
        else{
            return $request;
            $accountImage->profilePic = '';
        }
        
        $accountImage->save();  
        return redirect('accountImageCRUD/accountImagepage');
    }
    public function index()
    {
        $accountImages = accountImage::all();
        return view('accountImageCRUD/accountImagepage')->with('accountImages',$accountImages);
    }
    public function edit($userId)
    {
        
        $accountImage = accountImage::find($userId);
        
        return view('accountImageCRUD/updateAccountImage')->with('accountImage',$accountImage);
            
        
    }
    public function update(Request $request, $id)
    {
        $accountImages = accountImage::find($id);

        if($request->hasFile('profilePic')){
            $file = $request->file('profilePic');
            $extension = $file->getClientOriginalExtension();
            $filename = time().".".$extension;
            $file->move('sources/images',$filename);
            $accountImages->profilePic = $filename;
        }
        else{
            return $request;
            $accountImages->profilePic = '';
        }
        
        $accountImages->save();  
        return redirect('accountImageCRUD/accountImagepage')->with('accountImages',$accountImages);
    }
    public function delete($id)
    {
        $accountImage = accountImage::find($id);
        $accountImage->delete();
        return redirect('accountImageCRUD/accountImagepage')->with('accountImage',$accountImage);
    }
}
