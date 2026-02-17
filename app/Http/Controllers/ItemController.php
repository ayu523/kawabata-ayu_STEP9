<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;
use App\Http\Requests\StoreItemRequest; 



class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::query();

    
        if (auth()->check()) {
            $query->where('user_id', '!=', auth()->id());
        }

        $query->orderBy('id', 'asc');

        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $items = $query->get();

        return view('items.index', compact('items'));
    }


    public function create()
    {
        return view('items.create'); // 出品ページ表示
    }

    public function store(StoreItemRequest $request)
    {
        
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock ?? 0,
            'description' => $request->description,
            'image_path' => $imagePath,
            'user_id' => auth()->id(),
            'company_id' => auth()->user()->company_id,
        ]);

        return redirect()->route('items.index')->with('success', '商品を登録しました！');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    public function update(UpdateItemReques $request, $id)
    {
        $item = Item::findOrFail($id);

        $validated = $request->validate();

        $item->name = $validated['name'];
        $item->price = $validated['price'];
        $item->stock = $validated['stock'];
        $item->description = $validated['description'];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $item->image_path = $path;
        }

        $item->save();

        return redirect()->route('items.show', $item->id)->with('success', '商品情報を更新しました！');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        // 画像ファイル削除
        if ($item->image_path && Storage::exists('public/' . $item->image_path)) {
            Storage::delete('public/' . $item->image_path);
        }
        $item->delete();

        return redirect()->route('items.index')->with('success', '商品を削除しました');
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('items.show', compact('item'));
    }

    public function purchase($id)
    {
        $item = Item::findOrFail($id);
        return view('items.purchase', compact('item'));
    }

    public function storePurchase(Request $request, $id)
{
    $item = Item::findOrFail($id);
    $quantity = (int)$request->input('quantity');

    if ($item->stock < $quantity) {
        return back()->with('error', '在庫が不足しています');
    }

    $user = auth()->user();

    DB::transaction(function () use ($item, $quantity, $user) {

        // 在庫減らす
        $item->decrement('stock', $quantity);

        // 合計金額
        $total = $item->price * $quantity;

        // 購入保存
        Order::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'quantity' => $quantity,
            'total_price' => $total,
        
        ]);

    });
        return view('items.complete', [
            'item' => $item,
            'quantity' => $quantity,
            'total' => $item->price * $quantity
        ]);
    
}

}
