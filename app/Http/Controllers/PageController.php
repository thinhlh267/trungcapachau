<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major; 

class PageController extends Controller
{
    // 1. Trang Giới thiệu chung
    public function gioithieu() {
        $headerMajors = Major::where('is_active', true)->get(); 
        return view('pages.gioithieu', compact('headerMajors')); 
    }

    // 2. Trang Sứ mệnh & Tầm nhìn
    public function sumenh() {
        $headerMajors = Major::where('is_active', true)->get(); 
        return view('pages.sumenh', compact('headerMajors')); 
    }

    // 3. Trang Mục tiêu giáo dục
    public function muctieu() {
        $headerMajors = Major::where('is_active', true)->get(); 
        return view('pages.muctieu', compact('headerMajors')); 
    }

    // 4. Trang Chứng nhận
    public function chungnhan() {
        $headerMajors = Major::where('is_active', true)->get(); 
        return view('pages.chungnhan', compact('headerMajors')); 
    }

    // 5. Trang Liên hệ
    public function lienhe() {
        $headerMajors = Major::where('is_active', true)->get(); 
        return view('pages.lienhe', compact('headerMajors')); 
    }
}