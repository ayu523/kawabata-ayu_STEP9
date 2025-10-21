<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>購入履歴</title>
</head>
<body>
    <h1>購入履歴一覧</h1>

    @if ($orders->isEmpty())
        <p>購入履歴がありません。</p>
    @else
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>購入日時</th>
                    <th>商品名</th>
                    <th>数量</th>
                    <th>合計金額(¥)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->created_at->format('Y/m/d H:i') }}</td>
                        <td>{{ $order->item->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ number_format($order->total_price) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <br>
    <a href="{{ route('items.index') }}">商品一覧へ戻る</a>
</body>
</html>
