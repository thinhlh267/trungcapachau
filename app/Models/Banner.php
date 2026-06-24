<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'is_active',
    ];
    protected static function booted(): void
    {
        static::saving(function ($banner) {
            if ($banner->is_active) {
                static::where('id', '!=', $banner->id)->update(['is_active' => false]);
            }
        });
    }
}