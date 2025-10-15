<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Menampilkan data admin yang sedang login.
     */
    public function show(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Memperbarui data admin yang sedang login.
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:users,phone,' . $user->id,
            'password' => ['nullable', 'confirmed', Password::min(8)],
        ]);

        // Update nama dan telepon
        $user->fill($request->only(['name', 'phone']));

        // Jika ada password baru, update password
        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return response()->json([
            'message' => 'Profil berhasil diperbarui.',
            'user' => $user,
        ]);
    }
}
