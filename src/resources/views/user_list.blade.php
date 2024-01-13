@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/user_list.css') }}" />
@endsection
@section('content')
    <div class="user_list">
        <div class="message">
            @if(session('message'))
            {{ session('message') }}
            @endif
        </div>
        <div class="list_ttl">
            <h2>ユーザー一覧</h2>
        </div>
        <table class="list_table">
            <tr class="list_row_wrp">
                <th class="list_row">ID</th>
                <th class="list_row">名前</th>
                <th class="list_row">メールアドレス</th>
                <th class="list_row">権限</th>
                <th class="list_row">権限の変更</th>
            </tr>
            @foreach($users as $user)
            <tr class="list_row_wrp">
                <td class="list_row">{{$user->id}}</td>
                <td class="list_row">{{$user->name}}</td>
                <td class="list_row">{{$user->email}}</td>
                <td class="list_row">
                    @foreach($user->roles as $role)
                        {{ $role->name }}
                    @endforeach
                </td>
                <td class="list_row"><a href="{{ route('showUserEdit', ['id' => $user->id])}}">変更</a></td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection