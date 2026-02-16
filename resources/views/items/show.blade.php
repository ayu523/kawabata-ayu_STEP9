@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: "Hiragino Kaku Gothic ProN", sans-serif;
        margin: 40px;
    }
    img {
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0,0,0,0.3);
    }
    .btn {
        display: inline-block;
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        margin: 5px;
    }
    .btn-delete {
        background-color: #e74c3c;
    }
    .btn-edit {
        background-color: #3498db;
    }
</style>

<h1>商品詳細ページ</h1>

<p><strong>商品番号：</strong> {{ $item->id }}</p>
<p><strong>商品名：</strong> {{ $item->name }}</p>
<p><strong>説明：</strong> {{ $item->description }}</p>
<p><strong>価格：</strong> ¥{{ number_format($item->price) }}</p>

@if($item->image_path)
    <p><img src="{{ asset('storage/' . $item->image_path) }}" width="250"></p>
@else
    <p>画像なし</p>
@endif

<hr>


<a href="{{ route('items.purchase', $item->id) }}" class="btn">購入する</a>

@auth.  
    @if($item->user_id === auth()->id())
        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-edit">
            編集する
        </a>
    @endif
@endauth


@if(Auth::check())
    @php
        $isFavorite = \App\Models\Favorite::where('user_id', Auth::id())
                        ->where('item_id', $item->id)
                        ->exists();
    @endphp
    @if($isFavorite)
        <form action="{{ route('favorites.destroy', $item->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn" style="background-color:#ff7675;">❤️ お気に入り解除</button>
        </form>
    @else
        <form action="{{ route('favorites.store', $item->id) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn" style="background-color:#f39c12;">♡ お気に入りに追加</button>
        </form>
    @endif
@endif

<br><br>
<a href="{{ route('items.index') }}">← 一覧に戻る</a>
@endsection
