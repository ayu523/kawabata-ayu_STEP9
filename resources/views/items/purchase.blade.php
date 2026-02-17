@extends('layouts.app')

@section('title', '商品購入')

@section('content')
    <h1>購入画面</h1>

    <h2>{{ $item->name }}</h2>
    <p>{{ $item->description }}</p>
    <p>価格：¥{{ number_format($item->price) }}</p>
    <p>在庫：{{ $item->stock }}</p>
    @if($item->image_path)
        <img src="{{ asset('storage/' . $item->image_path) }}" alt="商品画像" width="150">
    @endif

    <form action="{{ route('items.storePurchase', $item->id) }}" method="POST">
        @csrf
        <label for="quantity">購入数：</label>
        <input type="number" name="quantity" id="quantity" value="1" min="1">
        <br><br>
        <button type="submit" class="btn btn-edit">
            購入する
        </button>
    </form>

    <br>
    <a href="{{ route('items.index') }}">← 商品一覧に戻る</a>
@endsection
