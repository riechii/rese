<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class StripeController extends Controller
{
    //支払い画面表示
    public function showCharge()
    {
        return view('stripe_form');
    }

    //支払い処理
    public function charge(Request $request)
    {
        $stripeSecretKey = config('stripe.secret_key');
        Stripe::setApiKey($stripeSecretKey);

        $token = $request->input('stripeToken');
        $amount = $request->input('amount');

        $charge = Charge::create([
            'amount' => $amount,
            'currency' => 'JPY',
            'source' => $token,
            'description' => '支払い',
        ]);
        return redirect('/mypage')->with('message', '支払いが成功しました。');
    }
}
