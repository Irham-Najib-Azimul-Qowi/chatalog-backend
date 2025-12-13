<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->mapWithKeys(function ($item) {
            return [$item->key => $item->value];
        });

        return response()->json($settings);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'settings' => 'required|array',
            'settings.*' => 'nullable|string',
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
     * Mengunggah gambar (untuk slider atau halaman lain).
     * Menerima 'image_key' untuk menentukan setting mana yang akan di-update (e.g., lp_slider_img1)
     */
    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_key' => 'required|string|in:lp_slider_img1,lp_slider_img2,lp_slider_img3,about_image', // Validasi key
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $imageKey = $request->image_key;

        // Cari setting gambar yang lama
        $setting = Setting::where('key', $imageKey)->first();

        // Hapus gambar lama dari storage jika ada
        if ($setting && $setting->getRawOriginal('value')) {
            Storage::disk('public')->delete($setting->getRawOriginal('value'));
        }

        // Simpan gambar baru ke folder 'landing-page'
        $path = $request->file('image')->store('landing-page', 'public');

        // Buat atau update record di database dengan path gambar yang baru
        Setting::updateOrCreate(
            ['key' => $imageKey],
            ['value' => $path]
        );

        return response()->json([
            'message' => 'Gambar berhasil diunggah.',
            'path' => $path,
            'image_key' => $imageKey,
        ]);
    }
}
