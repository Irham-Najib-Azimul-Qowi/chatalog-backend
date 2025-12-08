<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        // 'stock',
        'image',
    ];

    public function getImageAttribute($value)
    {
        if ($value) {
            // Jika path dimulai dengan 'http', kembalikan langsung (jika ada kasus ini)
            if (str_starts_with($value, 'http')) {
                return $value;
            }
            
            // Jika path adalah dummy image (seeder lama)
            if (str_starts_with($value, 'dummy_images')) {
                return asset($value);
            }

            // Jika path adalah upload storage (default behavior store())
            return asset('storage/' . $value);
        }
        return null;
    }
}
