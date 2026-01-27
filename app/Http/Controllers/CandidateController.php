<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate; 
use Illuminate\Support\Facades\Validator;

class CandidateController extends Controller
{
    public function store(Request $request)
    {
        // 1. Xác định đây là form nào? (Dựa vào việc có major_id hay không)
        $isAdmissionForm = $request->has('major_id');

        // 2. Định nghĩa luật validation cơ bản
        $rules = [
            'name'  => 'required|string|max:255',
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:9', 'max:12'],
            'email' => 'nullable|email|max:255',
        ];

        // 3. Nếu là form Tuyển sinh -> Bắt buộc chọn ngành
        if ($isAdmissionForm) {
            $rules['major_id'] = 'required|exists:majors,id';
        }

        // 4. Validate
        $validator = Validator::make($request->all(), $rules, [
            'name.required'     => 'Vui lòng nhập họ và tên.',
            'phone.required'    => 'Vui lòng nhập số điện thoại.',
            'phone.regex'       => 'Số điện thoại không hợp lệ.',
            'phone.min'         => 'Số điện thoại quá ngắn.',
            'email.email'       => 'Email không đúng định dạng.',
            'major_id.required' => 'Vui lòng chọn ngành học quan tâm.',
            'major_id.exists'   => 'Ngành học không tồn tại.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput()
                             // Nếu form có ID (ví dụ form-dang-ky), cuộn xuống đó. Nếu không thì thôi.
                             ->withFragment($request->has('major_id') ? 'form-dang-ky' : 'contact-form');
        }

        // 5. Chuẩn bị dữ liệu để lưu
        $data = [
            'name'     => $request->name,
            'phone'    => $request->phone,
            'email'    => $request->email,
            'major_id' => $request->major_id ?? null, // Có thể null nếu là Liên hệ
            'status'   => 'new',
            // Gộp nội dung từ note (Tuyển sinh) hoặc message (Liên hệ)
            'note'     => $request->note ?? $request->message ?? 'Đăng ký từ trang Liên hệ',
        ];

        // 6. Lưu vào DB
        Candidate::create($data);

        // 7. Trả về thông báo thành công
        return redirect()->back()
                         ->withFragment($request->has('major_id') ? 'form-dang-ky' : 'contact-form')
                         ->with('success', 'Gửi thông tin thành công! Nhà trường sẽ liên hệ sớm nhất.');
    }
}