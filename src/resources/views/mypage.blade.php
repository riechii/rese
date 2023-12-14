@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}" />
@endsection
@section('content')
    <div class="mypage">
        <h2 class="mypage_name">⚪︎⚪︎さん</h2>
        <div class="container">
            <div class="reservation">
                <h3 class="reservation-ttl">予約状況</h3>
             
                <div class="reservation-content">
                    
                    <div class="reservation-btn">
                        
                        <p class="reservation-content-ttl"><i class="fa-solid fa-clock" style="font-size: 20px;"></i>　予約１</p>
                        <form action="" method="">
                            <button class="reservation-btn_submit" type="submit" value="">×</button>
                        </form>
                    </div>
                    <table class="reservation_table">
                        <tr><td>Shop</td><td>〇〇</td></tr>
                        <tr><td>Date</td><td>〇〇</td></tr>
                        <tr><td>Time</td><td>〇〇</td></tr>
                        <tr><td>Number</td><td>〇〇</td></tr>
                    </table>
                </div>
            </div>
            <div class ="shop">
                <div class="favorite">
                    <h3 class="favorite-ttl">お気に入り店舗</h3>
                </div>
            
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
        </div>
    </div>
@endsection