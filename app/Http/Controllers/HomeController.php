<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Banner;

class HomeController extends Controller
{

    public function index()
    {
        $sliders = Slider::where('is_active', true)->orderBy('created_at', 'desc')->get();
        $banner = Banner::where('is_active', true)->first();
        
        $posts = Post::where('is_published', true)
                    ->orderBy('created_at', 'desc')
                    ->take(6)
                    ->get();
        
        return view('home', compact('sliders', 'banner', 'posts'));
    }
}