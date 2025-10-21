<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MyPageController;

// 商品登録フォーム
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');

// 商品一覧・詳細・購入
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/{id}', [ItemController::class, 'show'])->name('items.show');
Route::get('/items/{id}/purchase', [ItemController::class, 'purchase'])->name('items.purchase');
Route::post('/items/{id}/purchase', [ItemController::class, 'storePurchase'])->name('items.storePurchase');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
// お問い合わせフォームのルート
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // 商品編集ページを表示
    Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
    // 商品を削除
    Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');
    // 商品更新処理
    Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');
    Route::get('/mypage', [App\Http\Controllers\MyPageController::class, 'index'])->name('mypage.index');

});

require __DIR__.'/auth.php';
