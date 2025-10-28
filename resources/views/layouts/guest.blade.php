<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Auth')</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
  <style>
    header { display:flex; justify-content: space-between; align-items:center; padding:12px 16px; border-bottom:1px solid #eee; }
    header .brand { font-weight: 700; }
    header nav a { margin-left: 12px; text-decoration:none; }
    header nav a.active { text-decoration: underline; font-weight:600; }
    main { max-width: 640px; margin: 24px auto; padding: 0 16px; }
  </style>
</head>
<body>
  <header>
    <div class="brand">Cytech EC</div>
    <nav>
      <a href="{{ route('login') }}"  class="{{ request()->routeIs('login') ? 'active' : '' }}">ログイン</a>
      <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">新規登録</a>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>
</body>
</html>
