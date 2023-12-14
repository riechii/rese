<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shop_list.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header class="header">
        <div class="header-content">
            <div class="header-content_log">
                <a href="">
                    <img class="heder_icon" src="{{ asset('storage/icons/rese_icon.png') }}" alt="アイコン">
                </a>


                <h1 class="header_ttl">Rese</h1>
            </div>
            <div class="search">
                <form class="search_form" action="">
                    <select class="search_select" name="area" id="">
                        <option value="" selected disabled>All area</option>
                    </select>
                    <span class="search_partition">|</span>
                    <select class="search_select" name="genre" id="">
                        <option value="" selected disabled>All genre</option>
                    </select>
                    <span class="search_partition">|</span>
                    <button class="search-btn_submit" type="submit" value=""><i class="fa-solid fa-magnifying-glass" style="color: #a9a9a9;"></i></button>
                    <input class="search_text" type="text" placeholder="Search ...">

                </form>
            </div>
        </div>
    </header>
    <main>
        <div class ="shop">
            <div class="shop_content">
                <img class="shop_img" src="" alt="">
                <h3 class="shop_name">ショップ名</h3>
                <div class="shop_tag">
                    <p class="shop_area">#エリア</p>
                    <p class="shop_genre">#ジャンル</p>
                </div>
                <div class="shop_btn">
                    <button class="shop_detail-btn_submit" type="submit" value="">詳しく見る</button>
                    <button class="shop_favorite-btn_submit" type="submit" value=""><i class="fa-solid fa-heart" style="color: #dcdcdc; font-size: 25px;"></i></button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
