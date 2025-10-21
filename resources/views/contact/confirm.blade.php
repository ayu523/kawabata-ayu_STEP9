<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせ内容確認</title>
</head>
<body>
    <h1>お問い合わせ内容確認</h1>

    <form action="{{ route('contact.send') }}" method="POST">
        @csrf

        <div>
            <label>お名前：</label>
            {{ $inputs['name'] }}
            <input type="hidden" name="name" value="{{ $inputs['name'] }}">
        </div>

        <div>
            <label>メールアドレス：</label>
            {{ $inputs['email'] }}
            <input type="hidden" name="email" value="{{ $inputs['email'] }}">
        </div>

        <div>
            <label>お問い合わせ内容：</label><br>
            {!! nl2br(e($inputs['message'])) !!}
            <input type="hidden" name="message" value="{{ $inputs['message'] }}">
        </div>

        <br>
        <button type="submit">送信する</button>
    </form>

    <br>
    <form action="{{ route('contact.index') }}" method="GET">
        <button type="submit">戻る</button>
    </form>
</body>
</html>
