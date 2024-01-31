<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Favorite;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
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
}
