<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    // Cho phép nhập dữ liệu vào 2 cột này
    protected $fillable = [
        'image',
        'is_active',
    ];
    protected static function booted(): void
    {
        static::saving(function ($banner) {
            // Logic: Nếu banner này đang được Bật (is_active = true)
            if ($banner->is_active) {
                // Tìm tất cả các banner khác (khác ID hiện tại) và tắt chúng đi
                static::where('id', '!=', $banner->id)->update(['is_active' => false]);
            }
        });
    }
}