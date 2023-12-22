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
            @if(Auth::check())
            <div class="header-content_log">
                <a href="{{ route('afterMenu') }}">
                    <img class="heder_icon" src="{{ asset('storage/icons/rese_icon.png') }}" alt="アイコン">
                </a>
                <h1 class="header_ttl">Rese</h1>
            </div>
            @else
            <div class="header-content_log">
                <a href="{{ route('beforeMenu') }}">
                    <img class="heder_icon" src="{{ asset('storage/icons/rese_icon.png') }}" alt="アイコン">
                </a>
                <h1 class="header_ttl">Rese</h1>
            </div>
            @endif
            <div class="search">
                <form class="search_form" action="{{ route('searchArea') }}" method="get">
                    @csrf
                    <select class="search_select" name="area" onchange="submit(this.form)">
                        <option value="" selected disabled>All area</option>
                        @foreach($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->area }}</option>
                        @endforeach
                    </select>
                </form>
                    <span class="search_partition">|</span>
                <form class="search_form" action="{{ route('searchGenre') }}" method="get">
                    @csrf
                    <select class="search_select" name="genre" onchange="submit(this.form)">
                        <option value="" selected disabled>All genre</option>
                        @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                        @endforeach
                    </select>
                </form>
                    <span class="search_partition">|</span>
                <form class="search_form_input" action="{{ route('searchShop') }}" method="get">
                    @csrf
                    <button class="search-btn_submit" type="submit" value=""><i class="fa-solid fa-magnifying-glass" style="color: #a9a9a9;"></i></button>
                    <input class="search_text" type="text" name="shop" value="" placeholder="Search ...">

                </form>
            </div>
        </div>
    </header>
    <main>
        <div class ="shop">
            @foreach($stores as $store)
            <div class="shop_content">
                <img class="shop_img" src="{{ asset($store->image) }}" alt="">
                <h3 class="shop_name">{{$store->shop}}</h3>
                <div class="shop_tag">
                    <p class="shop_area">#{{$store->area->area}}</p>
                    <p class="shop_genre">#{{$store->genre->genre}}</p>
                </div>
                <div class="shop_btn">
                    <div>
                    <a class="shop_detail-btn_submit" href="{{ route('detail',['shop_id' => $store->id]) }}">詳しく見る</a>
                    </div>
                    <form action="{{ route('favorite') }}">
                        @csrf
                        <input type="hidden" name="shop_id" value="{{ $store->id }}">
                        <button class="shop_favorite-btn_submit" type="submit" value=""><i class="fa-solid fa-heart" style="color: #dcdcdc; font-size: 25px;"></i></button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</body>
</html>
