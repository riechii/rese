@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
@section('content')
    <div class="shop_detail">
        <div class="shop">
            <div class="shop_content">
                <div class="message">
                    @if(session('message'))
                        {{ session('message') }}
                    @endif
                </div>
                <div class="shop_ttl">
                    <a class="shop-back" href="{{ url()->previous() }}">&lt;</a>
                    <h3 class="shop_name">{{ $store->shop }}</h3>
                </div>
                @if($userReviewExists)
                    <div class="image-container" style="width: 95%; overflow: hidden; position: relative; height: 0; padding-top: 40%;">
                        <img class="shop_img" src="{{ asset($store->image) }}" alt="" style="position: absolute; top: 0; left: 0; width: 100%; height: auto;">
                    </div>
                @else
                    <img class="shop_img" src="{{ asset($store->image) }}" alt="" style="max-width: 95%;">
                @endif
                <div class="shop_group">
                    <div class="shop_group_tg">
                        <p class="shop_group_tg_area">#{{ $store->area->area }}</p>
                        <p class="shop_group_tg_genre">#{{ $store->genre->genre }}</p>
                    </div>
                    <p class="shop_group_text">{{ $store->content }}</p>
                    @if($store->reviews->count() > 0)
                    <a class="shop_group_all_review" href="{{ route('review', ['store_id' => $store->id]) }}">全ての口コミ情報</a>
                    @endif
                    @if (auth()->check())
                        @if (!$userReviewExists && !auth()->user()->hasRole('admin') && !auth()->user()->hasRole('manager'))
                            <a class="shop_group_review" href="{{ route('showReviewForm', ['store_id' => $store->id]) }}">口コミを投稿する</a>
                        @endif
                    @endif
                    @if($userReviewExists)
                        <div class="my_review">
                            <div class="my_review_content">
                                <a class="my_review_edit" href="{{ route('showReviewForm', ['store_id' => $store->id]) }}">口コミを編集</a>
                                <form class="my_review_delete" action="{{ route('deleteReview', ['review_id' => $review->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="review_delete__btn__submit" type="submit" value="">口コミを削除</button>
                                </form>
                            </div>
                            <div class="review_evaluation">
                            @for ($i = 1; $i <= $review->evaluation; $i++)
                                    <i class="fas fa-star" style="color: #3366ff; font-size: 25px;"></i>
                                @endfor
                            </div>
                            <div class="review_comment">
                                {{ $review->comment }}
                            </div>
                            <img class="review_img" src="{{ asset($review->image) }}" alt="" style="max-width: 95%;">
                        </div>
                    @endif
                </div>
            </div>
            <div class="reservation">
                <h3 class="reservation_tti">予約</h3>
                <form action="{{ route('reservation') }}" method="post">
                    @csrf
                    <input type="hidden" name="store_id" value="{{ $store->id }}">
                    <div class="reservation_input">
                        <input class="reservation_input-date" type="date" name="date" value="<?= date('Y-m-d'); ?>" />
                    </div>
                    <div class="reservation_input">
                        <input class="reservation_input-time" type="time" name="time" value="" />
                    </div>
                    <div class="reservation_input">
                        <input class="reservation_input-count" type="number" name="number" value="1" min="1">
                    </div>
                    <div class="reservation_error">
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </div>
                    <div class="confirmation">
                        <table class="confirmation_table">
                            <tr><td>Shop</td><td>{{ $store->shop }}</td></tr>
                            @if(auth()->check())
                                <tr><td>Date</td><td>{{ $reservation ? $reservation->date : '' }}</td></tr>
                                <tr><td>Time</td><td>{{ $reservation ? $reservation->time : '' }}</td></tr>
                                <tr><td>Number</td><td>{{ $reservation ? $reservation->number : '' }}</td></tr>
                            @else
                                <tr><td>Date</td><td></td></tr>
                                <tr><td>Time</td><td></td></tr>
                                <tr><td>Number</td><td></td></tr>
                            @endif
                        </table>
                    </div>
                    <button class="reservation__btn__submit" type="submit" value="">予約する</button>
                </form>
            </div>
        </div>
    </div>
@endsection