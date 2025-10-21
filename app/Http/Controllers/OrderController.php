<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        // 購入履歴を新しい順で取得（商品情報も一緒に）
        $orders = Order::with('item')->orderBy('created_at', 'desc')->get();

        // ビューに渡して表示
        return view('orders.index', compact('orders'));
    }
}
