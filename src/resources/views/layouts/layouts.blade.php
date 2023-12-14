<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header_content">
            <a href="">
                <img class="heder_icon" src="{{ asset('storage/icons/rese_icon.png') }}" alt="アイコン">
            </a>
            <h1 class="header_ttl">Rese</h1>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>