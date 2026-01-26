@include('components.header')

<div class="bg-gray-50 min-h-screen pb-20">
    <div class="bg-blue-900 py-16 mb-10 text-center relative overflow-hidden">
        {{-- Pattern trang trí --}}
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 20px 20px;"></div>
        
        <h1 class="text-3xl md:text-5xl font-extrabold text-white uppercase relative z-10 font-bevietnam">
            Tin tức & Sự kiện
        </h1>
        <div class="w-20 h-1 bg-yellow-500 mx-auto mt-4 relative z-10"></div>
    </div>

    <main class="w-full max-w-7xl mx-auto px-4">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($posts as $post)
                @php
                    $catSlug = Str::slug($post->category ?? 'tatca'); 
                    $categoryNames = [
                        'tuyensinh' => 'Tuyển sinh', 'hoatdong' => 'Hoạt động',
                        'thanhtich' => 'Thành tích', 'nobo' => 'Nội bộ', 'tatca' => 'Tin tức'
                    ];
                    $displayCategory = $categoryNames[$catSlug] ?? ucfirst($post->category);
                @endphp

                <article class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 group flex flex-col h-full border border-gray-100">
                    <a href="{{ route('post.detail', $post->slug) }}" class="flex flex-col h-full">
                        {{-- Ảnh --}}
                        <div class="h-52 overflow-hidden relative">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                            @else
                                <img src="{{ asset('assets/images/default-news.jpg') }}" class="w-full h-full object-cover">
                            @endif
                            <div class="absolute top-3 right-3 bg-white/90 backdrop-blur text-blue-800 text-xs font-bold px-3 py-1 rounded shadow">
                                {{ $post->created_at->format('d/m/Y') }}
                            </div>
                        </div>

                        {{-- Nội dung --}}
                        <div class="p-6 flex flex-col flex-grow">
                             <div class="mb-2">
                                <span class="text-xs font-bold text-blue-600 uppercase tracking-wide">
                                    <i class="fas fa-tag mr-1"></i> {{ $displayCategory }}
                                </span>
                            </div>
                            
                            <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-blue-700 line-clamp-2">
                                {{ $post->title }}
                            </h3>

                             {{-- Logic lấy tóm tắt từ Block Editor --}}
                             @php
                                $summary = '';
                                if (is_array($post->content)) {
                                    foreach ($post->content as $block) {
                                        if ($block['type'] === 'doan_van') { $summary .= $block['data']['noi_dung'] . ' '; }
                                    }
                                } else { $summary = $post->content; }
                            @endphp
                            <div class="text-sm text-gray-600 line-clamp-3 mb-4 text-justify">
                                {{ Str::limit(App\Helpers\HtmlHelper::plain($summary), 120) }}
                            </div>

                            <div class="mt-auto pt-4 border-t border-gray-100 flex items-center text-blue-600 font-semibold text-sm">
                                Xem chi tiết <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                            </div>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>

        <div class="mt-16 flex justify-center">
            {{ $posts->links() }} 
        </div>

    </main>
</div>

@include('components.footer')