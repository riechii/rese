@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection
@section('content')
    <form action="{{ route('charge') }}" method="post">
        @csrf
        <label for="amount">金額：</label>
        <input type="number" name="amount" id="amount" required>
        <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="{{ env('STRIPE_KEY') }}"
        data-locale="auto"
        data-currency="JPY"
        data-name="お支払い画面"
        data-label="支払う"
        data-description="現在はデモ画面です"
        data-amount=""
        data-allow-remember-me="false"
        data-email="{{ auth()->user()->email }}"
        data-amount=""
    >
    </script>
</form>
@endsection