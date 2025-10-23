<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product; // Pastikan ini mengarah ke model Product Anda

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan tidak ada duplikasi data
        Product::truncate(); // Menghapus semua produk yang ada sebelum seeding

        // Path relatif ke folder public Laravel.
        // Gambar-gambar ini AKAN di-track oleh Git karena berada di public/,
        // BUKAN di storage/app/public/
        $dummyImagePath = '/dummy_images/products/';

        Product::create([
            'name' => 'Kering Kentang Original Ilux',
            'description' => 'Kering kentang renyah dengan rasa original gurih, cocok untuk cemilan atau lauk.',
            'price' => 20000,
            'image' => $dummyImagePath . 'kentang_original.jpg', // Path relatif ke public/dummy_images/products
        ]);

        Product::create([
            'name' => 'Kering Kentang Pedas Ilux',
            'description' => 'Sensasi pedas yang bikin ketagihan, kering kentang dengan bumbu cabe pilihan.',
            'price' => 22000,
            'image' => $dummyImagePath . 'kentang_pedas.jpg', // Path relatif
        ]);

        Product::create([
            'name' => 'Kering Kentang Keju Ilux',
            'description' => 'Perpaduan gurih kentang dan keju yang creamy, disukai semua kalangan.',
            'price' => 25000,
            'image' => $dummyImagePath . 'kentang_keju.jpg', // Path relatif
        ]);

        // Tambahkan produk dummy lainnya sesuai kebutuhan
    }
}
