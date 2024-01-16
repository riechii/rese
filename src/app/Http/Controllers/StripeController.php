<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class StripeController extends Controller
{

    public function showCharge()
    {
        return view('stripe_form');
    }

    public function charge(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $token = $request->input('stripeToken');
        $amount = $request->input('amount');

        $charge = Charge::create([
            'amount' => $amount * 100,
            'currency' => 'JPY',
            'source' => $token,
            'description' => '支払い',
        ]);
        return redirect('/mypage')->with('message', '支払いが成功しました。');
    }
}
