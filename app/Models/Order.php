<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id',
        'quantity',
        'total_price',
    ];

    // 商品との関係（1件の注文は1つの商品に属する）
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // ユーザーとの関係（1件の注文は1人のユーザーに属する）
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
