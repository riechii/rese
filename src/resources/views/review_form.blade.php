@extends('layouts.layouts')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/review_form.css') }}" />
@endsection
@section('content')
<form class="form" action="/review/form" method="post" enctype="multipart/form-data">
    @csrf
    <div class="review_form">
        <div class="review_store">
            <p class="review_store_text">今回のご利用はいかがでしたか？</p>
            <div class ="shop">
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
                        <div class="shop_favorite-btn_submit" type="submit" value=""><i class="fa-solid fa-heart" style="color: #dcdcdc; font-size: 25px;"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="partition"></div>
        <div class="review">
            <p class="review_text">体験を評価してください</p>
            <input type="hidden" name="store_id" value="{{ $store->id }}">

            <div class="review_form-star">
                <input id="star5" type="radio" name="evaluation" value="5"{{ $review && $review->evaluation == 5 ? 'checked' : '' }}>
                <label for="star5">★</label>
                <input id="star4" type="radio" name="evaluation" value="4"{{ $review && $review->evaluation == 4 ? 'checked' : '' }}>
                <label for="star4">★</label>
                <input id="star3" type="radio" name="evaluation" value="3"{{ $review && $review->evaluation == 3 ? 'checked' : '' }}>
                <label for="star3">★</label>
                <input id="star2" type="radio" name="evaluation" value="2"{{ $review && $review->evaluation == 2 ? 'checked' : '' }}>
                <label for="star2">★</label>
                <input id="star1" type="radio" name="evaluation" value="1"{{ $review && $review->evaluation == 1 ? 'checked' : '' }}>
                <label for="star1">★</label>
            </div>

            <p class="review_text">口コミを投稿</p>
            <div class="form__error">
                @error('comment')
                    {{ $message }}
                @enderror
            </div>
            <textarea class="review_text_comment" name="comment" id="" cols="30" rows="10" placeholder="カジュアルな夜におすすめのスポット">@if ($review){{ $review->comment }}@endif</textarea>
            <div class="char-count">{{ mb_strlen($review->comment ?? '') }}/400 (最高文字数)</div>
            <p class="review_text">画像の追加</p>
            <div class="upload-area">
                <p class="upload-area_message">クリックして画像を追加</p>
                <p class="upload-area_comment">またはドロッグアンドドロップ</p>
                <input type="file" name="image" id="input-files">
            </div>
        </div>
    </div>
    <div class="review_form__button">
        <button class="review_form__button_submit" type="submit">口コミを投稿</button>
    </div>
</form>

@endsection