<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'is_active', 'sort_order'];

    // Quan hệ: Một hệ đào tạo có nhiều bài thông báo
    public function posts()
    {
        return $this->hasMany(AdmissionPost::class);
    }
}