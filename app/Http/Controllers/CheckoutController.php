<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class CheckoutController extends Controller
{
    public function index(){
        if(Cart::content()->count() == 0){
            session()->flash('info', 'Add items to cart first');
            return back();
        }
        return view('checkout');
    }

    public function pay(){

        Stripe::setApiKey("sk_test_HCmedYFKg2W8Ybh5fDA3F7GL00t0syM6TX");

        $token = request()->stripeToken;

        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'Ecommerce book store',
            'source' => $token,
        ]);

        session()->flash('success','Your order has been placed.');

        Cart::destroy();

        return redirect('/');

    }
}
