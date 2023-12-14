@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}" />
@endsection
@section('content')
    <div class="shop_detail">
        <div class="shop">
            <div class="shop_content">
                <div class="shop_ttl">
                    <a class="shop-back" href="">&lt;</a>
                    <h3 class="shop_name">店名</h3>
                </div>
                <img class="shop_img" src="" alt="">
                <div class="shop_group">
                    <div class="shop_group_tg">
                        <p class="shop_group_tg_area">#エリア</p>
                        <p class="shop_group_tg_genre">#ジャンル</p>
                    </div>
                    <p class="shop_group_text">ここに説明文</p>
                </div>
            </div>
            <div class="reservation">
                <h3 class="reservation_tti">予約</h3>
                <form action="">
                    <div class="reservation_input">
                        <input class="reservation_input-date" type="date" name="date" value="<?= date('Y-m-d'); ?>" />
                    </div>
                    <div class="reservation_input">
                        <input class="reservation_input-time" type="time" name="time" value="" />
                    </div>
                    <div class="reservation_input">
                        <input class="reservation_input-content" type="number" name="count" value="1" >
                    </div>
                    <div class="confirmation">
                        <table class="confirmation_table">
                            <tr><td>Shop</td><td>〇〇</td></tr>
                            <tr><td>Date</td><td>〇〇</td></tr>
                            <tr><td>Time</td><td>〇〇</td></tr>
                            <tr><td>Number</td><td>〇〇</td></tr>
                        </table>
                    </div>
                    <button class="reservation__btn__submit" type="submit" value="">予約する</button>
                </form>
            </div>
        </div>
    </div>
@endsection