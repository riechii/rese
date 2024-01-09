<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;
use App\Models\Favorite;
use App\Models\Review;
use App\Http\Requests\UploadRequest;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class ShopController extends Controller
{

    //サンキューページ
    public function thanks()
    {
        return view('thanks');
    }

    //ショップの一覧表示
    public function index()
    {
        $stores = Store::all();
        $user = auth()->user();
        $areas = Area::all();
        $genres = Genre::all();


        return view('shop_list',compact('stores','user','areas','genres'));
    }

    //アップロード画面表示
    public function uploadForm()
    {
        $areas = Area::all();
        $genres = Genre::all();

        return view('upload', compact('areas','genres'));
    }

    //アップロード
    public function upload(UploadRequest $request)
    {

        $store = new Store();
        $store->shop = $request->input('shop');
        $store->area_id = $request->input('area');
        $store->genre_id = $request->input('genre');
        $store->content = $request->input('content');

        $uploadedFile = $request->file('image');
        $original = $uploadedFile->getClientOriginalName();
        $time = now()->format('Ymd_Hi');
        $fileName = $time . '_' . $original;
        $uploadedFile->storeAs('public/images', $fileName);


        $store->image = 'storage/images/' . $fileName;
        $store->save();

        return redirect('/upload/form')->with('message', 'アップロードされました');
    }
    //エリア追加
    public function uploadArea(Request $request)
    {
        $area = $request->only(['area']);
        Area::create($area);

        return redirect('/upload/form')->with('message', 'エリアを追加しました');
    }
    //ジャンル追加
    public function uploadGenre(Request $request)
    {
        $genre= $request->only(['genre']);
        Genre::create($genre);

        return redirect('/upload/form')->with('message', 'ジャンルを追加しました');
    }

    //ログイン後のメニュー表示
    public function afterMenu()
    {
        return view('after_menu');
    }

    //ログイン前のメニュー表示
    public function beforeMenu()
    {
        return view('before_menu');
    }

    //エリア検索
    public function searchArea(Request $request)
    {
        $area = $request->input('area');
        $stores = Store::where('area_id', $area)->get();
        $areas = Area::all();
        $genres = Genre::all();
        $shop = Store::all();

        return view('shop_list', compact('stores','areas','genres','shop'));

    }

    //ジャンル検索
    public function searchGenre(Request $request)
    {
        $genre = $request->input('genre');
        $stores = Store::where('genre_id', $genre)->get();
        $areas = Area::all();
        $genres = Genre::all();
        $shop = Store::all();

        return view('shop_list', compact('stores','areas','genres','shop'));
    }

    //店名検索
    public function searchShop(Request $request)
    {
        $shop = $request->input('shop');
        $stores = Store::where('shop', 'LIKE', "%{$shop}%")->get();
        $areas = Area::all();
        $genres = Genre::all();

        return view('shop_list', compact('stores','areas','genres','shop'));
    }

    //飲食店詳細ページの表示
    public function detail($shop_id)
    {
        $store = Store::find($shop_id);
        // $reservation = Reservation::all();
        $reservation = auth()->check() ? auth()->user()->reservations->where('store_id', $shop_id)->first() : null;

        return view('shop_detail', compact('shop_id','store','reservation'));
    }

    //お気に入り登録
    public function favorite(Request $request)
    {
        if (!auth()->check()) {
        return redirect('/login');
    }

        $store_id = $request->input('store_id');
        $user_id = auth()->id();

        $favorited = Favorite::where('user_id', $user_id)->where('store_id', $store_id)->first();

        if($favorited){
            $favorited->delete();
            $redirectPath = url()->previous() === route('mypage') ? '/mypage' : '/';
        }else{
            $favorite = new Favorite();
            $favorite->user_id = $user_id;
            $favorite->store_id = $store_id;
            $favorite->save();
            $redirectPath = '/';
        }

        return redirect($redirectPath);

    }

    //予約処理
    public function reservation(ReservationRequest $request)
    {
        $store_id = $request->input('store_id');
        $store = Store::find($store_id);

        if (Auth::check()){

            $reservation = new Reservation();
            $reservation->user_id = auth()->id();
            $reservation->store_id = $request->input('store_id');
            $reservation->date = $request->input('date');
            $reservation->time = $request->input('time');
            $reservation->number = $request->input('number');
            $reservation->save();

            return redirect()->route('done', compact('store', 'reservation'));
        }else{
            return redirect('/login');
        }
    }

    //予約の変更
    public function update(ReservationRequest $request)
    {
        $reservation_id = $request->input('id');
        // dd($reservation_id);

        $reservation = Reservation::find($reservation_id);

        $reservation->update([
            'date'=> $request->date,
            'time'=> $request->time,
            'number'=> $request->number,
        ]);


        return redirect('/mypage')->with('message', '予約を変更しました');
    }

    //予約ありがとうページ
    public function done()
    {
        return view('done');
    }

    //マイページ
    public function mypage()
    {
        $user = auth()->user();

        $favorites = $user->favorites;
        $reservations = $user->reservations;
        // $favorites = Favorite::all();
        // $store = Store::all();
        // $user = User::all();
        // $reservations = reservation::all();

        return view('mypage', compact('reservations','user','favorites'));
    }

    //予約削除
    public function delete(Request $request)
    {
        $reservationId = $request->input('id');
        reservation::find($reservationId)->delete();

        return redirect('/mypage');
    }

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
        // $reservation_id = $request->input('reservation_id');
        $store = Store::find($store_id);

        $hasReservation = $store->reservations()->where('user_id', auth()->id())->exists();

        $reservation = $hasReservation ? $store->reservations()->where('user_id', auth()->id())->first() : null;

        $review = new Review();
        $review->user_id = auth()->id();
        $review->store_id = $store_id;
        if ($reservation) {
            $review->reservation_id = $reservation->id;
        }
        $review->evaluation = $request->input('evaluation');
        $review->comment = $request->input('comment');
        $review->save();

        return redirect()->route('review', ['store_id' => $store_id])->with('message', '口コミを投稿しました。');
    }
}
