@extends('layouts.app')

@section('content')
    <h1>お問い合わせありがとうございます！</h1>

    <p>以下の内容でお問い合わせを受け付けました。</p>

    <ul>
        <li>お名前：{{ old('name') ?? '入力内容をご確認ください。' }}</li>
        <li>メールアドレス：{{ old('email') ?? '入力内容をご確認ください。' }}</li>
    </ul>

    <p>確認メールを送信しました。担当者から折り返しご連絡いたします。</p>

    <br>
    <a href="{{ route('contact.index') }}">お問い合わせフォームへ戻る</a><br>
    <a href="{{ route('items.index') }}">トップページへ
@endsection