<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // 複数代入可能にするカラムを指定
    protected $fillable = [
        'name',
        'price',
        'description',
        'image_path', 
        'user_id',
    ];

    // 商品が持つ「注文履歴」とのリレーション
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}