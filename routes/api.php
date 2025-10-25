<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController; // <-- Tambahkan di atas


// == Rute Publik (Untuk Pembeli / Frontend) ==

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/settings', [SettingController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'process']);
Route::get('/homepage-slides', function () {
    return response()->json(config('slides.homepage_slides'));
});

// Rute untuk login admin
Route::post('/login', [AuthController::class, 'login']);

// == Rute Terproteksi (Khusus Admin) ==
// Grup ini memerlukan autentikasi (akan kita buat di langkah selanjutnya)
Route::middleware('auth:sanctum')->group(function () {
    // Rute untuk logout admin
    Route::post('/logout', [AuthController::class, 'logout']);

    // Grup rute yang hanya bisa diakses oleh ADMIN
    Route::middleware('isAdmin')->prefix('admin')->group(function () {
        // Rute CRUD Produk oleh Admin
        // URL menjadi /api/admin/products
        Route::post('/products', [ProductController::class, 'store']);
        Route::put('/products/{id}', [ProductController::class, 'update']);
        Route::delete('/products/{id}', [ProductController::class, 'destroy']);
        Route::post('/settings/upload-image', [SettingController::class, 'uploadImage']);
        Route::get('/user', [ProfileController::class, 'show']); // Mengambil data user
        Route::put('/user/profile', [ProfileController::class, 'update']); // Memperbarui data user

    });

    // Rute untuk mengubah Settings (juga hanya untuk admin)
    Route::put('/settings', [SettingController::class, 'update'])->middleware('isAdmin');
});
