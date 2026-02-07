<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Major;

class PostController extends Controller
{
    /**
     * 1. DANH SÁCH TIN TỨC
     * URL: /tin-tuc
     */
    public function index()
    {
        $posts = Post::where('is_published', true)
                    ->orderBy('created_at', 'desc')
                    ->paginate(9);
        
        $headerMajors = Major::where('is_active', true)->get();

        return view('news', compact('posts', 'headerMajors'));
    }

    /**
     * 2. CHI TIẾT TIN TỨC
     * URL: /tin-tuc/{slug}
     */
    public function detail($slug)
    {
        // 1. Lấy bài viết hiện tại
        $post = Post::where('slug', $slug)
                    ->where('is_published', true)
                    ->firstOrFail();
        
        // 2. Lấy "Tin tức mới nhất" cho Sidebar (Lấy 5 bài mới nhất, trừ bài đang xem)
        $recentPosts = Post::where('is_published', true)
                           ->where('id', '!=', $post->id)
                           ->orderBy('created_at', 'desc')
                           ->take(5)
                           ->get();

        // 3. Lấy "Tin liên quan" (Cùng danh mục - Dùng nếu muốn hiển thị ở chân trang)
        $relatedPosts = Post::where('category', $post->category)
                            ->where('id', '!=', $post->id)
                            ->where('is_published', true)
                            ->take(3)
                            ->get();
        
        $headerMajors = Major::where('is_active', true)->get();

        // Trả về View 'post' (tương ứng với file post.blade.php của bạn)
        return view('post', compact('post', 'recentPosts', 'relatedPosts', 'headerMajors'));
    }
}