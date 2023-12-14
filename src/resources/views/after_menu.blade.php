<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
</head>
<body>
    <main>
        <div class="menu">
            <div class="menu_close">
                <a class="menu_link" href="/">×</a>
            </div>
            <div class="menu_content">
                <li><a class="menu_content-link" href="">Home</a></li>
                <li>
                <form class="form" action="/logout" method="post">
                    @csrf
                    <button class="menu__button">Logout</button></li>
                <li><a class="menu_content-link" href="">Mypage</a></li>
            </div>
        </div>
    </main>
</body>
</html>