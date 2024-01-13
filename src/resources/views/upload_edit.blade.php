@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/upload_edit.css') }}" />
@endsection
@section('content')
    <div class="edit">
        <div class="edit_ttl">
            <h2>店舗情報の更新</h2>
        </div>
        @if ($errors->any())
        <div class="upload__alert--danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <a class="edit_form-back" href="/upload/form">&lt;</a>
        <form class="edit_form" action="{{ route('uploadEdit', ['id' => $store->id]) }}" method="post">
            @csrf
            <table class="edit_table">
                <tr class="edit_table_row">
                    <th><label for="area">店名:</label></th>
                    <td><input class="edit_input" type="text" name="shop" value="{{ $store->shop }}" required></td>
                </tr>
                <tr>
                    <th><label for="area">エリア:</label></th>
                    <td><select class="edit_input" name="area">
                            <option value="" selected disabled>{{ $store->area->area }}</option>
                            @foreach($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->area }}</option>
                            @endforeach
                        </select></td>
                </tr>
                <tr>
                    <th><label for="genre">ジャンル:</label></th>
                    <td><select class="edit_input" name="genre">
                            <option value="" selected disabled>{{ $store->genre->genre }}</option>
                            @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                            @endforeach
                        </select></td>
                </tr>
                <tr>
                    <th><label for="image">画像:</label></th>
                    <td><input class="edit_img" type="file" name="image"></td>
                </tr>
                <tr>
                    <th><label for="content">詳細:</label></th>
                    <td><textarea class="edit_text" name="content" rows="5" required>{{$store->content}}</textarea></td>
                </tr>
            </table>
            <div class="edit_form__button">
                <button class="edit_form__button-submit" type="submit">更新する</button>
            </div>
        </form>

    </div>
@endsection