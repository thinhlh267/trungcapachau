<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'student_name', 'date_of_birth', 'address', 
        'cohort', 'major', 'degree_code', 'issuing_body', 
        'issue_date', 'classification'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'issue_date' => 'date',
    ];
}