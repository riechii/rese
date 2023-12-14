@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection
@section('content')
    <div class="register">
        <div class="register_content">
            <p class="register_ttl">Registration</p>
            <form action="/register" method="post">
                @csrf
                <div class="register-input-container">
                    <i class="fa-solid fa-user"></i>
                    <input class="register-input" type="text" name="name" value="{{ old('name') }}" placeholder="Username">
                </div>
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
                <div class="register-input-container">
                    <i class="fa-solid fa-envelope"></i>
                    <input class="register-input" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <div class="register-input-container">
                    <i class="fa-solid fa-unlock-keyhole"></i>
                    <input class="register-input" type="password" name="password" placeholder="Password">
                </div>
                <div class="form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
                <div class="register__btn">
                    <button class="register__btn__submit" type="submit" value="">登録</button>
                </div>
            </form>
        </div>
    </div>
@endsection