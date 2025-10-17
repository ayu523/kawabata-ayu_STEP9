<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ $item->name }} の詳細</title>
</head>
<body>
    <h1>{{ $item->name }}</h1>
    <p>価格: {{ $item->price }}円</p>
    <p>説明: {{ $item->description }}</p>

    @if($item->image_path)
        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}" width="300">
    @endif

    <p><a href="{{ route('items.index') }}">← 商品一覧に戻る</a></p>
</body>
</html>
