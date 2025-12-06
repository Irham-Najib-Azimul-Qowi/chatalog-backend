<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate(); // Membersihkan tabel produk yang ada

        $faker = Faker::create('id_ID');

        // Daftar 10 nama produk makanan kering yang realistis
        $productNames = [
            'Keripik Singkong Balado Asli',
            'Abon Sapi Premium Rasa Manis',
            'Dendeng Balado Kering Padang',
            'Basreng Pedas Daun Jeruk',
            'Kacang Mede Oven Rasa Bawang',
            'Kering Tempe Teri Pedas Manis',
            'Cumi Asin Krispi Bumbu Merah',
            'Teri Kacang Balado Renyah',
            'Makaroni Spiral Krispi Original',
            'Stik Keju Edam Asin Gurih',
            'Kerupuk Kulit Ikan Patin',
            'Emping Melinjo Pedas Manis',
            'Kripik Usus Ayam Krispi',
            'Sale Pisang Basah Manis',
            'Dodol Garut Asli',
        ];

        // Daftar 15 nama file gambar yang sesuai dengan nama produk di atas
        // PASTIKAN INI SAMA PERSIS DENGAN NAMA FILE DI public/dummy_images/products/
        $imageFileNames = [
            'keripik_singkong.jpg', // Contoh: harus ada di public/dummy_images/products/keripik_singkong.jpg
            'abon_sapi.jpg',
            'dendeng_balado.jpg',
            'basreng_pedas.jpg',
            'kacang_mede.jpg',
            'kering_tempe.jpg',
            'cumi_kering.jpg',
            'teri_balado.jpg',
            'makaroni_pedas.jpg',
            'stik_keju.jpg',
            'dendeng_balado.jpg', // Kerupuk Kulit
            'keripik_singkong.jpg', // Emping
            'cumi_kering.jpg', // Usus
            'kacang_mede.jpg', // Sale Pisang
            'abon_sapi.jpg', // Dodol
        ];


        // Kata kunci dan frasa untuk deskripsi yang bervariasi
        $deskripsiTemplates = [
            "Rasakan sensasi %s yang tak terlupakan! Dibuat dari %s berkualitas tinggi, diolah dengan resep %s yang %s.",
            "Cemilan %s sempurna untuk menemani waktu santai Anda. Setiap gigitan menawarkan rasa %s yang %s.",
            "Lauk %s praktis dan %s. Terbuat dari %s pilihan, dimasak hingga %s dengan bumbu %s.",
            "Produk %s kami adalah pilihan terbaik untuk Anda yang mencari %s. Rasa %s yang %s dijamin bikin nagih.",
            "Nikmati kelezatan %s yang %s, cocok untuk segala suasana. Dibuat tanpa %s dan dikemas %s.",
        ];

        $adjectives = ['lezat', 'gurih', 'renyah', 'pedas', 'manis', 'aromatik', 'tradisional', 'modern', 'higienis', 'praktis'];
        $ingredients = ['bahan alami', 'pilihan terbaik', 'resep keluarga', 'rempah asli Indonesia', 'daging segar'];
        $prepMethods = ['kering sempurna', 'krispi', 'gurih renyah', 'pedas nampol', 'manis legit'];

        // Loop untuk membuat 15 produk
        for ($i = 0; $i < 15; $i++) {
            $name = $productNames[$i]; // Ambil nama dari daftar
            $imageFileName = $imageFileNames[$i]; // Ambil nama file gambar yang sesuai

            // Buat deskripsi yang lebih realistis dan bervariasi
            $template = $faker->randomElement($deskripsiTemplates);
            $description = sprintf(
                $template,
                $name,
                $faker->randomElement($ingredients),
                $faker->randomElement(['asli', 'warisan', 'inovatif']),
                $faker->randomElement($adjectives),
                $faker->randomElement($adjectives),
                $faker->randomElement($adjectives),
                $faker->randomElement($ingredients),
                $faker->randomElement($prepMethods),
                $faker->randomElement($adjectives),
                $faker->randomElement($adjectives),
                $faker->randomElement($adjectives),
                $faker->randomElement(['pengawet buatan', 'MSG berlebihan']),
                $faker->randomElement(['rapi', 'higienis']),
            );
            // Bersihkan jika ada double spasi
            $description = preg_replace('/\s\s+/', ' ', $description);

            Product::create([
                'name' => $name,
                'description' => $description,
                'price' => $faker->numberBetween(15000, 75000),
                // PATH RELATIF dari folder PUBLIC Laravel
                'image' => 'dummy_images/products/' . $imageFileName,
            ]);
        }
    }
}
