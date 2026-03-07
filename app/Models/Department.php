<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'image',          
        'description',     
        'content',         
        'contact_info',   
        'is_active',
        'sort_order',      
        'seo_title',       
        'seo_description', 
    ];

    protected $casts = [
        'contact_info' => 'array',
        'is_active' => 'boolean',
    ];
}