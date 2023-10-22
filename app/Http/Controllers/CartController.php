<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{


    public function show(){

        $cart = User::with('foods')->where('id',Auth()->user()->id)->first();
        $listFood = $cart->foods->unique();
        // dd($listFood->toArray());

        $counts = DB::table('user_foods')->selectRaw('foods_id, count(*) as count')->where('user_id', Auth()->user()->id)->groupBy('foods_id')->get();
        

        // dd($counts);
        $totalPrice = 0;
        foreach ($listFood as $list) {
            foreach ($counts as $count)
                if ($list->id == $count->foods_id) {
                $totalPrice = $totalPrice + ($list->price * $count->count);
                }
        }
        // dd($totalPrice);

        return view('user.cartlist', compact('listFood', 'counts', 'totalPrice'));

    }

    public function add(int $foods){

        $user = User::find(Auth()->user()->id);
        $user->foods()->attach($foods);
        return redirect()->route('home');

    }

    public function increase(int $foods){

        $user = User::find(Auth()->user()->id);
        $user->foods()->attach($foods);
        return redirect()->route('cartlist');

    }
    public function decrease(int $foods){

        $user = User::find(Auth()->user()->id);
        $tableData = DB::table('user_foods')
        ->where('user_id', $user->id)
        ->where('foods_id', $foods)
        ->first();
        // dd($tableData);
        DB::table('user_foods')->where('id', $tableData->id)->delete();

        // $user->foods()->detach($foods);
        return redirect()->route('cartlist');

    }

    // public function delete()
}
