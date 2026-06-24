<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::where('is_published', true)
                    ->orderBy('created_at', 'desc')
                    ->paginate(9);
        
        return view('news', compact('posts'));
    }

    public function detail($slug)
    {
        $post = Post::where('slug', $slug)
                    ->where('is_published', true)
                    ->firstOrFail();
        
        $recentPosts = Post::where('is_published', true)
                           ->where('id', '!=', $post->id)
                           ->orderBy('created_at', 'desc')
                           ->take(5)
                           ->get();

        $relatedPosts = Post::where('category', $post->category)
                            ->where('id', '!=', $post->id)
                            ->where('is_published', true)
                            ->take(3)
                            ->get();
        
        return view('post', compact('post', 'recentPosts', 'relatedPosts'));
    }
}