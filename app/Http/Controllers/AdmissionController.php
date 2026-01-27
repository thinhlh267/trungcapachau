<?php

namespace App\Http\Controllers;

use App\Models\AdmissionCategory;
use App\Models\AdmissionPost;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    // 1. Trang chủ Tuyển sinh (Hiện tất cả thông báo)
    public function index(Request $request)
    {
        // Lấy tất cả danh mục đang active để làm Tab lọc
        $categories = AdmissionCategory::where('is_active', true)
                        ->orderBy('sort_order')
                        ->get();

        // Lấy bài viết (Có thể lọc theo category_id nếu user bấm vào tab)
        $query = AdmissionPost::where('is_published', true)->with('category');

        if ($request->has('category')) {
            $categorySlug = $request->get('category');
            $query->whereHas('category', function($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $posts = $query->orderBy('created_at', 'desc')->paginate(9);

        return view('pages.admission.index', compact('categories', 'posts'));
    }

    // 2. Chi tiết bài thông báo tuyển sinh
    public function detail($slug)
    {
        $post = AdmissionPost::where('slug', $slug)
                    ->where('is_published', true)
                    ->firstOrFail();
        
        // Tăng view
        $post->increment('view_count');

        // Bài viết liên quan cùng danh mục
        $relatedPosts = AdmissionPost::where('admission_category_id', $post->admission_category_id)
                            ->where('id', '!=', $post->id)
                            ->where('is_published', true)
                            ->limit(4)
                            ->get();

        return view('pages.admission.detail', compact('post', 'relatedPosts'));
    }
}