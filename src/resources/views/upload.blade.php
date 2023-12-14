@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}" />
@endsection
@section('content')
    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="upload__alert">
            <div class="upload__alert--success">
                {{ session('message') }}
            </div>
        </div>
        <label for="area">店名:</label>
        <input type="text" name="shop" required>

        <label for="area">エリア:</label>
        <input type="text" name="area" required>

        <label for="genre">ジャンル:</label>
        <input type="text" name="genre" required>

        <label for="content">詳細:</label>
        <textarea name="content" rows="4" required></textarea>

        <label for="image">画像:</label>
        <input type="file" name="image" required>
            <button type="submit">アップロード</button>
    </form>
@endsection

