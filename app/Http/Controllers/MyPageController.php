<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index()
    {
        // ログイン中のユーザーを取得
        $user = Auth::user();

        // ユーザーに紐づく購入履歴を取得
        $orders = Order::where('user_id', $user->id)
            ->with('item') // 商品情報も一緒に
            ->orderBy('created_at', 'desc')
            ->get();

        return view('mypage.index', compact('user', 'orders'));
    }
}
