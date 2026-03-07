<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major; 

class PageController extends Controller
{
    // 1. Trang Giới thiệu chung
    public function gioithieu() {
        return view('pages.gioithieu'); 
    }

    // 2. Trang Sứ mệnh & Tầm nhìn
    public function sumenh() {
        return view('pages.sumenh'); 
    }

    // 3. Trang Mục tiêu giáo dục
    public function muctieu() {
        return view('pages.muctieu'); 
    }

    // 4. Trang Chứng nhận
    public function chungnhan() {
        return view('pages.chungnhan'); 
    }

    // 5. Thư ngỏ (Mới thêm để khớp với Header)
    public function thungo() {
        return view('pages.thungo'); // Bạn nhớ tạo file view này sau
    }

    // 6. Sơ đồ tổ chức (Mới thêm để khớp với Header)
    public function sodotochuc() {
        return view('pages.sodotochuc'); // Bạn nhớ tạo file view này sau
    }

    // 7. Trang Liên hệ
    public function lienhe() {
        return view('pages.lienhe'); 
    }

    // 8. Trang Câu hỏi thường gặp
    public function faq()
    {
        return view('pages.faq');
    }

    // 9. Trang Đăng ký tư vấn
    public function register()
    {
        // SỬA LỖI: Đổi 'sort_order' thành 'name' để sắp xếp theo tên A-Z
        // Hoặc bỏ orderBy nếu muốn lấy mặc định theo ID
        $majors = Major::where('is_active', true)->orderBy('name', 'asc')->get();
        
        return view('pages.register', compact('majors'));
    }
    public function tracuuVanbang(\Illuminate\Http\Request $request)
    {
        // Xác định đang tra cứu theo tab nào (mặc định là 'don_vi')
        $searchType = $request->input('search_type', 'don_vi');
        
        // Nhận dữ liệu từ form
        $degreeCode = $request->input('degree_code'); // Cả 2 tab đều dùng chung trường này
        $issuingBody = $request->input('issuing_body'); // Dùng cho tab 1
        $studentName = $request->input('student_name'); // Dùng cho tab 2
        
        $results = collect();
        $searched = false;

        // XỬ LÝ LOGIC TÌM KIẾM
        if ($searchType === 'don_vi' && $degreeCode && $issuingBody) {
            $searched = true;
            $results = \App\Models\Degree::where('degree_code', $degreeCode)
                        ->where('issuing_body', 'like', '%' . $issuingBody . '%')
                        ->get();
        } elseif ($searchType === 'ho_ten' && $degreeCode && $studentName) {
            $searched = true;
            $results = \App\Models\Degree::where('degree_code', $degreeCode)
                        ->where('student_name', 'like', '%' . $studentName . '%')
                        ->get();
        }

        // Truyền SEO cơ bản
        $title = 'Tra cứu Văn bằng - Chứng chỉ | Trường Trung cấp Á Châu';

        return view('pages.tracuu_vanbang', compact(
            'results', 'searched', 'searchType', 
            'degreeCode', 'issuingBody', 'studentName', 'title'
        ));
    }
}