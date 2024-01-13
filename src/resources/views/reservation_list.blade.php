@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/reservation_list.css') }}" />
@endsection
@section('content')
    <div class="reservation_list">
        <a class="list_back" href="{{ url()->previous() }}">&lt;</a>
        <div class="list_ttl">
            <h2>{{$store->shop}}</h2>
        </div>
        <table class="list_table">
            @if($reservations->count() > 0)
            <tr class="list_row_wrp">
                <th class="list_row">予約ID</th>
                <th class="list_row">名前</th>
                <th class="list_row">日付</th>
                <th class="list_row">時間</th>
                <th class="list_row">人数</th>
            </tr>
            @foreach($reservations as $reservation)
            <tr class="list_row_wrp">
                <td class="list_row">{{$reservation->id}}</td>
                <td class="list_row">{{$reservation->user->name}}</td>
                <td class="list_row">{{$reservation->date}}</td>
                <td class="list_row">{{$reservation->time}}</td>
                <td class="list_row">{{$reservation->number}}</td>
            </tr>
            @endforeach
            @else
            <p>予約はありません</p>
            @endif
        </table>
    </div>
@endsection