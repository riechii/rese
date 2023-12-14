@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection
@section('content')
    <div class="login">
        <div class="login_content">
            <p class="login_ttl">Login</p>
            <form action="/login" method="post">
                @csrf
                <div class="login-input-container">
                    <i class="fa-solid fa-envelope"></i>
                    <input class="login-input" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <div class="login-input-container">
                    <i class="fa-solid fa-unlock-keyhole"></i>
                    <input class="login-input" type="password" name="password" placeholder="Password">
                </div>
                <div class="form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
                <div class="login__btn">
                    <button class="login__btn__submit" type="submit" value="">ログイン</button>
                </div>
            </form>
        </div>
    </div>
@endsection