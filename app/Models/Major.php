<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\HtmlHelper;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use App\Observers\MajorObserver;

#[ObservedBy([MajorObserver::class])]
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
        'department_id',
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

    protected static function booted()
    {
        // Clean HTML trước khi lưu
        static::saving(function ($major) {
            $major->cleanHtmlFields();
        });
    }

    public function cleanHtmlFields()
    {
        $htmlFields = [
            'description', 'overview', 'career_titles', 
            'career_places', 'benefits', 'content'
        ];

        foreach ($htmlFields as $field) {
            if (!empty($this->$field)) {
                $this->$field = HtmlHelper::clean($this->$field);
            }
        }

        $this->cleanJsonFields();
    }

    protected function cleanJsonFields()
    {
        // Clean why_us_reasons
        if (!empty($this->why_us_reasons) && is_array($this->why_us_reasons)) {
            $cleanedReasons = [];
            foreach ($this->why_us_reasons as $reason) {
                $cleanedReasons[] = [
                    'icon' => htmlspecialchars($reason['icon'] ?? '', ENT_QUOTES, 'UTF-8'),
                    'title' => htmlspecialchars($reason['title'] ?? '', ENT_QUOTES, 'UTF-8'),
                    'description' => htmlspecialchars($reason['description'] ?? '', ENT_QUOTES, 'UTF-8')
                ];
            }
            $this->why_us_reasons = $cleanedReasons;
        }

        if (!empty($this->program_advantages) && is_array($this->program_advantages)) {
            $cleanedAdvantages = [];
            foreach ($this->program_advantages as $advantage) {
                $cleanedAdvantages[] = [
                    'icon' => htmlspecialchars($advantage['icon'] ?? '', ENT_QUOTES, 'UTF-8'),
                    'title' => htmlspecialchars($advantage['title'] ?? '', ENT_QUOTES, 'UTF-8'),
                    'description' => htmlspecialchars($advantage['description'] ?? '', ENT_QUOTES, 'UTF-8')
                ];
            }
            $this->program_advantages = $cleanedAdvantages;
        }

        if (!empty($this->roadmap) && is_array($this->roadmap)) {
            $cleanedRoadmap = [];
            foreach ($this->roadmap as $step) {
                $cleanedRoadmap[] = [
                    'title' => htmlspecialchars($step['title'] ?? '', ENT_QUOTES, 'UTF-8'),
                    'image' => $step['image'] ?? null,
                    'description' => htmlspecialchars($step['description'] ?? '', ENT_QUOTES, 'UTF-8')
                ];
            }
            $this->roadmap = $cleanedRoadmap;
        }
    }

    protected function getWhyUsReasonsAttribute($value)
    {
        if (is_null($value)) {
            return [];
        }
        
        if (is_array($value)) {
            return $value;
        }
        
        $decoded = json_decode($value, true);
        return is_array($decoded) ? $decoded : [];
    }

    protected function getProgramAdvantagesAttribute($value)
    {
        if (is_null($value)) {
            return [];
        }
        
        if (is_array($value)) {
            return $value;
        }
        
        $decoded = json_decode($value, true);
        return is_array($decoded) ? $decoded : [];
    }

    protected function getRoadmapAttribute($value)
    {
        if (is_null($value)) {
            return [];
        }
        
        if (is_array($value)) {
            return $value;
        }
        
        $decoded = json_decode($value, true);
        return is_array($decoded) ? $decoded : [];
    }

    protected function getGalleryAttribute($value)
    {
        if (is_null($value)) {
            return [];
        }
        
        if (is_array($value)) {
            return $value;
        }
        
        $decoded = json_decode($value, true);
        return is_array($decoded) ? $decoded : [];
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = !empty($value) ? HtmlHelper::clean($value) : $value;
    }

    public function setOverviewAttribute($value)
    {
        $this->attributes['overview'] = !empty($value) ? HtmlHelper::clean($value) : $value;
    }

    public function setCareerTitlesAttribute($value)
    {
        $this->attributes['career_titles'] = !empty($value) ? HtmlHelper::clean($value) : $value;
    }

    public function setCareerPlacesAttribute($value)
    {
        $this->attributes['career_places'] = !empty($value) ? HtmlHelper::clean($value) : $value;
    }

    public function setBenefitsAttribute($value)
    {
        $this->attributes['benefits'] = !empty($value) ? HtmlHelper::clean($value) : $value;
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = !empty($value) ? HtmlHelper::clean($value) : $value;
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
    public function departmentRel()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
