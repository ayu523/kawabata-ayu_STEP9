@extends('layouts.app')

@section('title', '購入完了')

@section('content')

<div class="complete-container">
    <h1>購入が完了しました 🎉</h1>

    <p><strong>商品名：</strong> {{ $item->name }}</p>
    <p><strong>購入数：</strong> {{ $quantity }}</p>
    <p><strong>合計金額：</strong> ¥{{ number_format($total) }}</p>

    <br>

    <a href="{{ route('items.index') }}" class="btn">
        商品一覧へ戻る
    </a>

    <a href="{{ route('mypage.index') }}" class="btn">
        マイページへ
    </a>
</div>

@endsection
