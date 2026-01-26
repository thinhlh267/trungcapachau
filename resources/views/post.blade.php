@include('components.header')

<style>
    /* Làm đẹp nội dung bên trong RichEditor */
    .post-content h2 { font-size: 1.8rem; font-weight: 800; color: #1e3a8a; margin-top: 2rem; margin-bottom: 1rem; line-height: 1.3; }
    .post-content h3 { font-size: 1.4rem; font-weight: 700; color: #333; margin-top: 1.5rem; margin-bottom: 0.8rem; border-left: 4px solid #f59e0b; padding-left: 10px; }
    .post-content p { margin-bottom: 1.2rem; line-height: 1.8; color: #374151; font-size: 1.125rem; text-align: justify; }
    .post-content ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1.5rem; color: #374151; }
    .post-content ol { list-style-type: decimal; padding-left: 1.5rem; margin-bottom: 1.5rem; color: #374151; }
    .post-content img { border-radius: 0.75rem; margin: 2rem auto; display: block; max-width: 100%; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
    .post-content blockquote { font-style: italic; border-left: 4px solid #3b82f6; padding: 1rem 1.5rem; background: #eff6ff; color: #1e40af; border-radius: 0 8px 8px 0; margin: 2rem 0; }
    .post-content strong { color: #111827; font-weight: 700; }
    .post-content table { width: 100%; border-collapse: collapse; margin: 1.5rem 0; }
    .post-content th, .post-content td { border: 1px solid #e5e7eb; padding: 0.75rem; text-align: left; }
    .post-content th { background-color: #f3f4f6; font-weight: 600; }
</style>

<div class="bg-[#f8fafc] min-h-screen pb-20">
    
    <div class="relative w-full h-[400px] md:h-[500px] overflow-hidden">
        <div class="absolute inset-0 bg-blue-900/80 z-10"></div>
        {{-- Ảnh nền mờ lấy từ ảnh đại diện --}}
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover blur-sm opacity-50 absolute inset-0">
        @else
            <div class="absolute inset-0 bg-gradient-to-r from-blue-800 to-blue-600"></div>
        @endif

        <div class="absolute inset-0 z-20 flex flex-col justify-center items-center text-center px-4 max-w-5xl mx-auto mt-10">
            {{-- Nhãn Danh mục --}}
            <span class="bg-yellow-500 text-blue-900 text-xs md:text-sm font-extrabold px-4 py-1.5 rounded-full uppercase tracking-wider mb-4 shadow-lg">
                {{ $post->category ?? 'Tin tức' }}
            </span>
            
            {{-- Tiêu đề lớn --}}
            <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight font-bevietnam drop-shadow-md mb-6">
                {{ $post->title }}
            </h1>

            {{-- Metadata: Ngày đăng & Phòng ban (YÊU CẦU 1) --}}
            <div class="flex flex-wrap items-center justify-center gap-4 text-gray-200 text-sm md:text-base font-medium">
                <div class="flex items-center bg-white/10 px-3 py-1.5 rounded-lg backdrop-blur-md">
                    <i class="far fa-calendar-alt mr-2 text-yellow-400"></i> 
                    {{ $post->created_at->format('d/m/Y') }}
                </div>
                
                <div class="hidden md:block w-1.5 h-1.5 bg-yellow-500 rounded-full"></div>

                <div class="flex items-center bg-white/10 px-3 py-1.5 rounded-lg backdrop-blur-md">
                    <i class="fas fa-user-edit mr-2 text-yellow-400"></i>
                    {{-- Nếu có tên phòng ban thì hiện, không thì hiện mặc định --}}
                    {{ $post->department ?? 'Trường Trung cấp Á Châu' }}
                </div>
            </div>
        </div>
    </div>

    <main class="w-full max-w-5xl mx-auto px-4 -mt-20 relative z-30">
        
        <article class="bg-white p-8 md:p-12 rounded-3xl shadow-xl border border-gray-100 mb-12">
            
            {{-- Ảnh đại diện chính --}}
            @if($post->image)
                <div class="w-full mb-10">
                    <div class="overflow-hidden rounded-xl shadow-lg">
                        <img src="{{ asset('storage/' . $post->image) }}" 
                            alt="{{ $post->title }}" 
                            class="w-full h-auto object-cover">
                    </div>
                    {{-- HIỂN THỊ CHÚ THÍCH ẢNH ĐẠI DIỆN TỪ BACKEND --}}
                    @if($post->image_caption)
                        <p class="text-center text-gray-500 italic text-sm mt-3 bg-gray-50 py-2 rounded-lg mx-auto max-w-3xl">
                            <i class="fas fa-camera mr-1"></i> {{ $post->image_caption }}
                        </p>
                    @endif
                </div>
            @endif

            {{-- Nội dung Rich Editor --}}
            <div class="post-content font-bevietnam">
            {{-- Kiểm tra xem content có phải là mảng khối không --}}
            @if(is_array($post->content))
                @foreach($post->content as $block)
                    
                    {{-- TRƯỜNG HỢP 1: LÀ KHỐI VĂN BẢN --}}
                    @if($block['type'] === 'doan_van')
                        <div class="mb-6 text-justify">
                            {!! \App\Helpers\HtmlHelper::clean($block['data']['noi_dung']) !!}
                        </div>
                    
                    {{-- TRƯỜNG HỢP 2: LÀ KHỐI HÌNH ẢNH --}}
            @elseif($block['type'] === 'hinh_anh')
                <figure class="my-8 flex flex-col items-center justify-center relative">
                    
                    {{-- Thêm relative và z-0 cho ảnh --}}
                    <img src="{{ asset('storage/' . $block['data']['url']) }}" 
                         alt="{{ $block['data']['chu_thich'] }}" 
                         class="w-full h-auto object-cover rounded-lg shadow-md max-h-[600px] relative z-0">
                    
                    {{-- Caption: --}}
                    <figcaption class="text-center text-gray-600 italic text-sm -mt-4 relative z-10 bg-white/90 backdrop-blur-sm py-2 px-6 rounded-full border border-gray-200 shadow-sm">
                        <i class="fas fa-camera mr-1 text-gray-400"></i>
                        {{ $block['data']['chu_thich'] }}
                    </figcaption>

                </figure>
            @endif

                @endforeach
            @else
                {{-- Fallback: Nếu bài cũ chưa chuyển đổi thì hiện bình thường --}}
                {!! \App\Helpers\HtmlHelper::clean($post->content) !!}
            @endif
        </div>

            <div class="mt-12 pt-8 border-t border-gray-100 flex justify-between items-center">
                <span class="text-gray-500 italic">Nguồn: <strong>Trường Trung cấp Á Châu</strong></span>
                <div class="flex gap-2">
                    <button class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition flex items-center justify-center"><i class="fab fa-facebook-f"></i></button>
                    <button class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition flex items-center justify-center"><i class="fas fa-share-alt"></i></button>
                </div>
            </div>
        </article>

        @if(!empty($post->gallery))
        <section class="mb-16">
            <h2 class="text-2xl font-bold text-blue-900 mb-6 border-l-4 border-yellow-500 pl-4 uppercase">
                <i class="fas fa-images mr-2"></i> Thư viện ảnh hoạt động
            </h2>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($post->gallery as $img)
                <div class="group relative aspect-square overflow-hidden rounded-xl shadow-md cursor-pointer hover:shadow-xl transition duration-300">
                    <img src="{{ asset('storage/' . $img) }}" 
                         alt="Ảnh hoạt động" 
                         class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                         onclick="openModal('{{ asset('storage/' . $img) }}')">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition"></div>
                    <div class="absolute bottom-2 right-2 bg-black/50 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition">
                        <i class="fas fa-expand"></i>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif

        <div class="text-center pb-10">
             <a href="/" class="inline-flex items-center px-8 py-3 bg-white border border-gray-200 text-gray-600 rounded-full font-bold hover:bg-blue-600 hover:text-white hover:border-blue-600 transition duration-300 shadow-sm hover:shadow-lg">
                <i class="fas fa-arrow-left mr-2"></i> Về trang chủ
            </a>
        </div>

    </main>

</div>

<div id="imageModal" class="fixed inset-0 z-[999] bg-black/90 hidden flex items-center justify-center p-4" onclick="closeModal()">
    <span class="absolute top-5 right-5 text-white text-4xl cursor-pointer hover:text-red-500">&times;</span>
    <img id="modalImg" class="max-w-full max-h-[90vh] rounded-lg shadow-2xl transform scale-95 transition-transform duration-300">
</div>

<script>
    function openModal(src) {
        const modal = document.getElementById('imageModal');
        const img = document.getElementById('modalImg');
        img.src = src;
        modal.classList.remove('hidden');
        setTimeout(() => img.classList.replace('scale-95', 'scale-100'), 10);
    }
    function closeModal() {
        const modal = document.getElementById('imageModal');
        const img = document.getElementById('modalImg');
        img.classList.replace('scale-100', 'scale-95');
        setTimeout(() => modal.classList.add('hidden'), 200);
    }
</script>

@include('components.footer')