@extends('layouts.layouts')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/review.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
@section('content')
    <div class="review">
        <a class="review_back" href="{{ url()->previous() }}">&lt;</a>
        <div class="review_content">
            <h2 class="review_ttl">評価と口コミ - {{ $store->shop}} -</h2>
        </div>
        <div class="message">
            @if(session('message'))
            {{ session('message') }}
            @endif
        </div>
        @if($reviews->count() > 0)
        @foreach($reviews as $review)
        <div class="review_list">
            <table class="review_table">
                <tr class="review_row"><td class="review_td">
                    @for ($i = 1; $i <= $review->evaluation; $i++)
                        <i class="fas fa-star" style="color: #3366ff; font-size: 25px;"></i>
                    @endfor
                </td><td class="review_time">
                    @if (auth()->check())
                        @if (auth()->user()->hasRole('admin') || $review->user_id === auth()->id())
                            <form class="review_delete" action="{{ route('deleteReview', ['review_id' => $review->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="review_delete__btn__submit" type="submit" value="">口コミを削除</button>
                            </form>
                        @endif
                    @endif
                </td></tr>
                <tr class="review_row"><td class="review_td">{{ $review->comment }}</td></tr>
                <tr class="review_row">
                    <td class="review_td" colspan="2">
                        @if($review->image)
                            <img src="{{ asset($review->image) }}" alt="" style="max-width: 80%;">
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        @endforeach
        @else
            <p class="not_review">口コミはありません</p>
        @endif
            {{$reviews->links()}}
    </div>
@endsection