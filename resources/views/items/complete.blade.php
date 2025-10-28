@extends('layouts.app')

@section('content')
    <h1>購入が完了しました！</h1>

    <h2>{{ $item->name }}</h2>
    <p>数量：{{ $quantity }}</p>
    <p>合計金額：¥{{ number_format($total) }}</p>

    @if($item->image_path)
        <img src="{{ asset('storage/' . $item->image_path) }}" alt="商品画像" width="150">
    @endif

    <br><br>
    <a href="{{ route('items.index') }}">商品一覧に戻る</a>
@endsection
