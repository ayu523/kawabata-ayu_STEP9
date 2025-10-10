<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'name' => 'イヤホン',
            'price' => 3000,
            'description' => '高音質のワイヤレスイヤホンです。',
        ]);

        Item::create([
            'name' => 'タブレット',
            'price' => 25000,
            'description' => '10インチのタブレット端末です。',
        ]);
    }
}
