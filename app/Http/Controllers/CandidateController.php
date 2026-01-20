<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate; 
use App\Models\Major;

class CandidateController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate: Ép kiểu dữ liệu chuẩn
        $validated = $request->validate([
            'major_id' => 'required|exists:majors,id', // Phải có ID ngành và ID đó phải tồn tại trong bảng majors
            'name'     => 'required|string|max:255',
            
            // Validate SĐT: Bắt buộc, dùng Regex chỉ nhận số và ký tự đặc biệt của sđt, độ dài 9-12
            'phone'    => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:9', 'max:12'],
            
            // Validate Email: Cho phép để trống (nullable), nhưng nếu nhập thì phải đúng chuẩn email
            'email'    => 'nullable|email|max:255',
            
            'message'  => 'nullable|string|max:1000', // Tin nhắn tùy chọn
        ], [
            // Tùy chỉnh thông báo lỗi tiếng Việt cho thân thiện
            'name.required'    => 'Vui lòng nhập họ và tên của bạn.',
            'phone.required'   => 'Vui lòng nhập số điện thoại liên hệ.',
            'phone.regex'      => 'Số điện thoại không hợp lệ (chỉ chấp nhận số).',
            'phone.min'        => 'Số điện thoại phải có ít nhất 9 số.',
            'phone.max'        => 'Số điện thoại không được quá 12 số.',
            'email.email'      => 'Địa chỉ email không đúng định dạng (ví dụ: abc@gmail.com).',
            'major_id.exists'  => 'Ngành học không tồn tại trên hệ thống.',
        ]);

        // 2. Lưu vào Database
        // Sử dụng $validated để đảm bảo chỉ lưu những dữ liệu đã kiểm tra sạch sẽ
        Candidate::create([
            'name'     => $validated['name'],
            'phone'    => $validated['phone'],
            'email'    => $validated['email'] ?? null,   // Nếu không nhập thì lưu là null
            'message'  => $request->message ?? null,
            'major_id' => $validated['major_id'],        // Lưu ID ngành
            'status'   => 'new'                          // Trạng thái mặc định là "Mới"
        ]);

        return redirect()->back()
                     ->withFragment('dang-ky') 
                     ->with('success', 'Đăng ký thành công! Nhà trường sẽ liên hệ bạn sớm nhất.');
    }
}