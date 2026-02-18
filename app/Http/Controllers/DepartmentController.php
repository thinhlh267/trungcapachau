<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Major;

class DepartmentController extends Controller
{
    public function detail($slug)
    {
        // 1. Tìm đơn vị theo slug
        $department = Department::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // 2. Lấy danh sách Ngành thuộc Khoa này (nếu có)
        // Lưu ý: Đang so sánh theo tên (Vd: Major có department="Khoa CNTT" khớp với Department name="Khoa CNTT")
        // Dùng 'LIKE' để tìm kiếm linh hoạt hơn một chút
        $relatedMajors = collect();
        if ($department->type === 'khoa') {
            $relatedMajors = Major::where('is_active', true)
                ->where('department', 'LIKE', '%' . $department->name . '%')
                ->get();
        }

        // 3. Lấy danh sách các đơn vị khác để làm Sidebar (trừ đơn vị hiện tại)
        $otherDepartments = Department::where('is_active', true)
            ->where('id', '!=', $department->id)
            ->where('type', $department->type) // Lấy cùng loại (Khoa thì gợi ý Khoa, Phòng thì gợi ý Phòng)
            ->take(5)
            ->get();

        return view('pages.department_detail', compact('department', 'relatedMajors', 'otherDepartments'));
    }
}