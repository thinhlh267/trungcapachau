@include('components.header')

<div class="relative w-full overflow-hidden hero">
    <div class="w-full">
        {{-- Logic: Có Banner mới từ Admin thì hiện, không thì hiện ảnh mặc định --}}
        @if(isset($banner) && $banner->image)
            <img src="{{ asset('storage/' . $banner->image) }}" 
                 alt="Banner Trường Á Châu" 
                 class="w-full max-h-[90vh] object-cover" />
        @else
            <img src="{{ asset('assets/images/nền.svg') }}" 
                 alt="Ảnh nền Trung tâm GDTX Á Châu" 
                 class="w-full max-h-[90vh] object-cover" />
        @endif
    </div>
</div>

<div class="relative w-full z-20 mt-8 mb-16 px-4">
    {{-- ĐÃ SỬA: Tăng max-w-6xl lên max-w-[1600px] để đồng bộ khung rộng --}}
    <div class="max-w-[1600px] mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            
            {{-- 1. GIỚI THIỆU --}}
            <a href="{{ route('page.gioithieu') }}" 
               class="group bg-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-center text-center transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:bg-blue-900 border-b-4 border-yellow-500"
               data-aos="fade-up" data-aos-delay="0">
                <div class="w-14 h-14 bg-blue-50 text-blue-900 rounded-full flex items-center justify-center mb-3 text-2xl transition duration-300 group-hover:bg-yellow-400 group-hover:text-blue-900 shadow-sm">
                    <i class="fas fa-university"></i>
                </div>
                <span class="font-bold text-gray-800 uppercase text-sm md:text-base group-hover:text-white transition">
                    Giới thiệu chung
                </span>
            </a>

            {{-- 2. SỨ MỆNH & TẦM NHÌN --}}
            <a href="{{ route('page.sumenh') }}" 
               class="group bg-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-center text-center transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:bg-blue-900 border-b-4 border-yellow-500"
               data-aos="fade-up" data-aos-delay="100">
                <div class="w-14 h-14 bg-blue-50 text-blue-900 rounded-full flex items-center justify-center mb-3 text-2xl transition duration-300 group-hover:bg-yellow-400 group-hover:text-blue-900 shadow-sm">
                    <i class="fas fa-compass"></i>
                </div>
                <span class="font-bold text-gray-800 uppercase text-sm md:text-base group-hover:text-white transition">
                    Sứ mệnh & Tầm nhìn
                </span>
            </a>

            {{-- 3. MỤC TIÊU GIÁO DỤC --}}
            <a href="{{ route('page.muctieu') }}" 
               class="group bg-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-center text-center transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:bg-blue-900 border-b-4 border-yellow-500"
               data-aos="fade-up" data-aos-delay="200">
                <div class="w-14 h-14 bg-blue-50 text-blue-900 rounded-full flex items-center justify-center mb-3 text-2xl transition duration-300 group-hover:bg-yellow-400 group-hover:text-blue-900 shadow-sm">
                    <i class="fas fa-bullseye"></i>
                </div>
                <span class="font-bold text-gray-800 uppercase text-sm md:text-base group-hover:text-white transition">
                    Mục tiêu giáo dục
                </span>
            </a>

            {{-- 4. CHỨNG NHẬN --}}
            <a href="{{ route('page.chungnhan') }}" 
               class="group bg-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-center text-center transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:bg-blue-900 border-b-4 border-yellow-500"
               data-aos="fade-up" data-aos-delay="300">
                <div class="w-14 h-14 bg-blue-50 text-blue-900 rounded-full flex items-center justify-center mb-3 text-2xl transition duration-300 group-hover:bg-yellow-400 group-hover:text-blue-900 shadow-sm">
                    <i class="fas fa-award"></i>
                </div>
                <span class="font-bold text-gray-800 uppercase text-sm md:text-base group-hover:text-white transition">
                    Chứng nhận & Giải thưởng
                </span>
            </a>

        </div>
    </div>
</div>

{{-- ĐÃ SỬA: Tăng max-w-7xl lên max-w-[1600px] để hai bên lề bung rộng --}}
<main class="w-full max-w-[1600px] mx-auto py-10 px-6">
    
    <div class="swiper mySwiper rounded-xl overflow-hidden shadow-lg mb-16">
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
            <div class="swiper-slide relative group overflow-hidden aspect-[16/9] md:aspect-[21/9] rounded-xl">
                <img class="object-cover object-[center_80%] w-full h-full transition-all duration-500 group-hover:scale-110" 
                     src="{{ asset('storage/' . $slider->image) }}" 
                     alt="{{ $slider->title ?? 'Banner' }}" />
                
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition duration-500"></div>
                
                @if($slider->title)
                <div class="absolute inset-0 flex items-center justify-center p-6 opacity-0 group-hover:opacity-100 transition duration-700 text-white">
                    <div class="text-center max-w-2xl mx-auto">
                        <h2 class="text-2xl md:text-4xl font-semibold drop-shadow whitespace-nowrap">
                            {{ $slider->title }}
                        </h2>
                        @if($slider->description)
                        <p class="text-lg md:text-2xl mt-2 drop-shadow">
                            {{ $slider->description }}
                        </p>
                        @endif
                    </div>
                </div>
                @endif
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <section class="space-y-12 mt-16">
        <h2 class="text-4xl font-extrabold text-blue-900 gradient-text border-l-4 border-yellow-500 pl-4">
            Tin tức & Sự kiện nổi bật
        </h2>
        
        <div id="news-filter" class="flex flex-wrap gap-4 text-center border-b pb-4 border-gray-200">
            <a href="#tatca" data-category="tatca" class="px-4 py-2 text-sm font-semibold rounded-full bg-blue-600 text-white hover:bg-blue-700 transition duration-300 filter-btn active">Tất cả</a>
            <a href="#tuyensinh" data-category="tuyensinh" class="px-4 py-2 text-sm font-semibold rounded-full bg-gray-100 text-blue-800 hover:bg-yellow-500 hover:text-white transition duration-300 filter-btn">Tuyển sinh</a>
            <a href="#hoatdong" data-category="hoatdong" class="px-4 py-2 text-sm font-semibold rounded-full bg-gray-100 text-blue-800 hover:bg-yellow-500 hover:text-white transition duration-300 filter-btn">Hoạt động</a>
            <a href="#thanhtich" data-category="thanhtich" class="px-4 py-2 text-sm font-semibold rounded-full bg-gray-100 text-blue-800 hover:bg-yellow-500 hover:text-white transition duration-300 filter-btn">Thành tích</a>
        </div>

        <div id="news-container" class="grid grid-cols-1 md:grid-cols-3 gap-8">
        {{-- Kiểm tra xem có bài viết nào không --}}
        @if($posts->count() > 0)
            @foreach($posts as $post)
                
                {{-- --- PHẦN LOGIC: DỊCH TÊN DANH MỤC --- --}}
                @php
                    // Chuẩn hóa category từ DB thành chữ thường không dấu (slug)
                    $catSlug = Str::slug($post->category ?? 'tatca'); 
                    
                    // Bản dịch Tiếng Việt
                    $categoryNames = [
                        'tuyensinh' => 'Tuyển sinh',
                        'hoatdong'  => 'Hoạt động',
                        'thanhtich' => 'Thành tích',
                        'nobo'      => 'Nội bộ',
                        'tatca'     => 'Tin tức chung',
                    ];
                    
                    // Lấy tên hiển thị (Nếu không tìm thấy thì lấy tên gốc)
                    $displayCategory = $categoryNames[$catSlug] ?? ucfirst($post->category ?? 'Tin tức');
                @endphp
                {{-- ------------------------------------- --}}

            <article data-category="{{ $catSlug }}" class="bg-white rounded-xl overflow-hidden shadow-lg transform transition-all duration-300 hover:shadow-2xl hover:scale-[1.02] group h-full border border-gray-100 flex flex-col">
                <a href="{{ route('post.detail', $post->slug) }}" class="flex flex-col h-full"> 
                    
                    {{-- 1. ẢNH BÀI VIẾT --}}
                    <div class="h-52 overflow-hidden relative">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                        @else
                            <img src="{{ asset('assets/images/default-news.jpg') }}" alt="Tin tức mặc định" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                        @endif
                        
                        {{-- Ngày đăng nổi trên ảnh --}}
                        <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm text-blue-800 text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm z-10">
                            <i class="far fa-calendar-alt mr-1"></i> {{ $post->created_at->format('d/m/Y') }}
                        </div>
                    </div>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        
                        {{-- 2. DANH MỤC (TAB) --}}
                        <div class="flex items-center mb-3">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold uppercase tracking-wide bg-blue-50 text-blue-700 border border-blue-100">
                                <i class="fas fa-bullhorn mr-1.5 text-red-500"></i> 
                                {{ $displayCategory }}
                            </span>
                        </div>
                        
                        {{-- 3. TIÊU ĐỀ (Rê chuột vào khung -> đổi màu) --}}
                        <h3 class="text-xl font-extrabold text-gray-800 mb-3 group-hover:text-blue-700 transition duration-300 line-clamp-2 leading-tight">
                            {{ $post->title }}
                        </h3>
                        
                        {{-- 4. MÔ TẢ NGẮN --}}
                        @php
                            // Logic: Xử lý nội dung tóm tắt
                            $summary = '';
                            
                            if (is_array($post->content)) {
                                // TRƯỜNG HỢP 1: Bài viết mới (Dạng Block/Mảng)
                                foreach ($post->content as $block) {
                                    if ($block['type'] === 'doan_van') {
                                        $summary .= $block['data']['noi_dung'] . ' ';
                                    }
                                }
                            } else {
                                // TRƯỜNG HỢP 2: Bài viết cũ (Dạng chuỗi HTML)
                                $summary = $post->content;
                            }

                            // ĐÃ SỬA: Giải mã HTML entities 2 lớp trước khi bóc plain text để trị dứt điểm ký tự lạ tiếng Việt
                            $cleanSummary = html_entity_decode(html_entity_decode($summary, ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8');
                        @endphp

                        <div class="text-sm text-gray-700 leading-normal line-clamp-3 text-justify mb-4">
                            {{ Str::limit(\App\Helpers\HtmlHelper::plain($cleanSummary), 150) }}
                        </div>
                        
                        <p class="mt-auto inline-block text-blue-600 font-semibold group-hover:text-yellow-500 text-sm transition">
                            Xem chi tiết <i class="fas fa-arrow-right ml-1"></i>
                        </p>

                    </div>
                </a>
            </article>
            @endforeach
        @else
            {{-- Nếu không có bài viết nào --}}
            <div class="col-span-1 md:col-span-3 py-12 text-center bg-gray-50 rounded-xl border-2 border-dashed border-gray-300">
                <i class="fas fa-newspaper text-4xl text-gray-300 mb-3 block"></i>
                <p class="text-gray-500 font-medium">Chưa có bài viết nào trong mục này.</p>
            </div>
        @endif
    </div>
        
        <div class="text-center pt-8">
             <a href="{{ route('news.index') }}" class="bg-blue-600 text-white px-8 py-3 rounded-full font-bold hover:bg-blue-700 transition duration-300 shadow-lg hover:shadow-xl">
                Xem Tất Cả Tin Tức
            </a>
        </div>
        
    </section>
</main>

@include('components.footer')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>