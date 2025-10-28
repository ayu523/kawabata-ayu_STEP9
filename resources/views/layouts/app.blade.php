<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Cytech EC</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    {{-- ヘッダー --}}
    <header class="site-header">
        <div class="header-left">
            <h1>Cytech EC</h1>
        </div>
        <nav class="header-nav">
            <a href="{{ route('items.index') }}">Home</a>
            <a href="{{ route('mypage.index') }}">マイページ</a>

            @auth
                <span>ログインユーザー：{{ Auth::user()->name }}</span>
                {{-- ここをインラインで表示 --}}
                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="logout-btn">ログアウト</button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}">ログイン</a>
                <a href="{{ route('register') }}">新規登録</a>
            @endguest
        </nav>
    </header>

    {{-- コンテンツ部分 --}}
    <main class="main-content">
        @yield('content')
    </main>

    {{-- フッター --}}
    <footer class="site-footer">
        <div class="footer-top">
            <a href="{{ route('contact.index') }}" class="btn-contact">お問い合わせ</a>
        </div>
        <div class="footer-links">
            <a href="{{ route('items.index') }}">Home</a> |
            <a href="{{ route('mypage.index') }}">マイページ</a>
        </div>
        <p class="footer-copy">© 2024 Company, Inc</p>
    </footer>
</body>
</html>
