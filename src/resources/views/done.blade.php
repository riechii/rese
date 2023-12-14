@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection
@section('content')
    <div class="thanks">
        <div class="thanks_content">
            <h2 class="thanks_ttl">ご予約ありがとうございます</h2>
            <div class="form__button">
                <button class="form__button-submit" type="submit">戻る</button>
            </div>
        </div>
    </div>
@endsection