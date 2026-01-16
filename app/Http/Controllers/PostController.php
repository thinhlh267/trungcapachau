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

    public function detail($slug)
    {
        $post = Post::where('slug', $slug)
                    ->where('is_published', true)
                    ->firstOrFail();
        
        $relatedPosts = Post::where('category', $post->category)
                            ->where('id', '!=', $post->id)
                            ->where('is_published', true)
                            ->take(3)
                            ->get();
        
        $headerMajors = Major::where('is_active', true)->get();

        return view('post', compact('post', 'relatedPosts', 'headerMajors'));
    }
}