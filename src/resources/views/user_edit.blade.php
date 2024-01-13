@extends('layouts.layouts')
@section('css')
<link rel="stylesheet" href="{{ asset('css/user_edit.css') }}" />
@endsection
@section('content')
    <div class="user_edit">
        <a class="list_back" href="{{ url()->previous() }}">&lt;</a>
        <div class="edit_ttl">
            <h2>{{$user->name}}さんの権限変更</h2>
        </div>
        <form class="edit_form" action="{{ route('userEdit', ['id' => $user->id]) }}" method="post">
            @csrf
            <label for="roles">権限:</label>
                <select class="edit_input" name="roles">
                    @foreach($roles as $role)
                        @if($role->name !== 'admin')
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endif
                    @endforeach
                </select>
            <div class="edit_form__button">
                <button class="edit_form__button-submit" type="submit">更新する</button>
            </div>
        </form>
        <div class="edit_ttl">
            <h2>{{$user->name}}さんの権限剥奪</h2>
        </div>
        <form class="edit_form" action="{{ route('revokeRoles', ['id' => $user->id]) }}" method="post">
            @csrf
            <div class="revoke_form__button">
                <button class="revoke_form__button-submit" type="submit">権限を剥奪する</button>
            </div>
        </form>
    </div>
@endsection