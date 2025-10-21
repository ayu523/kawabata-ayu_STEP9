<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品編集</title>
</head>
<body>
    <h1>商品編集フォーム</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label>商品名：</label>
            <input type="text" name="name" value="{{ old('name', $item->name) }}">
        </div>

        <div>
            <label>価格：</label>
            <input type="number" name="price" value="{{ old('price', $item->price) }}">
        </div>

        <div>
            <label>説明：</label><br>
            <textarea name="description">{{ old('description', $item->description) }}</textarea>
        </div>

        <div>
            <label>画像：</label>
            <input type="file" name="image">
            @if($item->image_path)
                <p>現在の画像：</p>
                <img src="{{ asset('storage/' . $item->image_path) }}" width="100">
            @endif
        </div>

        <br>
        <button type="submit">更新する</button>
    </form>

    <br>
    <a href="{{ route('items.show', $item->id) }}">← 詳細ページに戻る</a>
</body>
</html>
