<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品一覧</title>
</head>
<body>
    <h1>商品一覧</h1>

    <ul>
        @foreach($items as $item)
            <li>
                <strong>{{ $item->name }}</strong><br>
                価格: {{ $item->price }}円<br>
                説明: {{ $item->description }}
            </li>
        @endforeach
    </ul>
</body>
</html>
