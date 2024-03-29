@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}" />
@endsection
@section('content')
    <div class="shop_detail">
        <div class="shop">
            <div class="shop_content">
                <div class="shop_ttl">
                    <a class="shop-back" href="{{ url()->previous() }}">&lt;</a>
                    <h3 class="shop_name">{{ $store->shop }}</h3>
                </div>
                <img class="shop_img" src="{{ asset($store->image) }}" alt="" style="max-width: 95%; ">
                <div class="shop_group">
                    <div class="shop_group_tg">
                        <p class="shop_group_tg_area">#{{ $store->area->area }}</p>
                        <p class="shop_group_tg_genre">#{{ $store->genre->genre }}</p>
                    </div>
                    <p class="shop_group_text">{{ $store->content }}</p>
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