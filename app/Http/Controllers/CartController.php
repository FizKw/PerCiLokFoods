<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function show(){

        $cart = User::with('foods')->where('id',Auth()->user()->id)->first();
        
        // dd($cart->toArray());
        // $cart = Foods::whereHas();

        return view('user.cartlist', compact('cart'));
    }

    public function add(string $foods){
        // dd($foods);
        // dd(Auth()->user()->id);
        $user = User::find(Auth()->user()->id);
        // dd($user->id);
        $user->foods()->attach($foods);




        return redirect()->route('home');
    }
}
