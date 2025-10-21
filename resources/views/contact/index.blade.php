<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム</title>
</head>
<body>
    <h1>お問い合わせフォーム</h1>

    <form action="{{ route('contact.confirm') }}" method="POST">
        @csrf
        <div>
            <label>お名前：</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label>メールアドレス：</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label>お問い合わせ内容：</label><br>
            <textarea name="message" rows="5">{{ old('message') }}</textarea>
        </div>

        <br>
        <button type="submit">確認画面へ</button>
    </form>
</body>
</html>
