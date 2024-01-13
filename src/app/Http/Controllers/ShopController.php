<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;
use App\Models\Favorite;
use App\Http\Requests\UploadRequest;
use App\Http\Requests\AreaRequest;
use App\Http\Requests\GenreRequest;
use App\Http\Requests\UploadEditRequest;
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
        $stores = Store::paginate(10);

        return view('upload', compact('areas','genres','stores'));
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

    //店舗編集フォームの表示
    public function showUploadEdit(Request $request, $id)
    {

        $store = Store::find($id);
        $areas = Area::all();
        $genres = Genre::all();

        return view('upload_edit', compact('store','areas','genres'));
    }

    //店舗編集
    public function uploadEdit(UploadEditRequest $request, $id)
    {
        $store = Store::find($id);
        $areas = Area::all();
        $genres = Genre::all();

        $store->update([
            'shop'=> $request->shop,
            'area_id'=> $request->area,
            'genre_id'=> $request->genre,
            'content'=> $request->content,
        ]);
        
        if ($request->hasFile('image')){
            $original = $request->file('image')->getClientOriginalName();
            $time = now()->format('Ymd_Hi');
            $fileName = $time . '_' . $original;
            $request->file('image')->storeAs('public/images', $fileName);
            $store->update(['image' => 'storage/images/' . $fileName]);
        }
        return redirect()->route('uploadForm', ['id' => $id])->with('message', '店舗情報を変更しました。');

    }

    //エリア追加
    public function uploadArea(AreaRequest $request)
    {
        $area = $request->only(['area']);
        Area::create($area);

        return redirect('/upload/form')->with('message', 'エリアを追加しました');
    }
    //ジャンル追加
    public function uploadGenre(GenreRequest $request)
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

    //マイページ
    public function mypage()
    {
        $user = auth()->user();

        $favorites = $user->favorites;
        $reservations = $user->reservations;

        return view('mypage', compact('reservations','user','favorites'));
    }
}
