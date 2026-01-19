<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'slug', 
        'image', 
        'description', 
        'content', 
        'duration', 
        'tuition', 
        'is_active',
        'gallery',
        'intro_image', 
        'department',
        'overview',    
        'why_us_image',
        'why_us_reasons',
        'career_titles',
        'career_titles_image', 
        'career_places', 
        'career_places_image', 
        'roadmap', 
        'benefits',
        'program_advantages',
    ];

    protected $casts = [
        'gallery' => 'array', 
        'is_active' => 'boolean',
        'roadmap' => 'array',
        'program_advantages' => 'array',
        'why_us_reasons' => 'array',
    ];
    
    // Tùy chọn: Thêm accessor để đảm bảo luôn trả về array
    protected function getWhyUsReasonsAttribute($value)
    {
        if (is_null($value)) {
            return [];
        }
        
        if (is_array($value)) {
            return $value;
        }
        
        return json_decode($value, true) ?? [];
    }
}