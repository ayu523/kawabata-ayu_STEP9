@extends('layouts.app')

@section('content')
    <style>
    .mypage-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
    }

    .mypage-table th,
    .mypage-table td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    .mypage-table th {
        background-color: #f5f5f5;
    }
    </style>

    <h1>{{ $user->name }} さんのマイページ</h1>
    <br>
    <a href="{{ route('account.edit') }}" class="btn btn-edit">アカウント編集</a>
    <br><br>
    
    <div style="display:flex; justify-content:space-between; align-items:center;">
    <h2>出品商品</h2>
    <a href="{{ route('items.create') }}" class="btn btn-edit"> 新規登録</a>
    </div>



    @if($items->isEmpty())
        <p>出品商品はありません。</p>
    @else
        <table class="mypage-table">
            <tr>
               <th>商品番号</th>
               <th>商品名</th>
               <th>商品説明</th>
               <th>価格</th>
               <th>詳細</th>
            </tr>
            @foreach($items as $item)
                <tr>
                   <td>{{ $item->id }}</td>
                   <td>{{ $item->name }}</td>
                   <td>{{ $item->description }}</td>
                   <td>{{ number_format($item->price) }} 円</td>
                   <td>
                      <a href="{{ route('items.show', $item->id) }}">詳細</a>
                   </td>
               </tr>
            @endforeach
        </table>
    @endif

    <br>


    <h2>購入履歴</h2>

    @if ($orders->isEmpty())
        <p>購入履歴はありません。</p>
    @else
        <table class="mypage-table">
            <tr>
                <th>購入日</th>
                <th>商品名</th>
                <th>金額</th>
                <th>数量</th>
            </tr>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                    <td>{{ $order->item->name }}</td>
                    <td>{{ number_format($order->item->price) }} 円</td>
                    <td>{{ $order->quantity }}</td>
                </tr>
            @endforeach
        </table>
    @endif

    <br>
    <a href="{{ route('items.index') }}">商品一覧に戻る</a>
@endsection
