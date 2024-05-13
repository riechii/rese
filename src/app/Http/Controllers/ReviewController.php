<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Store;
use App\Http\Requests\ReviewRequest;

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
        $review = Review::where('store_id', $store_id)
                    ->where('user_id', auth()->id())
                    ->first();

        return view('review_form', compact('store','review'));
    }

    //口コミ投稿
    public function reviewForm(ReviewRequest $request)
    {
        $storeId = $request->input('store_id');
        $review = Review::where('store_id', $storeId)
                    ->where('user_id', auth()->id())
                    ->first();

        $imagePath = null;
        if ($request->hasFile('image')) {
            $original = $request->file('image')->getClientOriginalName();
            $time = now()->format('Ymd_Hi');
            $fileName = $time . '_' . $original;
            $request->file('image')->storeAs('public/images', $fileName);
            $imagePath = 'storage/images/' . $fileName;
        }

        if ($review) {
        $review->update([
            'evaluation' => $request->evaluation,
            'comment' => $request->comment,
            'image' => $imagePath,
        ]);
        } else {
            Review::create([
            'user_id' => auth()->id(),
            'store_id' => $storeId,
            'evaluation' => $request->evaluation,
            'comment' => $request->comment,
            'image' => $imagePath,
        ]);
        }
        return redirect()->route('detail', ['shop_id' => $storeId])->with('message', '口コミを投稿しました。');
    }

    //口コミの削除
    public function deleteReview($review_id)
    {
        Review::findOrFail($review_id)->delete();

        return redirect()->back()->with('message', 'レビューを削除しました');
    }
}
