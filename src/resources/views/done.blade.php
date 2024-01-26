@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection
@section('content')
    <div class="thanks">
        <div class="thanks_content">
            <h2 class="thanks_ttl">ご予約ありがとうございます</h2>
            <div class="form__button">
                <a class="form__button-submit" href="{{ route('showCharge') }}">そのままお支払いをする</a>
                <a class="form__button-submit" href="/">戻る</a>
            </div>
        </div>
    </div>
@endsection