@extends('layouts.app')

@section('content')
    <h1>お問い合わせフォーム</h1>
    <div style="max-width:600px; margin:0 auto;">
    <form action="{{ route('contact.confirm') }}" method="POST">
        @csrf
        <div style="margin-bottom:15px;">
            <label>お名前</label><br>
            <input type="text" name="name" style="width:100%;">
        </div>


        <div style="margin-bottom:15px;">
            <label>メールアドレス</label><br>
            <input type="email" name="email" style="width:100%;">
        </div>


        <div style="margin-bottom:15px;">
            <label>お問い合わせ内容</label><br>
            <textarea name="message" rows="5" style="width:100%;"></textarea>
        </div>


        <br>
        <button type="submit">確認画面へ</button>
    </form>
    </div>

@endsection
