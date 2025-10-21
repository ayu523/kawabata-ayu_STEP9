<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品購入</title>
</head>
<body>
    <h1>購入画面</h1>

    <h2>{{ $item->name }}</h2>
    <p>{{ $item->description }}</p>
    <p>価格：¥{{ number_format($item->price) }}</p>

    @if($item->image_path)
        <img src="{{ asset('storage/' . $item->image_path) }}" alt="商品画像" width="150">
    @endif

    <form action="{{ route('items.storePurchase', $item->id) }}" method="POST">
        @csrf
        <label for="quantity">購入数：</label>
        <input type="number" name="quantity" id="quantity" value="1" min="1">
        <br><br>
        <button type="submit">購入する</button>
    </form>

    <br>
    <a href="{{ route('items.index') }}">← 商品一覧に戻る</a>
</body>
</html>
