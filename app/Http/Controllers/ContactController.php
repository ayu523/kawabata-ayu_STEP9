<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail; // 後で作るMailableクラス

class ContactController extends Controller
{
    // 入力画面
    public function index()
    {
        return view('contact.index');
    }

    // 確認画面
    public function confirm(Request $request)
    {
        // 入力チェック（バリデーション）
        $inputs = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'message' => 'required|max:1000',
        ]);

        // Blade で使う変数名を $inputs に統一
        return view('contact.confirm', compact('inputs'));
    }

    // 送信処理＋完了画面
    public function send(Request $request)
    {
        // 念のため再チェック
        $inputs = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'message' => 'required|max:1000',
        ]);

        // メール送信処理
        Mail::to('tka0154@gmail.com') // ← 管理者宛アドレス
            ->send(new ContactMail($inputs)); // ← ContactMail クラスにデータ渡す

        // 完了画面を表示
        return view('contact.thanks');
    }
}
