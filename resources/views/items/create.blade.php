<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品登録</title>
</head>
<body>
    <h1>商品登録フォーム</h1>

    {{-- エラーメッセージ表示 --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>商品名：</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label>価格：</label>
            <input type="number" name="price" value="{{ old('price') }}">
        </div>

        <div>
            <label>説明：</label><br>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label>画像：</label>
            <input type="file" name="image">
        </div>

        <br>
        <button type="submit">登録する</button>
    </form>

    <br>
    <a href="{{ route('items.index') }}">一覧に戻る</a>
</body>
</html>
