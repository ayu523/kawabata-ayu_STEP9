@extends('layouts.app')

@section('content')

<h1>商品詳細ページ</h1>

<p><strong>商品番号：</strong> {{ $item->id }}</p>
<p><strong>商品名：</strong> {{ $item->name }}</p>
<p><strong>説明：</strong> {{ $item->description }}</p>
<p><strong>価格：</strong> ¥{{ number_format($item->price) }}</p>

{{-- 会社名（ある場合のみ表示） --}}
@if($item->company)
    <p><strong>会社：</strong> {{ $item->company->name }}</p>
@endif

{{-- 商品画像 --}}
@if($item->image_path)
    <p>
        <img src="{{ asset('storage/' . $item->image_path) }}" width="250">
    </p>
@else
    <p>画像なし</p>
@endif

<hr>

@auth
    @if($item->user_id === auth()->id())
        {{-- 出品者の場合 --}}

        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-edit">
            編集する
        </a>

        <form action="{{ route('items.destroy', $item->id) }}" 
              method="POST" 
              style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="btn btn-delete"
                    onclick="return confirm('本当に削除しますか？')">
                削除する
            </button>
        </form>

    @else
        {{-- 購入者の場合 --}}

        <a href="{{ route('items.purchase', $item->id) }}" class="btn">
            カートに追加
        </a>

        @php
            $isFavorite = \App\Models\Favorite::where('user_id', auth()->id())
                            ->where('item_id', $item->id)
                            ->exists();
        @endphp

        @if($isFavorite)
            <form action="{{ route('favorites.destroy', $item->id) }}" 
                  method="POST" 
                  style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn">
                    ♡ お気に入り解除
                </button>
            </form>
        @else
            <form action="{{ route('favorites.store', $item->id) }}" 
                  method="POST" 
                  style="display:inline;">
                @csrf
                <button type="submit" class="btn">
                    ♡ お気に入り追加
                </button>
            </form>
        @endif

    @endif
@endauth

<br><br>

<a href="{{ route('items.index') }}">← 戻る</a>

@endsection
