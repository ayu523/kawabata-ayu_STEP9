@extends('layouts.app')

@section('content')
<style>
    .item-index {
        max-width: 900px;
        margin: 40px auto;
        background: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    form.search-form {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin-bottom: 25px;
    }

    form.search-form input {
        padding: 6px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 150px;
    }

    form.search-form button {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 6px 12px;
        cursor: pointer;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }

    th, td {
        border-bottom: 1px solid #ddd;
        padding: 10px;
    }

    th {
        background-color: #f7f7f7;
        font-weight: bold;
    }

    tr:hover {
        background-color: #f9f9f9;
    }

    img {
        width: 60px;
        border-radius: 5px;
    }
    
    .search-form {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin: 20px 0;
    }

    .search-form input {
        padding: 6px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 150px;
    }

    .search-form button {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 6px 12px;
        cursor: pointer;
    }

    .search-form button:hover {
        background-color: #0056b3;
}

    .btn-detail {
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 6px 10px;
        text-decoration: none;
    }

    .btn-detail:hover {
        background-color: #218838;
    }
</style>

<div class="item-index">
    <h1>商品一覧</h1>

    {{-- 🔍 検索フォーム --}}
    <form action="{{ route('items.index') }}" method="GET" class="search-form">
        <input type="text" name="keyword" placeholder="商品名を入力" value="{{ request('keyword') }}">
        <input type="number" name="min_price" placeholder="最低価格" value="{{ request('min_price') }}">
        〜
        <input type="number" name="max_price" placeholder="最高価格" value="{{ request('max_price') }}">
        <button type="submit">検索</button>
    </form>

    {{-- 商品一覧テーブル --}}
    <table>
        <thead>
            <tr>
                <th>商品番号</th>
                <th>商品名</th>
                <th>商品説明</th>
                <th>画像</th>
                <th>価格 (円)</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        @if($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}" alt="商品画像">
                        @else
                            画像なし
                        @endif
                    </td>
                    <td>{{ number_format($item->price) }}</td>
                    <td>
                        <a href="{{ route('items.show', $item->id) }}" class="btn-detail">詳細</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
