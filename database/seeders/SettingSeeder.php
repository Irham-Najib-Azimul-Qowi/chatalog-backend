<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::truncate();

        // --- PENGATURAN UMUM ---
        Setting::create(['key' => 'seller_whatsapp', 'value' => '6289525456346']);

        // --- KONTEN LANDING PAGE (SLIDER BARU) ---
        Setting::create(['key' => 'landing_page_headline', 'value' => 'Freshly Baked with Love, Every Single Day.']);
        Setting::create(['key' => 'landing_page_tagline', 'value' => 'Dibuat dari bahan-bahan premium pilihan tanpa bahan pengawet.']);
        Setting::create(['key' => 'landing_page_description', 'value' => 'Kami percaya bahwa kue yang lezat berawal dari dapur yang penuh cinta dan bahan-bahan terbaik.']);

        Setting::create(['key' => 'lp_slider_img1', 'value' => 'landing-page/slide1.jpg']);
        Setting::create(['key' => 'lp_slider_img2', 'value' => 'landing-page/slide2.jpg']);
        Setting::create(['key' => 'lp_slider_img3', 'value' => 'landing-page/slide3.jpg']); 

        // --- KONTEN LANDING PAGE (WHY CHOOSE US SECTION) ---
        Setting::create(['key' => 'lp_section_title', 'value' => 'Kenapa Memilih Kami?']);
        Setting::create(['key' => 'lp_item1_title', 'value' => 'Bahan Terbaik']);
        Setting::create(['key' => 'lp_item1_text', 'value' => 'Kami hanya menggunakan bahan baku premium dan segar tanpa bahan pengawet.']);
        Setting::create(['key' => 'lp_item2_title', 'value' => 'Dibuat Penuh Cinta']);
        Setting::create(['key' => 'lp_item2_text', 'value' => 'Setiap produk dibuat dengan tangan oleh para ahli kami untuk menjamin kualitas.']);
        Setting::create(['key' => 'lp_item3_title', 'value' => 'Jaminan Kualitas']);
        Setting::create(['key' => 'lp_item3_text', 'value' => 'Kebersihan dan kualitas adalah prioritas utama kami di setiap proses produksi.']);

        // --- KONTEN LANDING PAGE (CALL TO ACTION SECTION) ---
        Setting::create(['key' => 'lp_cta_title', 'value' => 'Lihat Apa yang Kami Tawarkan']);
        Setting::create(['key' => 'lp_cta_text', 'value' => 'Jelajahi katalog lengkap kami dan temukan favoritmu. Pesan sekarang untuk merasakan kelezatan yang sesungguhnya.']);

        // --- KONTEN HALAMAN "TENTANG KAMI" ---
        Setting::create(['key' => 'about_title', 'value' => 'Cerita Kami']);
        Setting::create(['key' => 'about_content', 'value' => 'Chatalog dimulai dari sebuah dapur rumahan sederhana dengan kecintaan mendalam pada kue berkualitas. Kami percaya bahwa momen terbaik diciptakan bersama sepotong kue yang lezat. Oleh karena itu, kami berkomitmen untuk selalu menggunakan bahan-bahan segar dan resep otentik yang diwariskan dari generasi ke generasi.']);
        Setting::create(['key' => 'about_image', 'value' => 'dummy_images/about/about_proses_mustofa.jpg']);

        // Story Section 1
        Setting::create(['key' => 'about_story1_title', 'value' => 'Awal Mula Zoeliez Ilux']);
        Setting::create(['key' => 'about_story1_text', 'value' => 'Di awal perjalanannya, Zoeliez Ilux dikenal sebagai surganya kue basah tradisional maupun modern. Dengan tangan terampil, kami menyajikan berbagai macam jajanan pasar yang selalu dirindukan, seperti Risol Sayur Sosis Mantenan yang gurih, Dadar Gulung pandan yang harum, Brownies cokelat yang lumer, hingga Kue Tart untuk momen spesial, Roti Pisang yang lembut, dan Lumpur Lapindo yang manis legit. Setiap gigitan adalah perpaduan rasa autentik dan kualitas terbaik, menjadikan Zoeliez Ilux pilihan favorit di berbagai acara dan perayaan.']);
        Setting::create(['key' => 'about_story1_image', 'value' => 'dummy_images/about/about_jajanan_pasar.jpg']);
        Setting::create(['key' => 'about_story1_layout', 'value' => 'image-left']);

        // Story Section 2
        Setting::create(['key' => 'about_story2_title', 'value' => 'Perubahan Fokus ke Kering Kentang Mustofa']);
        Setting::create(['key' => 'about_story2_text', 'value' => 'Tiga tahun berjalan, di tahun 2019, kami mengambil sebuah keputusan besar yang mengubah arah perjalanan Zoeliez Ilux. Dengan melihat potensi dan tingginya permintaan pasar, kami memutuskan untuk memfokuskan seluruh energi dan kreativitas kami pada satu produk bintang: Kering Kentang Mustofa.']);
        Setting::create(['key' => 'about_story2_image', 'value' => 'dummy_images/about/about_proses_mustofa.jpg']);
        Setting::create(['key' => 'about_story2_layout', 'value' => 'image-right']);

        // Story Section 3
        Setting::create(['key' => 'about_story3_title', 'value' => 'Kesuksesan Kering Kentang Mustofa']);
        Setting::create(['key' => 'about_story3_text', 'value' => 'Keputusan ini terbukti tepat. Dedikasi kami untuk menyempurnakan Kering Kentang Mustofa dengan resep rahasia yang pedas, manis, dan renyah tak tertandingi, berhasil merebut hati banyak pelanggan. Tak lama setelah fokus ini, pesanan melonjak drastis. Kering Kentang Mustofa Zoeliez Ilux menjadi buah bibir dan hidangan wajib di setiap rumah. Dari camilan sehari-hari hingga pelengkap lauk yang menggugah selera, produk kami kini dikenal luas dan dicintai oleh berbagai kalangan.']);
        Setting::create(['key' => 'about_story3_image', 'value' => 'dummy_images/about/about_kentang_mustofa_sukses.jpg']);
        Setting::create(['key' => 'about_story3_layout', 'value' => 'image-left']);

        // --- KONTEN HALAMAN "KONTAK" ---
        Setting::create(['key' => 'contact_title', 'value' => 'Hubungi Kami']);
        Setting::create(['key' => 'contact_tagline', 'value' => 'Punya pertanyaan atau ingin memesan? Jangan ragu untuk menghubungi kami.']);
        Setting::create(['key' => 'contact_address', 'value' => '6G37+MMH, Unnamed Road, Brahu, Mlilir, Kec. Dolopo, Kabupaten Madiun, Jawa Timur 63174']);
        Setting::create(['key' => 'contact_email', 'value' => 'zoeliezilux@gmail.com']);
        Setting::create(['key' => 'contact_phone', 'value' => '0895-2545-6346']);
    }
}
