<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Store;

class ReviewController extends Controller
{
    //口コミ一覧表示
    public function review($store_id)
    {
        $store = Store::find($store_id);

        $reviews = Review::where('store_id', $store_id)->paginate(10);
        $hasReservation = $store->reservations()->where('user_id', auth()->id())->exists();
        $reservation = $hasReservation ? $store->reservations()->where('user_id', auth()->id())->first() : null;


        return view('review', compact('store', 'reviews', 'hasReservation', 'reservation'));
    }

    //口コミ投稿欄表示
    public function showReviewForm($store_id)
    {
        $store = Store::find($store_id);

        $hasReservation = $store->reservations()->where('user_id', auth()->id())->exists();

        $reservation = $hasReservation ? $store->reservations()->where('user_id', auth()->id())->first() : null;

        return view('review_form', compact('store', 'reservation'));
    }

    //口コミ投稿
    public function reviewForm(Request $request)
    {
        $store_id = $request->input('store_id');

        $review = new Review();
        $review->user_id = auth()->id();
        $review->store_id = $store_id;
        $review->evaluation = $request->input('evaluation');
        $review->comment = $request->input('comment');
        $review->save();

        return redirect()->route('review', ['store_id' => $store_id])->with('message', '口コミを投稿しました。');
    }
}
