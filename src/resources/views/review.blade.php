@extends('layouts.layouts')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/review.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
@section('content')
    <div class="review">
        <a class="review_back" href="/">&lt;</a>
        <div class="review_content">
            <h2 class="review_ttl">評価と口コミ - {{ $store->shop}} -</h2>
            @if($hasReservation and $reservation->date <= now() and $reservation->time <= now())
                <a class="review_link" href="{{ route('showReviewForm', ['store_id' => $store->id]) }}">口コミを書く</a>
            @endif
        </div>
        <div class="message">
            @if(session('message'))
            {{ session('message') }}
            @endif
        </div>
        @foreach($reviews as $review)
        <div class="review_list">
            <table class="review_table">
                <tr class="review_row"><td class="review_td">
                    @for ($i = 1; $i <= $review->evaluation; $i++)
                        <i class="fas fa-star" style="color: #ffd700; font-size: 25px;"></i>
                    @endfor
                </td><td class="review_time">{{ $review->created_at->format('Y-m-d')}}</td></tr>
                <tr class="review_row"><td class="review_td">{{ $review->comment }}</td></tr>
            </table>
        </div>
        @endforeach
        {{$reviews->links()}}
    </div>
@endsection