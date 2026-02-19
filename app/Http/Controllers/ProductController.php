<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            ['id' => 1, 'name' => 'Attack on Titan Complete Series', 'price' => 4500, 'image' => 'aot.jpg', 'description' => 'Epic battle against Titans'],
            ['id' => 2, 'name' => 'Demon Slayer: Kimetsu no Yaiba', 'price' => 3800, 'image' => 'demonslayer.jpg', 'description' => 'Breathe techniques and demon slaying'],
            ['id' => 3, 'name' => 'Jujutsu Kaisen Season 1', 'price' => 4200, 'image' => 'jujutsu.jpg', 'description' => 'Cursed energy and sorcerers'],
            ['id' => 4, 'name' => 'One Piece Box Set', 'price' => 5200, 'image' => 'onepiece.jpg', 'description' => 'Pirate adventure saga'],
            ['id' => 5, 'name' => 'Spy x Family', 'price' => 3600, 'image' => 'spyxfamily.jpg', 'description' => 'Fake family spy comedy']
        ];

        return view('products.index', compact('products'));
    }
}
