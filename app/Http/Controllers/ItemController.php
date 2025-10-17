<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        // items テーブルから全件取得
        $items = Item::orderBy('id', 'asc')->get();

        // ビューに渡す
        return view('items.index', compact('items'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Item $item)
    {
        //
    }

    public function update(Request $request, Item $item)
    {
        //
    }

    public function destroy(Item $item)
    {
        //
    }

    public function show($id)
    {
        $item = Item::findOrFail($id); // IDで商品を取得
        return view('items.show', compact('item'));
    }

    public function purchase($id)
    {
        $item = Item::findOrFail($id);
        return view('items.purchase', compact('item'));
    }
}
