<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class ShopController extends Controller
{
    //ショップの一覧表示
    public function index()
    {
        return view('shop_list');
    }

    //アップロード画面表示
    public function uploadForm()
    {
        return view('upload');
    }

    //アップロード
    public function upload(Request $request)
    {
        // $store = $request->only(['shop', 'area', 'genre', 'content', 'image']);
        // Store::create($store);
        $store = new Store();
        $store->shop = $request->shop;
        $store->area = $request->area;
        $store->genre = $request->genre;
        $store->content = $request->content;

        $uploadedFile = $request->file('image');
        $original = $uploadedFile->getClientOriginalName();
        $time = now()->format('Ymd_Hi');
        $fileName = $time . '_' . $original;
        $uploadedFile->storeAs('public/images', $fileName);

        // $image = new Store();
        $store->image = 'storage/images/' . $fileName;
        $store->save();



        return redirect('/upload_form')->with('message', 'アップロードされました');
    }
}
