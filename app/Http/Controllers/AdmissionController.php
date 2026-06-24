<?php

namespace App\Http\Controllers;

use App\Models\AdmissionCategory;
use App\Models\AdmissionPost;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index(Request $request)
    {
        $categories = AdmissionCategory::where('is_active', true)
                        ->orderBy('sort_order')
                        ->get();

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

    public function detail($slug)
    {
        $post = AdmissionPost::where('slug', $slug)
                    ->where('is_published', true)
                    ->firstOrFail();
        
        $post->increment('view_count');

        $relatedPosts = AdmissionPost::where('admission_category_id', $post->admission_category_id)
                            ->where('id', '!=', $post->id)
                            ->where('is_published', true)
                            ->limit(4)
                            ->get();

        return view('pages.admission.detail', compact('post', 'relatedPosts'));
    }
}