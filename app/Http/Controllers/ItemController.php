<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;


class ItemController extends Controller
{
    public function index(Request $request)
{
    // 昇順
        $query = Item::where('user_id', '!=', auth()->id())
                      ->orderBy('id', 'asc');


    // 商品名検索
    if ($request->filled('keyword')) {
        $query->where('name', 'like', '%' . $request->keyword . '%');
    }

    // 最低価格
    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }

    // 最高価格
    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    // 結果
    $items = $query->get();

    
    return view('items.index', compact('items'));
}


    public function create()
    {
        return view('items.create'); // 出品ページを表示
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|integer|min:1',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => '商品名は必須です。',
            'price.required' => '価格は必須です。',
            'description.required' => '説明は必須です。',
            'price.numeric' => '価格は数字で入力してください。',
            'image.image' => '画像ファイルを選択してください。',

        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Item::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'image_path' => $imagePath,
            'user_id' => auth()->id(),

        ]);

        return redirect()->route('items.index')->with('success', '商品を登録しました！');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|integer|min:1',
            'stock' => 'required|integer|min:0',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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
        // 合計金額
        $total = $item->price * $quantity;

        $user = auth()->user();

        // 購入履歴を保存
        Order::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'quantity' => $quantity,
            'total_price' => $total,
        ]);

        // 完了画面を表示
        return view('items.complete', [
            'item' => $item,
            'quantity' => $quantity,
            'total' => $total
        ])->with('success', '購入履歴を保存しました！');
    }
}
