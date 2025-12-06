<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
    ];

    public function getValueAttribute($value)
    {
        $imageKeys = ['lp_slider_img1', 'lp_slider_img2', 'lp_slider_img3', 'about_image'];

        if (in_array($this->key, $imageKeys) && $value) {
            if (str_starts_with($value, 'http')) {
                return $value;
            }
            return asset('storage/' . $value);
        }
        return $value;
    }
}
