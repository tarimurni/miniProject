<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Data Layer: Simpan data produk dalam bentuk array multidimensi
        $products = [
            [
                'id' => 1,
                'nama' => 'Laptop Asus Vivobook',
                'kategori' => 'Elektronik',
                'harga' => 8500000,
                'stok' => 5,
                'deskripsi' => 'Laptop kerja sehari-hari dengan prosesor Intel Core i5'
            ],
            [
                'id' => 2,
                'nama' => 'Mouse Wireless Logitech',
                'kategori' => 'Aksesori',
                'harga' => 150000,
                'stok' => 2, // Stok kritis (< 3)
                'deskripsi' => 'Mouse nirkabel ergonomis dengan baterai tahan lama'
            ],
            [
                'id' => 3,
                'nama' => 'Keyboard Mekanikal',
                'kategori' => 'Aksesori',
                'harga' => 450000,
                'stok' => 10,
                'deskripsi' => 'Keyboard mekanikal RGB switch biru'
            ],
            [
                'id' => 4,
                'nama' => 'Monitor Gaming 24 Inch',
                'kategori' => 'Elektronik',
                'harga' => 2100000,
                'stok' => 1, // Stok kritis (< 3)
                'deskripsi' => 'Monitor IPS 144Hz response time 1ms'
            ]
        ];

        // Processing Layer: Kalkulasi total nilai aset gudang (Harga x Stok)
        $totalNilaiStok = array_reduce($products, function ($carry, $item) {
            return $carry + ($item['harga'] * $item['stok']);
        }, 0);

        // Presentation Layer: Kirim data ke View
        return view('products.index', compact('products', 'totalNilaiStok'));
    }
}