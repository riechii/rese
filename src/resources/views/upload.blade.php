@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/upload.css') }}" />
@endsection
@section('content')
<div class="management_screen">
    @if(session('message'))
    <div class="upload-message">
    {{ session('message') }}
    </div>
    @endif
    @if ($errors->any())
        <div class="upload__alert--danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="management_ttl">
        <h2>エリアとジャンルを追加</h2>
    </div>
    <div class="area">
        <div class="area_ttl">
            <h3 class="area_text">
                エリアを追加
            </h3>
        </div>
        <form action="/upload/area" method="post">
            @csrf
            <div class="area-content">
                <div class="area-form__item">
                    <input class="area-form__item-input" type="text" name="area" placeholder="例）東京都">
                </div>
                <div class="area-form__button">
                    <button class="area-form__button-submit" type="submit">作成</button>
                </div>
            </div>
        </form>
    </div>
    <div class="genre">
        <div class="genre_ttl">
            <h3 class="genre_text">
                ジャンルを追加
            </h3>
        </div>
        <form action="/upload/genre" method="post">
            @csrf
            <div class="genre-content">
                <div class="genre-form__item">
                    <input class="genre-form__item-input" type="text" name="genre" placeholder="例）居酒屋">
                </div>
                <div class="genre-form__button">
                    <button class="genre-form__button-submit" type="submit">作成</button>
                </div>
            </div>
        </form>
    </div>
    <div class="upload">
        <div class="upload_ttl">
            <h2>店舗情報を追加</h2>
        </div>
        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
        @csrf
            <table class="upload_table">
                <tr>
                    <th><label for="area">店名:</label></th>
                    <td><input class="upload_input" type="text" name="shop" required placeholder="店舗名" value="{{ old('shop') }}">
                    </td>
                </tr>
                <tr>
                    <th><label for="area">エリア:</label></th>
                    <td><select class="upload_input" name="area">
                        <option value=""selected disabled>エリアを選択してください</option>
                        @foreach($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->area }}</option>
                        @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="genre">ジャンル:</label></th>
                    <td><select class="upload_input" name="genre">
                            <option value="" selected disabled>ジャンルを選択してください</option>
                            @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                                @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="image">画像:</label></th>
                    <td><input class="upload_img" type="file" name="image" required>
                    </td>
                </tr>
                <tr>
                    <th><label for="content">詳細:</label></th>
                    <td><textarea class="upload_text" name="content" rows="4" required placeholder="店舗の紹介文等" >{{ old('content') }}</textarea>
                    </td>
                </tr>
            </table>
            <div class="upload_form__button">
                <button class="upload_form__button_submit" type="submit">アップロード</button>
            </div>
        </form>
    </div>
    <div class="mail">
        <div class="mail_ttl">
            <h2>お知らせメールを送る</h2>
        </div>
        <a class="mail_link" href="/notification">メールの送信</a>
    </div>
    <div class="store_edit">
        <div class="store_edit_ttl">
            <h2>予約情報の確認・店舗情報を編集</h2>
        </div>
        <table class="edit_table">
            <tr class="edit_row_wrp">
                <th class="edit_row">ID</th>
                <th class="edit_row">店舗名</th>
                <th class="edit_row">編集</th>
                <th class="edit_row">予約情報</th>
            </tr>
            @foreach($stores as $store)
            <tr class="edit_row_wrp">
                <td class="edit_row">{{ $store->id }}</td>
                <td class="edit_row">{{ $store->shop }}</td>
                <td class="edit_row"><a href="{{ route('showUploadEdit', ['id' => $store->id]) }}">編集</a></td>
                <td class="edit_row"><a href="{{ route('showReservation', ['id' => $store->id]) }}">確認</a></td>
            </tr>
            @endforeach
        </table>
        {{$stores->links()}}
    </div>
</div>
@endsection

