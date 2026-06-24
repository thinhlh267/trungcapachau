<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'email', 'major_id', 'message', 'status'];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}