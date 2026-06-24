<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Major;

class DepartmentController extends Controller
{
    public function detail($slug)
    {
        $department = Department::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();


        $relatedMajors = collect();
        if ($department->type === 'khoa') {
            $relatedMajors = Major::where('is_active', true)
                ->where('department_id', $department->id)
                ->get();
        }

        $otherDepartments = Department::where('is_active', true)
            ->where('id', '!=', $department->id)
            ->where('type', $department->type)
            ->take(5)
            ->get();

        return view('pages.department_detail', compact('department', 'relatedMajors', 'otherDepartments'));
    }
}