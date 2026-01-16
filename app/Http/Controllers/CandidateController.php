<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate; 
use App\Models\Major;
class CandidateController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            // Kiểm tra major_id phải tồn tại trong bảng majors
            'major_id' => 'required|exists:majors,id', 
        ]);

        // 2. Lưu vào Database
        // Vì Model của bạn dùng major_id, ta phải lưu đúng major_id
        Candidate::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email ?? null,
            'message' => $request->message ?? null,
            
            // QUAN TRỌNG NHẤT: Lưu ID chứ không lưu Tên
            'major_id' => $request->major_id, 
            
            'status' => 'new'
        ]);

        // 3. Quay lại và báo thành công
        return redirect()->back()->with('success', 'Đăng ký thành công! Nhà trường sẽ liên hệ sớm nhất.');
    }
}