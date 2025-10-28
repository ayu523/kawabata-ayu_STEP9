@extends('layouts.app')

@section('content')
<div class="item-create">
    <h1>商品登録</h1>

    {{-- エラーメッセージ --}}
    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">商品名</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="price">価格</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" required>
        </div>

        <div class="form-group">
            <label for="description">商品説明</label>
            <textarea id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="stock">在庫数</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock') }}">
        </div>

        <div class="form-group">
            <label for="image">商品画像</label>
            <input type="file" id="image" name="image">
        </div>

        <div class="form-buttons">
            <a href="{{ route('items.index') }}" class="btn-back">戻る</a>
            <button type="submit" class="btn-submit">登録</button>
        </div>
    </form>
</div>
@endsection
