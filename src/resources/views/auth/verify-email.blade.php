<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
    <div>
    <h1><a href="/">確認メールの送信</a></h1>
    <div>
        @if (session('status') == 'verification-link-sent')
            <p>登録したメールアドレスを確認してください。</p>
            <p><a href="/">TOPに戻る</a></p>
        @else
            <p>確認メールを送信してください。</p>
            <form method="post" action="{{ route('verification.send') }}">
                @csrf
                <div>
                    <button type="submit">確認メールを送信</button>
                </div>
            </form>
        @endif
    </div>
</div>