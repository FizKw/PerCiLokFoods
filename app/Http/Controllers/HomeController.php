<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Foods;

class HomeController extends Controller
{
    public function index(){
        
        if(Auth::id()){
            $usertype = Auth()->user()->usertype;

            if($usertype=='user'){
                $product = Foods::orderBy('created_at', 'DESC')->get();
                return view('user.userhome',compact('product'));
            }
            else if($usertype=='admin'){
                $product = Foods::orderBy('created_at', 'DESC')->get();
                return view('admin.adminhome',compact('product'));
            }
            else{
                return redirect()->back();
            }
        }

    }
    
    public function adminedit(){
        return view('admin.adminedit');
    }

    
}
