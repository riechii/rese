@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/stripe_form.css') }}" />
@endsection
@section('content')
<div class="stripe">
    <form class="stripe_form" action="{{ route('charge') }}" method="post">
        @csrf
        <label for="amount">金額：</label>
        <input type="number" name="amount" id="amount" required>
        <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="{{ config('stripe.publishable_key') }}"
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
</div>
@endsection