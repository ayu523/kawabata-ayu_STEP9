<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>マイページ</title>
</head>
<body>
    <h1>{{ $user->name }} さんのマイページ</h1>

    <h2>購入履歴</h2>

    @if ($orders->isEmpty())
        <p>購入履歴はありません。</p>
    @else
        <table border="1" cellpadding="8">
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
</body>
</html>
