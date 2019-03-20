<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        if(Cart::content()->count() == 0){
            session()->flash('info', 'Add items to cart first');
            return back();
        }
        return view('checkout');
    }
}
