@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/upload.css') }}" />
@endsection
@section('content')
    <div class="upload">
        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
        @csrf
            @if (session('message'))
            <div class="upload__alert">
                <div class="upload__alert--success">
                    {{ session('message') }}
                </div>
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
            <label for="area">店名:</label>
            <input type="text" name="shop" required>

            <label for="area">エリア:</label>
            <select name="area">
                <option value=""selected disabled>エリアを選択してください</option>
                @foreach($areas as $area)
                <option value="{{ $area->id }}">{{ $area->area }}</option>
                @endforeach
            </select>

            <label for="genre">ジャンル:</label>
            <select name="genre">
                <option value="" selected disabled>ジャンルを選択してください</option>
                @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                @endforeach
            </select>

            <label for="content">詳細:</label>
            <textarea name="content" rows="4" required></textarea>

            <label for="image">画像:</label>
            <input type="file" name="image" required>
                <button type="submit">アップロード</button>
        </form>
    </div>
    <div class="area">
        <div class="area__alert">
            <h3 class="area__alert--success">
                エリア
            </h3>
        </div>
        <form action="/upload/area" method="post">
            @csrf
            <div class="area-content">
                <div class="area-form__item">
                    <input class="area-form__item-input" type="text" name="area">
                </div>
                <div class="area-form__button">
                    <button class="area-form__button-submit" type="submit">作成</button>
                </div>
            </div>
        </form>
    </div>
    <div class="genre">
        <div class="genre__alert">
            <h3 class="genre__alert--success">
                ジャンル
            </h3>
        </div>
        <form action="/upload/genre" method="post">
            @csrf
            <div class="genre-content">
                <div class="genre-form__item">
                    <input class="genre-form__item-input" type="text" name="genre">
                </div>
                <div class="genre-form__button">
                    <button class="genre-form__button-submit" type="submit">作成</button>
                </div>
            </div>
        </form>
    </div>
@endsection

