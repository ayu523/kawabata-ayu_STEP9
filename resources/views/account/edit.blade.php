@extends('layouts.app')

@section('content')
<div class="account-edit">
    <h1>アカウント情報編集</h1>

    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('account.update') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="username">ユーザ名</label>
            <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}">
        </div>

        <div class="form-group">
            <label for="email">Eメール</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}">
        </div>

        <div class="form-group">
            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}">
        </div>

        <div class="form-group">
            <label for="kana">カナ</label>
            <input type="text" id="kana" name="kana" value="{{ old('kana', $user->kana) }}">
        </div>

        <div class="form-buttons">
            <a href="{{ route('mypage.index') }}" class="btn-back">戻る</a>
            <button type="submit" class="btn-submit">更新</button>
        </div>
    </form>
</div>
@endsection
