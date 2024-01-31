@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}" />
@endsection
@section('content')
    <div class="mypage">
        <h2 class="mypage_name">{{ Auth::user()->name }} さん</h2>
        <div class="container">
            <div class="reservation">
                <h3 class="reservation-ttl">予約状況</h3>
                @if(session('message'))
                <div class="reservation-message">
                    {{ session('message') }}
                </div>
                @endif
                <div class="reservation_error">
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </div>
                @foreach($reservations as $index => $reservation)
                <div class="reservation-content">
                    <div class="reservation-btn">
                        <p class="reservation-content-ttl"><i class="fa-solid fa-clock" style="font-size: 20px;"></i>　予約{{ $index + 1 }}</p>
                        <a class="reservation_qr" href="{{ route('generateQrCode', ['reservation_id' => $reservation->id]) }}">QRコード</a>
                        <form action="/mypage/delete" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $reservation->id }}">
                            <button class="reservation-btn_submit" type="submit" value="">×</button>
                        </form>
                    </div>
                    <table class="reservation_table">
                        <tr><td>Shop</td><td>{{$reservation->store->shop}}</td></tr>
                        <tr><td>Date</td><td>{{$reservation->date}}</td></tr>
                        <tr><td>Time</td><td>{{$reservation->time}}</td></tr>
                        <tr><td>Number</td><td>{{$reservation->number}}</td></tr>
                    </table>
                    <form action="/mypage/update" method="post">
                    @csrf
                        <p class="reservation_change">予約変更はこちら</p>
                        <input type="hidden" name="id" value="{{ $reservation->id }}">
                        <div class="reservation_change_form-group">
                            <label for="new_date">新しい日付</label>
                            <input class="reservation_change-input-date" type="date" name="date" value="{{ $reservation->date }}">
                        </div>
                        <div class="reservation_change_form-group">
                            <label for="new_time">新しい時間</label>
                            <input class="reservation_change-input-time" type="time" name="time" value="{{ $reservation->time }}">
                        </div>
                        <div class="reservation_change_form-group">
                            <label for="new_number">新しい人数</label>
                            <input class="reservation_change-input-number" type="number" name="number" value="{{ $reservation->number }}" min="1">
                        </div>
                        <div class="reservation_change_btn">
                            <button class="reservation_change_submit" type="submit">予約変更</button>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
            <div class ="shop">
                <div class="favorite">
                    <h3 class="favorite-ttl">お気に入り店舗</h3>
                </div>
                <div class="shop_wrapper">
                    @foreach($favorites as $favorite)
                    <div class="shop_content">
                        <img class="shop_img" src="{{ asset($favorite->store->image) }}" alt="">
                        <h3 class="shop_name">{{$favorite->store->shop}}</h3>
                        <div class="shop_tag">
                            <p class="shop_area">#{{$favorite->store->area->area}}</p>
                            <p class="shop_genre">#{{$favorite->store->genre->genre}}</p>
                        </div>
                        <div class="shop_btn">
                            <div>
                                <a class="shop_detail-btn_submit" href="{{ route('detail',['shop_id' => $favorite->store->id]) }}">詳しく見る</a>
                            </div>
                            <form action="/favorite" method="post">
                                @csrf
                                <input type="hidden" name="store_id" value="{{ $favorite->store->id }}">
                                @if($favorite->store->favorites->where('user_id', auth()->id())->isEmpty())
                                <button class="shop_favorite-btn_submit" type="submit" value=""><i class="fa-solid fa-heart" style="color: #dcdcdc; font-size: 25px;"></i></button>
                                @else
                                <button class="shop_favorite-btn_submit" type="submit" value=""><i class="fa-solid fa-heart" style="color: #ff0000; font-size: 25px;"></i></button>
                                @endif
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
