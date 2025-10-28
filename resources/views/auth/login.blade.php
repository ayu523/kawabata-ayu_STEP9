@extends('layouts.guest')
@section('title', 'ログイン')

@section('content')
  <h1 class="mb-4" style="font-size:20px;font-weight:600;">ログイン</h1>

  @if ($errors->any())
    <div style="color:#b91c1c;background:#fee2e2;padding:10px 12px;border-radius:6px;margin-bottom:12px;">
      <ul style="margin:0;padding-left:18px;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('login') }}" style="max-width:480px;">
    @csrf

    <div style="margin-bottom:12px;">
      <label for="email">Email</label><br>
      <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
             style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
    </div>

    <div style="margin-bottom:12px;">
      <label for="password">Password</label><br>
      <input id="password" type="password" name="password" required
             style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;">
    </div>

    <div style="margin:12px 0;">
      <label style="display:inline-flex;align-items:center;gap:6px;">
        <input type="checkbox" name="remember"> <span>Remember me</span>
      </label>
    </div>

    {{-- ▼ ボタンとリンクを横並びに --}}
    <div style="display:flex;align-items:center;gap:14px;margin-top:8px;">
      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}"
           style="font-size:14px;color:#2563eb;text-decoration:underline;">
          パスワードをお忘れですか？
        </a>
      @endif

      <button type="submit"
              style="display:inline-block;padding:10px 16px;background:#2563eb;color:#fff;border:none;border-radius:8px;">
        ログイン
      </button>
    </div>
    {{-- ▲ ここまで --}}
  </form>
@endsection
