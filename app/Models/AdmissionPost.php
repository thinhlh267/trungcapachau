<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\HtmlHelper; // Nhớ dùng Helper lọc HTML

class AdmissionPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'image', 'description', 
        'content', 'admission_category_id', 'is_published', 'view_count'
    ];

    // Quan hệ: Bài viết thuộc về 1 hệ đào tạo
    public function category()
    {
        return $this->belongsTo(AdmissionCategory::class, 'admission_category_id');
    }

    // Tự động clean HTML khi lưu (giống Major và Post)
    protected static function booted()
{
    static::saving(function ($post) {
        if (!empty($post->content)) {
            $post->content = \App\Helpers\HtmlHelper::clean($post->content);
        }
    });
}
}