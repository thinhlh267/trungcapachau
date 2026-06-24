<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
    'title',
    'category', 
    'slug',
    'image',
    'content',
    'is_published',
    'department', 
    'gallery',
    'image_caption'
];
protected $casts = [
    'gallery' => 'array',
    'content' => 'array', 
    'is_published' => 'boolean',
];
}