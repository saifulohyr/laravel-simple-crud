<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        $samples = [
            ['name' => 'Kopi Arabika 250g', 'price' => 65000, 'stock' => 24, 'description' => 'Biji kopi sangrai medium roast.'],
            ['name' => 'Teh Hijau Melati', 'price' => 28000, 'stock' => 40, 'description' => 'Kemasan kotak 50 gram.'],
            ['name' => 'Gula Aren Cair 500ml', 'price' => 35000, 'stock' => 15, 'description' => 'Organik tanpa pengawet.'],
            ['name' => 'Susu Oat 1L', 'price' => 42000, 'stock' => 18, 'description' => 'Varian barista blend.'],
            ['name' => 'Cokelat Bubuk 200g', 'price' => 54000, 'stock' => 10, 'description' => 'Pure cocoa unsweetened.'],
        ];

        foreach ($samples as $item) {
            Product::firstOrCreate(['name' => $item['name']], $item);
        }
    }
}
