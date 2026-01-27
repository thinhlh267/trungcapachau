@include('components.header')

<div class="bg-gray-50 min-h-screen pb-20">
    
    {{-- Banner --}}
    <div class="bg-blue-900 py-16 mb-10 text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        <h1 class="text-3xl md:text-5xl font-extrabold text-white uppercase relative z-10 font-bevietnam">
            Cổng thông tin Tuyển sinh
        </h1>
        <p class="text-blue-200 mt-4 relative z-10 text-lg">Cập nhật thông tin tuyển sinh mới nhất năm 2026</p>
    </div>

    <main class="w-full max-w-7xl mx-auto px-4">
        
        {{-- BỘ LỌC (TABS) --}}
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            {{-- Nút Tất cả --}}
            <a href="{{ route('admission.index') }}" 
               class="px-6 py-2 rounded-full font-bold transition duration-300 border-2 
               {{ !request('category') ? 'bg-blue-600 text-white border-blue-600 shadow-lg' : 'bg-white text-gray-600 border-gray-200 hover:border-blue-400 hover:text-blue-600' }}">
               Tất cả
            </a>

            {{-- Các nút danh mục động --}}
            @foreach($categories as $cat)
                <a href="{{ route('admission.index', ['category' => $cat->slug]) }}" 
                   class="px-6 py-2 rounded-full font-bold transition duration-300 border-2 
                   {{ request('category') == $cat->slug ? 'bg-blue-600 text-white border-blue-600 shadow-lg' : 'bg-white text-gray-600 border-gray-200 hover:border-blue-400 hover:text-blue-600' }}">
                   {{ $cat->name }}
                </a>
            @endforeach
        </div>

        {{-- DANH SÁCH BÀI VIẾT --}}
        @if($posts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($posts as $post)
                <article class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition duration-300 group flex flex-col h-full border border-gray-100">
                    <a href="{{ route('admission.detail', $post->slug) }}" class="flex flex-col h-full">
                        {{-- Ảnh --}}
                        <div class="h-56 overflow-hidden relative">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-4xl text-blue-300"></i>
                                </div>
                            @endif
                            
                            {{-- Badge Danh mục --}}
                            <div class="absolute top-3 left-3 bg-yellow-500 text-blue-900 text-xs font-black px-3 py-1 rounded shadow uppercase">
                                {{ $post->category->name }}
                            </div>
                        </div>

                        {{-- Nội dung --}}
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-blue-700 line-clamp-2 leading-tight">
                                {{ $post->title }}
                            </h3>
                            
                            <p class="text-sm text-gray-600 line-clamp-3 mb-4 text-justify">
                                {{ Str::limit(strip_tags($post->description ?? $post->content), 120) }}
                            </p>

                            <div class="mt-auto pt-4 border-t border-gray-100 flex justify-between items-center text-xs text-gray-500">
                                <span><i class="far fa-calendar-alt mr-1"></i> {{ $post->created_at->format('d/m/Y') }}</span>
                                <span class="text-blue-600 font-bold group-hover:underline">Xem chi tiết &rarr;</span>
                            </div>
                        </div>
                    </a>
                </article>
                @endforeach
            </div>

            {{-- Phân trang --}}
            <div class="mt-12 flex justify-center">
                {{ $posts->withQueryString()->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-4">
                    <i class="fas fa-search text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-600">Chưa có thông báo nào</h3>
                <p class="text-gray-500 mt-2">Vui lòng quay lại sau hoặc chọn danh mục khác.</p>
            </div>
        @endif

    </main>
</div>

@include('components.footer')