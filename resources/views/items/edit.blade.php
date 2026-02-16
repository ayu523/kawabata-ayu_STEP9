@extends('layouts.app')

@section('title', '商品編集')

@section('content')
    <h1>商品編集フォーム</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($item->image_path)
    <div style="margin-bottom:20px;">
        <img src="{{ asset('storage/' . $item->image_path) }}"
             style="width:200px; border-radius:8px;">
    </div>
    @endif

    <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="margin-bottom:20px;">
            <label>商品名</label><br>
            <input type="text"
                   name="name"
                   value="{{ old('name', $item->name) }}"
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
        </div>


        <div style="margin-bottom:20px;">
            <label>価格</label><br>
            <input type="number"
                   name="price"
                   value="{{ old('price', $item->price) }}"
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
        </div>

        <div style="margin-bottom:20px;">
            <label>在庫</label><br>
            <input type="number"
                   name="stock"
                   value="{{ old('stock', $item->stock) }}"
                   min="0"
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
        </div>

        <div style="margin-bottom:20px;">
            <label>説明</label><br>
            <textarea name="description"
                      rows="5"
                      style="width:100%; padding:8px; border:1px solid #ccc; border-radius:6px;">
                {{ old('description', $item->description) }}
            </textarea>
        </div>
        
        <div style="margin-top:20px; display:flex; gap:10px;">
    
            <a href="{{ route('items.show', $item->id) }}"
               style="background:#6c757d; color:white; padding:10px 20px; border-radius:6px; text-decoration:none;">
                戻る
            </a>

        <button type="submit"
                style="background:#2d7df6; color:white; padding:10px 20px; border:none; border-radius:6px;">
                 更新する
        </button>

        </div>

        </form>

@endsection
