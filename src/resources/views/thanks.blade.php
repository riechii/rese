@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection
@section('content')
    <div class="thanks">
        <div class="thanks_content">
            <h2 class="thanks_ttl">会員登録ありがとうございます</h2>
            <div class="form__button">
                <a class="form__button-submit" href="/login">ログインする</a>
            </div>
        </div>
    </div>
@endsection