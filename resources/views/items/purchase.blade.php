<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品購入</title>
</head>
<body>
    <h1>購入画面</h1>

    <p>商品名：{{ $item->name }}</p>
    <p>説明：{{ $item->description }}</p>

    <form action="#" method="POST">
        @csrf
        <label>購入個数：</label>
        <input type="number" name="quantity" min="1" max="10" value="1">
        <br><br>
        <p>金額：¥{{ number_format($item->price) }}</p>
        <p>残り：200</p>
        <p>会社：TNG</p>

        <button type="submit">購入する</button>
    </form>
</body>
</html>
