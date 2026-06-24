<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;

class MajorController extends Controller
{

    public function detail($slug)
    {
        $major = Major::where('slug', $slug)
                    ->where('is_active', true)
                    ->firstOrFail();

        $otherMajors = Major::where('is_active', true)
                            ->where('id', '!=', $major->id)
                            ->get();
        
        $headerMajors = Major::where('is_active', true)->get();

        return view('major_detail', compact('major', 'otherMajors', 'headerMajors'));
    }
}