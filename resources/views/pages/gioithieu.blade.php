@include('components.header')

{{-- 1. BANNER HEADER - ĐÃ TỐI ƯU VỚI PICTURE TAG --}}
<div class="relative h-[400px] md:h-[550px] lg:h-[600px] overflow-hidden bg-blue-900 group">
    
    <div class="absolute inset-0 overflow-hidden">
        {{-- SỬA: Thêm picture tag với fallback --}}
        <picture>
            <!-- WebP cho trình duyệt hiện đại -->
            <source srcset="{{ asset('images/gioithieuchung.webp') }}" type="image/webp">
            <!-- JPG fallback cho trình duyệt cũ -->
            <source srcset="{{ asset('images/gioithieuchung.jpg') }}" type="image/jpeg">
            <!-- Ảnh hiển thị (có JPG fallback tự động) -->
            <img src="{{ asset('images/gioithieuchung.jpg') }}"
                 class="absolute inset-0 w-full h-full object-cover opacity-50"
                 alt="Trường Trung Cấp Á Châu - Giới thiệu chung"
                 loading="eager" {{-- Banner chính nên load ngay --}}
                 width="1920"
                 height="600">
        </picture>
        
        {{-- Lớp phủ gradient --}}
        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-blue-900/50 to-blue-900/20"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/30 to-transparent"></div>
    </div>

    {{-- Nội dung chính --}}
    <div class="relative z-10 h-full max-w-7xl mx-auto flex flex-col justify-center px-4 md:px-8 text-white">
        <div class="max-w-3xl">
            {{-- Badge chủ đề --}}
            <div class="inline-flex items-center gap-3 mb-6">
                <span class="text-yellow-400 font-bold uppercase tracking-[0.3em] text-xs md:text-sm 
                           bg-blue-800/50 px-4 py-2 rounded-full backdrop-blur-md border border-yellow-400/30 shadow-lg">
                    <i class="fas fa-star mr-2"></i>Về chúng tôi
                </span>
                <div class="h-px w-12 bg-yellow-400/50"></div>
            </div>

            {{-- Tiêu đề chính --}}
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black font-bevietnam leading-tight mb-4">
                Trường Trung Cấp <span class="text-yellow-400">Á Châu</span>
            </h1>

            {{-- Slogan --}}
            <p class="text-xl md:text-2xl text-blue-100 font-light mb-8 leading-relaxed max-w-2xl">
                Hơn 10 năm đồng hành cùng sự nghiệp "Đào tạo nghề - Kiến tạo tương lai"
            </p>

            {{-- Gạch phân cách --}}
            <div class="w-32 h-1.5 bg-gradient-to-r from-yellow-500 to-yellow-300 rounded-full mb-8 shadow-lg"></div>

            {{-- Thông tin bổ sung --}}
            <div class="flex flex-wrap gap-6 items-center">
                <div class="flex items-center gap-2 text-blue-100">
                    <i class="fas fa-map-marker-alt text-yellow-400"></i>
                    <span class="text-sm md:text-base">Tây Ninh, Việt Nam</span>
                </div>
                <div class="hidden md:block w-1 h-6 bg-yellow-400/30"></div>
                <div class="flex items-center gap-2 text-blue-100">
                    <i class="fas fa-calendar-alt text-yellow-400"></i>
                    <span class="text-sm md:text-base">Thành lập 2016</span>
                </div>
            </div>

            {{-- CTA Buttons --}}
            <div class="flex flex-wrap gap-4 mt-10">
                <a href="#section-tong-quan" 
                   class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-bold px-8 py-3 
                          rounded-full transition-all duration-300 transform hover:-translate-y-1 
                          shadow-lg hover:shadow-xl flex items-center gap-2">
                    <span>Khám phá ngay</span>
                    <i class="fas fa-arrow-down"></i>
                </a>
                <a href="{{ route('page.lienhe') }}" 
                   class="bg-transparent border-2 border-white/50 hover:border-white text-white 
                          font-bold px-8 py-3 rounded-full transition-all duration-300 
                          hover:bg-white/10 backdrop-blur-sm flex items-center gap-2">
                    <i class="fas fa-comment-dots"></i>
                    <span>Liên hệ tư vấn</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
        <div class="w-6 h-10 border-2 border-white/50 rounded-full flex justify-center">
            <div class="w-1 h-3 bg-white/70 rounded-full mt-2"></div>
        </div>
    </div>
</div>

{{-- Anchor for navigation --}}
<div id="goto-tong-quan" class="scroll-mt-20"></div>

<main class="font-bevietnam bg-white">
    
    {{-- 2. TỔNG QUAN & LỊCH SỬ --}}
    <section id="section-tong-quan" class="py-20 md:py-28 bg-gradient-to-b from-white to-blue-50/30">
        <div class="max-w-7xl mx-auto px-4">
            
            {{-- Section Header --}}
            <div class="text-center mb-16">
                <span class="inline-block text-blue-600 font-bold uppercase tracking-[0.3em] text-sm 
                           bg-blue-50 px-4 py-2 rounded-full mb-4 border border-blue-100">
                    <i class="fas fa-history mr-2"></i>Hành trình phát triển
                </span>
                <h2 class="text-3xl md:text-5xl font-black text-blue-900 mb-6 leading-tight">
                    Trường Trung Cấp <span class="text-blue-600">Á Châu</span><br>
                    <span class="text-xl md:text-2xl font-normal text-gray-600 mt-2 block">
                        Hơn một thập kỷ kiến tạo tương lai
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-yellow-300 rounded-full mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                {{-- Cột trái: Nội dung chính --}}
                <div class="space-y-8">
                    {{-- Giới thiệu chính --}}
                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-700 text-lg leading-relaxed mb-6 text-justify">
                            <span class="font-bold text-blue-900 text-xl">Trường Trung Cấp Á Châu</span> được thành lập năm 2016, 
                            với sứ mệnh trở thành đơn vị đào tạo nghề chất lượng cao tại khu vực Tây Ninh và các tỉnh lân cận.
                        </p>
                        
                        <p class="text-gray-700 text-lg leading-relaxed mb-8 text-justify">
                            Trải qua hơn 10 năm hình thành và phát triển, chúng tôi tự hào đã đào tạo thành công 
                            <span class="font-bold text-blue-700">hàng nghìn học viên</span> với tỷ lệ có việc làm ngay sau tốt nghiệp 
                            đạt trên <span class="font-bold text-green-600">90%</span>.
                        </p>
                    </div>

                    {{-- Timeline mini --}}
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                        <h3 class="text-xl font-bold text-blue-900 mb-4 flex items-center gap-2">
                            <i class="fas fa-road text-yellow-500"></i>
                            Cột mốc quan trọng
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                    <span class="text-blue-700 font-bold">2016</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Thành lập trường</h4>
                                    <p class="text-sm text-gray-600">Bắt đầu với 3 ngành đào tạo đầu tiên</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                    <span class="text-blue-700 font-bold">2021</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Mở rộng quy mô</h4>
                                    <p class="text-sm text-gray-600">Mở thêm 2 cơ sở đào tạo mới</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                    <span class="text-blue-700 font-bold">2025</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Đạt chuẩn kiểm định</h4>
                                    <p class="text-sm text-gray-600">Được công nhận đạt chuẩn chất lượng GDNN</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Stats inline --}}
                    <div class="grid grid-cols-3 gap-4 pt-4">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-900">9</div>
                            <div class="text-xs text-gray-600 uppercase tracking-widest">Ngành đào tạo</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-900">3</div>
                            <div class="text-xs text-gray-600 uppercase tracking-widest">Cơ sở đào tạo</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-900">40+</div>
                            <div class="text-xs text-gray-600 uppercase tracking-widest">Giảng viên</div>
                        </div>
                    </div>
                </div>

                {{-- Cột phải: Hình ảnh thực tế VỚI LAZY LOADING --}}
                {{-- Cột phải: Hình ảnh thực tế (ĐÃ SỬA: Badge vào giữa, bố cục thoáng hơn) --}}
                <div class="relative pl-4 md:pl-0"> {{-- Thêm padding trái nhẹ --}}
                    
                    {{-- Background effect --}}
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-blue-100/50 rounded-full blur-3xl -z-10"></div>
                    
                    {{-- Image Gallery Grid --}}
                    <div class="grid grid-cols-2 gap-4 md:gap-6 relative z-10">
                        @php
                            $galleryImages = [
                                ['name' => 'co-so-vat-chat', 'caption' => 'Cơ sở vật chất', 'height' => 'h-48 md:h-64'],
                                ['name' => 'giang-day-thuc-hanh', 'caption' => 'Giờ học thực hành', 'height' => 'h-56 md:h-80 mt-8 md:mt-12'],
                                ['name' => 'sinh-vien-hoc-tap', 'caption' => 'Sinh viên năng động', 'height' => 'h-56 md:h-80'],
                                ['name' => 'le-tot-nghiep', 'caption' => 'Lễ tốt nghiệp', 'height' => 'h-48 md:h-64 mt-8 md:mt-12'],
                            ];
                        @endphp
                        
                        @foreach($galleryImages as $image)
                        <div class="group relative overflow-hidden rounded-2xl shadow-lg {{ $image['height'] }} transition-transform duration-500 hover:-translate-y-1">
                            <picture>
                                <source srcset="{{ asset('images/' . $image['name'] . '.webp') }}" type="image/webp">
                                <source srcset="{{ asset('images/' . $image['name'] . '.jpg') }}" type="image/jpeg">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                                    data-src="{{ asset('images/' . $image['name'] . '.jpg') }}"
                                    data-srcset="{{ asset('images/' . $image['name'] . '.webp') }} 1x"
                                    alt="{{ $image['caption'] }}"
                                    class="lazy-image w-full h-full object-cover transition duration-700 group-hover:scale-110"
                                    loading="lazy"
                                    width="600">
                            </picture>
                            
                            {{-- Caption overlay (Gradient đen mờ để chữ trắng dễ đọc) --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-80 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                <span class="text-white font-bold text-xs md:text-sm tracking-wide">{{ $image['caption'] }}</span>
                            </div>
                        </div>
                        @endforeach

                        {{-- BADGE 10 NĂM: Đưa vào CHÍNH GIỮA (Center) --}}
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-20">
                            <div class="bg-white p-2 rounded-full shadow-2xl animate-bounce-slow"> {{-- Viền trắng ngoài cùng --}}
                                <div class="bg-blue-900 text-white rounded-full w-32 h-32 md:w-40 md:h-40 flex flex-col justify-center items-center text-center border-4 border-blue-100 shadow-inner">
                                    <span class="text-3xl md:text-5xl font-black text-yellow-400 leading-none">10+</span>
                                    <span class="text-[10px] md:text-xs font-bold uppercase tracking-widest mt-1 text-blue-200">Năm kinh nghiệm</span>
                                    {{-- Dấu gạch trang trí --}}
                                    <div class="w-8 h-1 bg-yellow-400 rounded-full mt-2"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Điểm mạnh nổi bật --}}
            <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-6">
                @php
                    $strengths = [
                        ['icon' => 'fas fa-briefcase', 'title' => 'Đào tạo thực tế', 'desc' => '70% thời lượng thực hành'],
                        ['icon' => 'fas fa-handshake', 'title' => 'Cam kết việc làm', 'desc' => '90% có việc làm sau tốt nghiệp'],
                        ['icon' => 'fas fa-graduation-cap', 'title' => 'Liên thông Đại học', 'desc' => 'Hợp tác với gần 10 trường Đại học'],
                        ['icon' => 'fas fa-coins', 'title' => 'Học phí hợp lý', 'desc' => 'Nhiều chính sách hỗ trợ'],
                    ];
                @endphp
                
                @foreach($strengths as $strength)
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 group">
                    <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center mb-4">
                        <i class="{{ $strength['icon'] }} text-2xl text-blue-600"></i>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2">{{ $strength['title'] }}</h4>
                    <p class="text-sm text-gray-600">{{ $strength['desc'] }}</p>
                </div>
                @endforeach
            </div>

            {{-- CTA nhỏ --}}
            <div class="mt-16 text-center">
                <a href="{{ route('page.lienhe') }}" 
                   class="inline-flex items-center gap-3 bg-blue-600 hover:bg-blue-700 text-white 
                          font-bold px-8 py-4 rounded-full transition-all duration-300 
                          transform hover:-translate-y-1 shadow-lg hover:shadow-xl">
                    <i class="fas fa-calendar-check"></i>
                    <span>Đăng ký tham quan trường ngay</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- 3. THỐNG KÊ (COUNTER) - VANILLA JS THAY ALPINE --}}
    <section class="relative py-24 bg-blue-900 overflow-hidden">
        
        {{-- Background pattern inline (tránh request) --}}
        <div class="absolute inset-0 z-0 opacity-20 bg-[length:20px_20px]" 
             style="background-image: linear-gradient(45deg, transparent 49%, rgba(255,255,255,0.1) 50%, transparent 51%);">
        </div>
        
        {{-- Gradient overlay --}}
        <div class="absolute inset-0 bg-gradient-to-b from-blue-950/50 to-blue-900/50 z-0"></div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            {{-- Tiêu đề --}}
            <div class="text-center mb-16">
                <span class="text-yellow-400 font-bold uppercase tracking-[0.3em] text-xs">Thành tựu đào tạo</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-3">Những con số khẳng định uy tín</h2>
                <div class="w-16 h-1 bg-yellow-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                
                {{-- Ô 1: Học viên tốt nghiệp - VANILLA JS COUNTER --}}
                <div class="group p-8 rounded-[2.5rem] bg-white/5 border border-white/10 backdrop-blur-md transition-all duration-500 text-center counter-item">
                    <div class="inline-flex items-center justify-center w-14 h-14 mb-6 rounded-2xl bg-blue-600/30 text-yellow-400 text-2xl">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="text-4xl md:text-5xl font-black text-white mb-2 tracking-tighter">
                        <span class="counter-number" data-target="3000" data-speed="20">0</span>+
                    </div>
                    <div class="text-blue-200 text-xs uppercase font-bold tracking-[0.2em] opacity-70">Học viên tốt nghiệp</div>
                </div>

                {{-- Ô 2: Giảng viên giỏi --}}
                <div class="group p-8 rounded-[2.5rem] bg-white/5 border border-white/10 backdrop-blur-md transition-all duration-500 text-center counter-item">
                    <div class="inline-flex items-center justify-center w-14 h-14 mb-6 rounded-2xl bg-blue-600/30 text-yellow-400 text-2xl">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="text-4xl md:text-5xl font-black text-white mb-2 tracking-tighter">
                        <span class="counter-number" data-target="100" data-speed="30">0</span>+
                    </div>
                    <div class="text-blue-200 text-xs uppercase font-bold tracking-[0.2em] opacity-70">Giảng viên giỏi</div>
                </div>

                {{-- Ô 3: Đối tác doanh nghiệp --}}
                <div class="group p-8 rounded-[2.5rem] bg-white/5 border border-white/10 backdrop-blur-md transition-all duration-500 text-center counter-item">
                    <div class="inline-flex items-center justify-center w-14 h-14 mb-6 rounded-2xl bg-blue-600/30 text-yellow-400 text-2xl">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="text-4xl md:text-5xl font-black text-white mb-2 tracking-tighter">
                        <span class="counter-number" data-target="50" data-speed="25">0</span>+
                    </div>
                    <div class="text-blue-200 text-xs uppercase font-bold tracking-[0.2em] opacity-70">Đối tác doanh nghiệp</div>
                </div>

                {{-- Ô 4: Có việc làm ngay --}}
                <div class="group p-8 rounded-[2.5rem] bg-white/5 border border-white/10 backdrop-blur-md transition-all duration-500 text-center counter-item">
                    <div class="inline-flex items-center justify-center w-14 h-14 mb-6 rounded-2xl bg-blue-600/30 text-yellow-400 text-2xl">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="text-4xl md:text-5xl font-black text-white mb-2 tracking-tighter">
                        <span class="counter-number" data-target="90" data-speed="40" data-suffix="%">0</span>
                    </div>
                    <div class="text-blue-200 text-xs uppercase font-bold tracking-[0.2em] opacity-70">Có việc làm hoặc học tiếp</div>
                </div>
            </div>
        </div>
    </section>

{{-- 4. GIÁ TRỊ CỐT LÕI - ĐÃ TỐI ƯU --}}
<section class="py-24 bg-gradient-to-b from-white to-blue-50/50">
    <div class="max-w-7xl mx-auto px-4">
        
        {{-- Header của Section --}}
        <div class="text-center mb-16">
            <span class="inline-flex items-center gap-2 text-blue-600 font-bold uppercase tracking-[0.3em] text-xs md:text-sm 
                        bg-white px-6 py-3 rounded-full mb-6 border border-blue-100 shadow-sm">
                <i class="fas fa-gem text-yellow-500"></i>
                Giá trị cốt lõi
            </span>
            
            <h2 class="text-4xl md:text-5xl font-black text-blue-900 mb-6 leading-tight">
                Điều làm nên <span class="text-blue-600">thương hiệu Á Châu</span>
            </h2>
            
            <p class="text-gray-500 text-lg max-w-3xl mx-auto font-light">
                Những nguyên tắc vàng không thay đổi trong suốt hành trình 10 năm kiến tạo tương lai.
            </p>
            <div class="w-24 h-1.5 bg-yellow-400 rounded-full mx-auto mt-8"></div>
        </div>

        {{-- Grid Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $coreValues = [
                    [
                        'icon' => 'fas fa-heart',
                        'title' => 'Tận Tâm',
                        'description' => 'Đặt lợi ích người học lên hàng đầu, giảng dạy bằng cả trái tim.',
                        'features' => ['Giảng viên tâm huyết', 'Dạy thật – Học thật - Làm thật', 'Thấu hiểu học viên']
                    ],
                    [
                        'icon' => 'fas fa-lightbulb',
                        'title' => 'Sáng Tạo',
                        'description' => 'Không ngừng đổi mới phương pháp, ứng dụng công nghệ vào giảng dạy.',
                        'features' => ['Phương pháp mới', 'Khuyến khích tư duy mở', 'Ứng dụng công nghệ số']
                    ],
                    [
                        'icon' => 'fas fa-shield-alt',
                        'title' => 'Chất Lượng',
                        'description' => 'Cam kết đầu ra với tay nghề vững vàng và đạo đức nghề nghiệp.',
                        'features' => ['Kỹ năng làm việc thực tế', 'Nền tảng nghề nghiệp vững vàng', 'Kiểm định chặt chẽ']
                    ],
                    [
                        'icon' => 'fas fa-handshake',
                        'title' => 'Hợp Tác',
                        'description' => 'Gắn kết với doanh nghiệp, tạo cơ hội việc làm vững chắc.',
                        'features' => ['Thực tập tại doanh nghiệp thật', 'Cơ hội việc làm sau tốt nghiệp', 'Cam kết việc làm']
                    ]
                ];
            @endphp
            
            @foreach($coreValues as $index => $value)
            <div class="group h-full">
                <div class="bg-white rounded-2xl p-6 md:p-8 shadow-lg border border-gray-100 
                            transition-all duration-300 hover:-translate-y-1 hover:shadow-xl h-full flex flex-col relative">
                    
                    {{-- Số thứ tự --}}
                    <div class="absolute top-6 left-6 w-8 h-8 bg-blue-600 text-white rounded-full 
                                flex items-center justify-center font-bold text-sm shadow-md">
                        {{ $index + 1 }}
                    </div>

                    {{-- Nội dung Card --}}
                    <div class="flex flex-col h-full items-center text-center mt-4">
                        {{-- Icon --}}
                        <div class="w-16 h-16 text-blue-600 mb-4 flex items-center justify-center">
                            <i class="{{ $value['icon'] }} text-4xl"></i>
                        </div>

                        <h3 class="text-xl font-bold text-blue-900 mb-3">
                            {{ $value['title'] }}
                        </h3>
                        
                        <p class="text-gray-600 text-sm leading-relaxed mb-6">
                            {{ $value['description'] }}
                        </p>
                        
                        {{-- List Features --}}
                        <div class="mt-auto w-full pt-4 border-t border-gray-100 space-y-2 text-left">
                            @foreach($value['features'] as $feature)
                            <div class="flex items-center gap-2 text-xs font-medium text-gray-500">
                                <i class="fas fa-check text-green-500"></i>
                                <span>{{ $feature }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Khối Quote (Trích dẫn) --}}
        <div class="mt-24">
            <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-xl border border-gray-100">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    {{-- Icon Quote --}}
                    <div class="flex-shrink-0 text-blue-100">
                        <i class="fas fa-quote-left text-8xl"></i>
                    </div>
                    
                    <div class="flex-1 text-center md:text-left">
                        <p class="text-xl md:text-2xl font-medium text-blue-900 italic leading-relaxed mb-6">
                            "Giá trị cốt lõi không chỉ là khẩu hiệu treo tường, mà là <span class="text-blue-600 font-bold">kim chỉ nam</span> cho mọi hành động của chúng tôi trong hành trình kiến tạo tương lai cho thế hệ trẻ."
                        </p>
                        
                        <div class="flex items-center justify-center md:justify-start gap-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900">Ban Giám Hiệu</div>
                                <div class="text-sm text-blue-500 font-medium">Trường Trung Cấp Á Châu</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- CTA Cuối cùng --}}
        <div class="mt-16 text-center">
            <a href="{{ route('page.sumenh') }}" 
               class="inline-flex items-center gap-3 bg-blue-600 hover:bg-blue-700 text-white font-bold px-10 py-4 rounded-full 
                      transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-blue-600/30">
                <span>Tìm hiểu Sứ mệnh & Tầm nhìn</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

</main>

{{-- LIGHTWEIGHT JAVASCRIPT (2KB thay vì 150KB) --}}
<script>
// 1. Simple lazy loading for images
document.addEventListener('DOMContentLoaded', function() {
    // Lazy load images
    const lazyImages = document.querySelectorAll('.lazy-image');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    const src = img.getAttribute('data-src');
                    const srcset = img.getAttribute('data-srcset');
                    
                    if (src) img.src = src;
                    if (srcset) img.srcset = srcset;
                    
                    img.classList.add('loaded');
                    imageObserver.unobserve(img);
                }
            });
        }, { rootMargin: '100px 0px' });
        
        lazyImages.forEach(img => imageObserver.observe(img));
    }
    
    // 2. Simple counter animation (Vanilla JS - 0.5KB)
    const counters = document.querySelectorAll('.counter-number');
    
    if (counters.length > 0 && 'IntersectionObserver' in window) {
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-target'));
                    const speed = parseInt(counter.getAttribute('data-speed'));
                    const suffix = counter.getAttribute('data-suffix') || '+';
                    
                    animateCounter(counter, target, speed, suffix);
                    counterObserver.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });
        
        counters.forEach(counter => counterObserver.observe(counter));
    }
    
    function animateCounter(element, target, speed, suffix) {
        let current = 0;
        const increment = target / speed;
        
        const timer = setInterval(() => {
            current += increment;
            
            if (current >= target) {
                element.textContent = target.toLocaleString('vi-VN') + suffix;
                clearInterval(timer);
                
                // Add trophy for 98%
                if (target === 98) {
                    const trophy = document.createElement('div');
                    trophy.className = 'absolute -top-2 -right-2 z-10';
                    trophy.innerHTML = '<div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center"><i class="fas fa-trophy text-xs text-white"></i></div>';
                    element.closest('.counter-item').appendChild(trophy);
                }
            } else {
                element.textContent = Math.floor(current).toLocaleString('vi-VN') + suffix;
            }
        }, 30);
    }
    
    // 3. Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
});
</script>

<style>
    /* 1. Animation Keyframes (Bắt buộc phải có để hiện chữ Banner) */
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
        opacity: 0; /* Ẩn trước khi chạy animation */
    }

    /* Stagger delay classes */
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }
    .delay-500 { animation-delay: 0.5s; }

    /* 2. Lazy Image Styles */
    .lazy-image {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
        will-change: opacity;
    }
    
    .lazy-image.loaded {
        opacity: 1;
    }
    
    /* 3. Hover Effects */
    .counter-item:hover {
        transform: translateY(-5px);
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    
    /* 4. Performance Optimizations */
    .group img {
        transform: translateZ(0); /* Kích hoạt GPU Hardware Acceleration */
        backface-visibility: hidden;
    }

    /* Giảm tải cho máy yếu */
    @media (prefers-reduced-motion: reduce) {
        *, ::before, ::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
            scroll-behavior: auto !important;
        }
    }
</style>

@include('components.footer')