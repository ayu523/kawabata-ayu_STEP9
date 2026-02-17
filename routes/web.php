<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\FavoriteController;

// 商品登録フォーム
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::get('/items/complete', function () {
    return view('items.complete');
})->name('items.complete');

// 商品一覧・詳細・購入
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/{id}', [ItemController::class, 'show'])->name('items.show');
Route::get('/items/{id}/purchase', [ItemController::class, 'purchase'])->name('items.purchase');
Route::post('/items/{id}/purchase', [ItemController::class, 'storePurchase'])
    ->middleware('auth')
    ->name('items.storePurchase');

Route::post('/items', [ItemController::class, 'store'])->name('items.store');

// お問い合わせフォーム
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// 注文一覧
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

// トップページ
Route::get('/', function () {
    return view('welcome');
});

// ダッシュボード
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// ログイン済みユーザー専用ページ
Route::middleware('auth')->group(function () {
    // プロフィール編集
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // マイページ
    Route::get('/mypage', [App\Http\Controllers\MyPageController::class, 'index'])->name('mypage.index');

    // お気に入り登録／解除
    Route::post('/favorites/{item}', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites/{item}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

    // 商品編集・削除・更新
    Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');
    Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');

    // アカウント編集
    Route::get('/account/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('account.edit');
    Route::post('/account/update', [App\Http\Controllers\UserController::class, 'update'])->name('account.update');
});


require __DIR__.'/auth.php';
