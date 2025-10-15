<?php

// app/Http/Controllers/Api/AuthController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba autentikasi user
        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Nomor WhatsApp atau password salah'], 401);
        }

        $user = User::where('phone', $credentials['phone'])->first();

        // Pastikan hanya admin yang bisa login
        if ($user->role !== 'admin') {
            return response()->json(['message' => 'Anda tidak memiliki akses admin'], 403);
        }

        // Buat token untuk user
        $token = $user->createToken('admin-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        // Hapus token yang sedang digunakan
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout berhasil']);
    }
}
