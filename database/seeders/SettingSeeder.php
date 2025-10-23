<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::truncate();

        // --- PENGATURAN UMUM ---
        Setting::create(['key' => 'seller_whatsapp', 'value' => '6289525456346']);

        // --- KONTEN LANDING PAGE (SLIDER BARU) ---
        Setting::create(['key' => 'landing_page_headline', 'value' => 'Freshly Baked with Love, Every Single Day.']);
        Setting::create(['key' => 'landing_page_tagline', 'value' => 'Dibuat dari bahan-bahan premium pilihan tanpa bahan pengawet.']);
        Setting::create(['key' => 'landing_page_description', 'value' => 'Kami percaya bahwa kue yang lezat berawal dari dapur yang penuh cinta dan bahan-bahan terbaik.']);

        Setting::create(['key' => 'lp_slider_img1', 'value' => null]); // SLOT GAMBAR 1 BARU
        Setting::create(['key' => 'lp_slider_img2', 'value' => null]); // SLOT GAMBAR 2 BARU
        Setting::create(['key' => 'lp_slider_img3', 'value' => null]); // SLOT GAMBAR 3 BARU

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
        Setting::create(['key' => 'about_image', 'value' => null]);

        // --- KONTEN HALAMAN "KONTAK" ---
        Setting::create(['key' => 'contact_title', 'value' => 'Hubungi Kami']);
        Setting::create(['key' => 'contact_tagline', 'value' => 'Punya pertanyaan atau ingin memesan? Jangan ragu untuk menghubungi kami.']);
        Setting::create(['key' => 'contact_address', 'value' => 'Jl. Kenangan Indah No. 12, Kota Madiun, Jawa Timur']);
        Setting::create(['key' => 'contact_email', 'value' => 'pesan@chatalog.com']);
        Setting::create(['key' => 'contact_phone', 'value' => '0812-3456-7890']);
    }
}
