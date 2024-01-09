@extends('layouts.layouts')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/review_form.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
@section('content')
    <div class="review_form">
        <a class="review_form-back" href="{{ url()->previous() }}">&lt;</a>
        <h2 class="review_form-ttl">評価・口コミ投稿</h2>
        <div class="review_form-post">
            <form action="/review/form" method="post">
            @csrf
                <div class="review_form-radio">
                    <input type="hidden" name="store_id" value="{{ $store->id }}">
                    <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                    
                    <label class="review_form-star"><input class="review_form-star" type="radio" name="evaluation" value="5" checked><i class="fas fa-star" style="color: #ffd700; font-size: 25px;"></i><i class="fas fa-star" style="color: #ffd700; font-size: 25px;"></i><i class="fas fa-star" style="color: #ffd700; font-size: 25px;"></i><i class="fas fa-star" style="color: #ffd700; font-size: 25px;"></i><i class="fas fa-star" style="color: #ffd700; font-size: 25px;"></i></label>

                    <label class="review_form-star"><input class="review_form-star" type="radio" name="evaluation" value="4"><i class="fas fa-star" style="color: #ffd700; font-size: 25px;"></i><i class="fas fa-star" style="color: #ffd700; font-size: 25px;"></i><i class="fas fa-star" style="color: #ffd700; font-size: 25px;"></i><i class="fas fa-star" style="color: #ffd700; font-size: 25px;"></i></label>

                    <label class="review_form-star"><input class="review_form-star" type="radio" name="evaluation" value="3"><i class="fas fa-star" style="color: #ffd700; font-size: 25px;"></i><i class="fas fa-star" style="color: #ffd700; font-size: 25px;"></i><i class="fas fa-star" style="color: #ffd700; font-size: 25px;"></i></label>

                    <label class="review_form-star"><input class="review_form-star" type="radio" name="evaluation" value="2"><i class="fas fa-star" style="color: #ffd700; font-size: 25px;"></i><i class="fas fa-star" style="color: #ffd700; font-size: 25px;"></i></label>

                    <label class="review_form-star"><input class="review_form-star" type="radio" name="evaluation" value="1"><i class="fas fa-star" style="color: #ffd700; font-size: 25px;"></i></label>
                </div>
                <div class="review_form_text">
                    <textarea class="review_form_textarea" name="comment" id="" cols="100" rows="10" placeholder="こちらにご意見を書いてください。"></textarea>
                </div>
                <div class="review_form__btn">
                    <button class="review_form__btn__submit" type="submit" value="">投稿する</button>
                </div>
            </form>
        </div>
    </div>
@endsection