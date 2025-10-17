<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品一覧</title>
</head>
<body>
    <h1>商品一覧</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>商品番号</th>
                <th>商品名</th>
                <th>商品説明</th>
                <th>画像</th>
                <th>料金(¥)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    <a href="{{ route('items.show', $item->id) }}">
                        {{ $item->name }}
                    </a>
                </td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    @if($item->image_path)
                        <img src="{{ asset('storage/' . $item->image_path) }}" width="80">
                    @else
                        画像なし
                    @endif
                </td>
                <td>{{ number_format($item->price) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
