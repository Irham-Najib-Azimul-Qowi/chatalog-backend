<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Menampilkan semua pengaturan.
     */
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        return response()->json($settings);
    }

    /**
     * Memperbarui pengaturan berbasis teks.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'settings' => 'required|array'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        foreach ($request->settings as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }

        return response()->json([
            'message' => 'Settings updated successfully'
        ]);
    }

    /**
     * Mengunggah gambar untuk landing page.
     */
    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Cari setting gambar yang lama
        $setting = Setting::where('key', 'landing_page_image')->first();

        // Hapus gambar lama dari storage jika ada
        if ($setting && $setting->value) {
            Storage::disk('public')->delete($setting->value);
        }

        // Simpan gambar baru ke folder 'landing-page'
        $path = $request->file('image')->store('landing-page', 'public');

        // Buat atau update record di database dengan path gambar yang baru
        Setting::updateOrCreate(
            ['key' => 'landing_page_image'],
            ['value' => $path]
        );

        return response()->json([
            'message' => 'Gambar berhasil diunggah.',
            'path' => $path,
        ]);
    }
}
