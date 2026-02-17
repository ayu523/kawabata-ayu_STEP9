<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // 複数代入可能にするカラムを指定
    protected $fillable = [
        'name',
        'price',
        'stock',
        'description',
        'image_path', 
        'user_id',
        'company_id'
    ];

    // 商品が持つ「注文履歴」とのリレーション
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}