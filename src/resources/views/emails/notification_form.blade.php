@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/notification_form.css') }}" />
@endsection
@section('content')
    <div class="notification">
        <a class="notification_back" href="/upload/form">&lt;</a>
        <div class="notification_ttl">
            <h3>お知らせメールを送る</h3>
        </div>
        <form class="notification_form" action="/notification" method="post">
            @csrf
            <p>ユーザーのメールアドレス (複数選択可)</p>
            <div class="notification_content">
            @foreach ($users as $user)
                <label class="notification_label">
                    <input class="notification_input" type="checkbox" name="user_emails[]" value="{{ $user->email }}">{{ $user->name }} : {{ $user->email }}
                </label><br>
            @endforeach
            </div>
            <p>お知らせメールの内容</p>
            <textarea class="notification_text" name="content" required></textarea>
            <div class="notification_btn">
                <button class="notification_btn_submit" type="submit">メールを送信</button>
            </div>
        </form>
    </div>
@endsection