<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // 編集画面を表示
    public function edit()
    {
        $user = Auth::user();
        return view('account.edit', compact('user'));
    }

    // 更新処理
    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|email',
            'name' => 'required|string|max:50',
            'kana' => 'required|string|max:50',
        ]);

        $user = Auth::user();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->kana = $request->kana;
        $user->save();

        return redirect()->route('mypage.index')->with('success', 'アカウント情報を更新しました！');
    }
}

