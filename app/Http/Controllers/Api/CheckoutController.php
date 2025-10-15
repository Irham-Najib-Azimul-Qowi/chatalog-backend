<?php

// app/Http/Controllers/Api/CheckoutController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Setting;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // 1. Validasi data yang masuk
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string|max:255',
            'customer_address' => 'required|string',
            'items' => 'required|array',
            'items.*.id' => 'required|integer|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 2. Ambil nomor WhatsApp penjual dari database
        try {
            $sellerNumber = Setting::where('key', 'seller_whatsapp')->firstOrFail()->value;
        } catch (\Exception $e) {
            return response()->json(['message' => 'Nomor WhatsApp penjual belum diatur.'], 500);
        }

        $orderedItems = $request->items;
        $grandTotal = 0;
        $message = "Nama: " . $request->customer_name . "\n";
        $message .= "Alamat Pengiriman: " . $request->customer_address . "\n\n";
        $message .= "Halo, saya mau pesan:\n\n"; // Baru tambahkan salam
        $message .= "Pesanan:\n";

        // 3. Loop melalui setiap item pesanan untuk memformat pesan
        foreach ($orderedItems as $item) {
            $product = Product::find($item['id']);
            $subtotal = $product->price * $item['quantity'];
            $grandTotal += $subtotal;

            $message .= "- " . $product->name
                     . " (x" . $item['quantity'] . "): Rp"
                     . number_format($subtotal, 0, ',', '.')
                     . "\n";
        }

        // 4. Tambahkan total pesanan ke pesan
        $message .= "\nTotal: Rp" . number_format($grandTotal, 0, ',', '.');
        $message .= "\n\nTerima kasih.";

        // 5. Buat URL WhatsApp
        // urlencode() penting agar spasi dan karakter khusus diubah menjadi format URL
        $whatsappUrl = "https://wa.me/" . $sellerNumber . "?text=" . urlencode($message);

        // 6. Kembalikan URL dalam response JSON
        return response()->json([
            'whatsapp_url' => $whatsappUrl
        ]);
    }
}
