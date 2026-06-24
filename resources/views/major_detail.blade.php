@include('components.header')

{{-- 1. HEADER BANNER --}}
<div class="relative w-full h-[400px] md:h-[500px] overflow-hidden group">
    @if($major->image)
        <img src="{{ asset('storage/' . $major->image) }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
    @else
        <div class="absolute inset-0 bg-blue-900"></div>
    @endif
    <div class="absolute inset-0 bg-gradient-to-t from-blue-900 via-blue-900/40 to-transparent opacity-90"></div>
    <div class="relative z-20 h-full max-w-7xl mx-auto px-4 flex flex-col justify-end pb-16 md:pb-24 text-white">
        <span class="bg-yellow-500 text-blue-900 text-xs md:text-sm font-extrabold px-4 py-1.5 rounded-full uppercase tracking-wider mb-4 inline-block shadow-lg w-fit">Ngành đào tạo</span>
        <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold font-bevietnam leading-tight mt-3 mb-4 text-shadow">{{ $major->name }}</h1>
    </div>
</div>

<main class="font-bevietnam bg-white">
    
    {{-- CONTAINER NỘI DUNG CHÍNH (GIỚI HẠN CHIỀU RỘNG) --}}
    <div class="max-w-7xl mx-auto px-4 py-16">
        
        {{-- 2. INTRO CARD --}}
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 md:p-12 flex flex-col lg:flex-row gap-12 items-center mb-20 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-blue-50/50 skew-x-12 translate-x-1/4 z-0"></div>
            <div class="flex-1 relative z-10 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-1 bg-green-500 rounded-full"></div>
                    <span class="uppercase tracking-widest text-sm font-bold text-gray-500">{{ optional($major->departmentRel)->name ?? 'Khoa Đào Tạo' }}</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-extrabold text-blue-900 leading-tight text-balance">{{ $major->name }}</h2>
                <div class="text-gray-600 text-lg leading-relaxed text-justify prose prose-blue max-w-none">
                    {!! \App\Helpers\HtmlHelper::clean($major->description ?? 'Nội dung đang được cập nhật...') !!}
                </div>
                <div class="pt-4 flex flex-wrap gap-4">
                    <a href="#dang-ky" class="bg-red-600 text-white font-bold px-8 py-3 rounded-full shadow-lg hover:bg-red-700 transition transform hover:-translate-y-1">Đăng ký ngay</a>
                    <a href="#roadmap" class="text-blue-700 font-bold px-6 py-3 hover:underline flex items-center gap-2">Xem lộ trình <i class="fas fa-arrow-down"></i></a>
                </div>
            </div>
            {{-- CỘT BÊN PHẢI: KHUNG ẢNH INTRO (ĐÃ ĐỔI SANG KHUNG CHỮ NHẬT BO GÓC) --}}
            <div class="w-full lg:w-5/12 relative z-10 flex justify-center items-center py-6">
                
                {{-- Các mảng màu trang trí phía sau (Tùy chỉnh lại cho hợp hình chữ nhật) --}}
                <div class="absolute w-[110%] h-[110%] bg-blue-50 rounded-[3rem] opacity-60 -z-20 rotate-3"></div>
                <div class="absolute w-[105%] h-[105%] bg-blue-100 rounded-[2.5rem] opacity-80 -z-10 -rotate-3"></div>
                
                {{-- Khung chứa ảnh chính: Bỏ rounded-full, dùng rounded-3xl --}}
                <div class="relative w-full shadow-2xl border-[8px] border-white bg-white overflow-hidden group rounded-3xl">
                    @if($major->intro_image)
                        {{-- H-auto để ảnh tự điều chỉnh chiều cao theo tỷ lệ gốc --}}
                        <img src="{{ asset('storage/' . $major->intro_image) }}" 
                             class="w-full h-auto object-cover group-hover:scale-105 transition duration-700" 
                             alt="Hình ảnh {{ $major->name }}">
                    @else
                        {{-- Placeholder --}}
                        <div class="w-full aspect-[4/3] flex items-center justify-center bg-gradient-to-br from-blue-50 to-blue-100">
                            <i class="fas fa-graduation-cap text-6xl text-blue-300"></i>
                        </div>
                    @endif
                </div>
                
            </div>
        </div>

        {{-- 3. ĐỊNH NGHĨA NGÀNH --}}
            @if(!empty($major->gallery) && count($major->gallery) > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($major->gallery as $key => $img)
                @if($key < 3) 
                {{-- KHUNG ẢNH THUMBNAIL: Ép tỷ lệ 4:3 và gọi hàm openModal khi click --}}
                <div onclick="openModal('{{ asset('storage/' . $img) }}')" 
                     class="group relative aspect-[4/3] rounded-2xl overflow-hidden shadow-md hover:shadow-xl cursor-pointer hover:-translate-y-2 transition-all duration-300 border border-gray-100 bg-gray-50">
                    
                    {{-- Dùng object-cover để lấp đầy khung mà không méo ảnh --}}
                    <img src="{{ asset('storage/' . $img) }}" 
                         class="w-full h-full object-cover transition duration-700 group-hover:scale-110" 
                         alt="Hình ảnh ngành {{ $major->name }}">
                    
                    {{-- Overlay hiệu ứng khi di chuột --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-6">
                        <span class="text-white font-bold uppercase tracking-wider text-sm border-2 border-white px-5 py-2 rounded-full backdrop-blur-sm bg-black/20 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <i class="fas fa-search-plus mr-2"></i> Xem ảnh
                        </span>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            @endif

        {{-- 4. WHY US (PREMIUM SPLIT LAYOUT) --}}
        @if(!empty($major->why_us_reasons) && is_array($major->why_us_reasons) && count($major->why_us_reasons) > 0)
        <div class="mb-32 mt-16 bg-white relative">
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-50 rounded-full blur-3xl opacity-60 -z-10"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-cyan-50 rounded-full blur-3xl opacity-60 -z-10"></div>

            <div class="max-w-7xl mx-auto px-4">
                <div class="flex flex-col lg:flex-row gap-16 items-stretch">
                    
                    {{-- ẢNH BÊN TRÁI --}}
                    <div class="w-full lg:w-5/12 relative">
                        <div class="sticky top-24">
                            {{-- Hiệu ứng phát sáng phía sau --}}
                            <div class="absolute -top-6 -left-6 w-24 h-24 bg-yellow-400/20 rounded-full blur-2xl animate-pulse"></div>
                            
                            {{-- Khung ảnh chính --}}
                            <div class="relative z-10 rounded-[2.5rem] overflow-hidden shadow-2xl border-8 border-white aspect-[4/5] group {{ $major->why_us_image ? 'cursor-pointer' : '' }}"
                                 @if($major->why_us_image) onclick="openModal('{{ asset('storage/' . $major->why_us_image) }}')" @endif>
                                
                                @if($major->why_us_image)
                                    {{-- Ảnh hiển thị ngoài (object-cover để lấp đầy tỷ lệ 4:5) --}}
                                    <img src="{{ asset('storage/' . $major->why_us_image) }}" 
                                         class="w-full h-full object-cover transition duration-1000 group-hover:scale-110"
                                         alt="Vì sao chọn {{ $major->name }}">
                                         
                                    {{-- Lớp phủ tối màu khi hover --}}
                                    <div class="absolute inset-0 bg-blue-900/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"></div>
                                    
                                    {{-- Nút Xem ảnh gốc ở chính giữa --}}
                                    <div class="absolute inset-0 flex items-center justify-center z-20 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        <span class="text-white font-bold uppercase tracking-wider text-sm border-2 border-white px-5 py-2 rounded-full backdrop-blur-md bg-black/40 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 shadow-xl">
                                            <i class="fas fa-search-plus mr-2"></i> Xem ảnh 
                                        </span>
                                    </div>
                                @else
                                    <div class="w-full h-full bg-blue-100 flex items-center justify-center">
                                        <i class="fas fa-graduation-cap text-8xl text-blue-200"></i>
                                    </div>
                                @endif
                                
                                {{-- Quote ở dưới cùng (dùng z-30 để luôn nổi lên trên, pointer-events-none để không chặn click) --}}
                                <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-blue-900 via-blue-900/70 to-transparent z-30 pointer-events-none">
                                    <p class="text-white font-medium italic opacity-100 drop-shadow-md">"Môi trường học tập năng động, bám sát thực tế doanh nghiệp."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- NỘI DUNG BÊN PHẢI --}}
                    <div class="w-full lg:w-7/12 flex flex-col">
                        <div class="mb-10">
                            <div class="inline-flex items-center gap-2 bg-red-50 text-red-600 px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-widest mb-4">
                                <span class="w-2 h-2 bg-red-600 rounded-full"></span>
                                Điểm khác biệt tại Á Châu
                            </div>
                            
                            <h2 class="text-3xl md:text-5xl font-extrabold text-blue-900 leading-tight text-balance">
                                <span class="block text-gray-700">Lý do nên học</span>
                                <span class="text-blue-700 bg-blue-50/80 px-3 py-2 rounded-xl border border-blue-200 inline-block my-2 text-4xl md:text-5xl font-black">
                                    {{ $major->name }}
                                </span>
                                <span class="block text-blue-800 mt-2">tại Trung Cấp Á Châu</span>
                            </h2>
                            <div class="w-24 h-1.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full mt-6"></div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($major->why_us_reasons as $index => $reason)
                            <div class="bg-white p-7 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-blue-200 transition-all duration-500 group">
                                <div class="space-y-4">
                                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500 shadow-inner">
                                        <i class="{{ $reason['icon'] ?? 'fas fa-star' }} text-2xl"></i>
                                    </div>
                                    <div class="space-y-2">
                                        <h3 class="text-xl font-extrabold text-gray-900 group-hover:text-blue-700 transition duration-300 leading-tight">
                                            {{ $reason['title'] ?? 'Lý do cốt lõi' }}
                                        </h3>
                                        <p class="text-gray-500 leading-relaxed text-sm">
                                            {{ $reason['description'] ?? 'Nội dung chi tiết' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="mt-10 p-6 bg-blue-900 rounded-3xl flex flex-col md:flex-row items-center justify-between gap-6 shadow-lg shadow-blue-900/20">
                            <div class="text-white text-center md:text-left">
                                <p class="font-bold text-lg">Bạn còn thắc mắc về ngành học?</p>
                                <p class="text-blue-200 text-sm">Đội ngũ tư vấn sẵn sàng hỗ trợ bạn ngay!</p>
                            </div>
                            <a href="#dang-ky" class="bg-yellow-400 hover:bg-yellow-300 text-blue-900 font-black px-8 py-3 rounded-2xl transition transform hover:scale-105 active:scale-95 whitespace-nowrap">
                                Nhận tư vấn miễn phí
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

       {{-- 5. CAREER (ZIG ZAG) --}}
        @if($major->career_titles || $major->career_places)
        <div class="mb-32 space-y-24 mt-16">
            {{-- TIÊU ĐỀ CHÍNH --}}
            <div class="text-center mb-16 relative">
                <h2 class="text-3xl md:text-4xl font-extrabold text-blue-900 uppercase inline-block relative z-10 bg-white px-6">
                    Cơ hội nghề nghiệp của ngành <span class="text-blue-500">{{ $major->name }}</span>
                </h2>
                <div class="absolute top-1/2 left-0 w-full h-px bg-blue-200 -z-0"></div>
            </div>

            {{-- PHẦN 1: LÀM NGHỀ GÌ? --}}
            @if($major->career_titles)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                
                {{-- ẢNH BÊN TRÁI --}}
                <div class="relative group">
                    {{-- Khối màu vàng trang trí phía sau --}}
                    <div class="absolute -top-6 -bottom-6 -left-6 right-12 bg-yellow-100/50 rounded-[2rem] -z-10 transform -rotate-2"></div>
                    
                    {{-- Khung ảnh chính --}}
                    <div class="relative z-10 rounded-2xl shadow-xl overflow-hidden bg-white border border-gray-100 transition-transform duration-500 hover:-translate-y-2 {{ $major->career_titles_image ? 'cursor-pointer' : '' }}"
                         @if($major->career_titles_image) onclick="openModal('{{ asset('storage/' . $major->career_titles_image) }}')" @endif>
                        
                        {{-- Dùng object-cover và tỷ lệ cố định (vd: 4/3 hoặc vuông) nếu muốn ảnh đều nhau, hoặc để h-auto nếu muốn giữ nguyên tỷ lệ gốc --}}
                        <img src="{{ $major->career_titles_image ? asset('storage/' . $major->career_titles_image) : 'https://via.placeholder.com/600x600' }}" 
                             class="w-full h-auto object-cover" alt="Nghề nghiệp ngành {{ $major->name }}">
                        
                        @if($major->career_titles_image)
                            {{-- Lớp phủ và nút XEM ẢNH GỐC --}}
                            <div class="absolute inset-0 bg-blue-900/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"></div>
                            <div class="absolute inset-0 flex items-center justify-center z-20 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <span class="text-white font-bold uppercase tracking-wider text-sm border-2 border-white px-5 py-2 rounded-full backdrop-blur-md bg-black/40 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 shadow-xl">
                                    <i class="fas fa-search-plus mr-2"></i> Xem ảnh 
                                </span>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- NỘI DUNG BÊN PHẢI --}}
                <div>
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-1.5 h-10 bg-red-600 rounded-full"></div>
                        <h3 class="text-2xl font-bold text-blue-900 leading-tight">Ngành <span class="text-blue-600">{{ $major->name }}</span> ra trường làm nghề gì?</h3>
                    </div>
                    <div class="career-content prose prose-lg text-gray-600 max-w-none">
                        {!! \App\Helpers\HtmlHelper::clean($major->career_titles) !!}
                    </div>
                </div>
            </div>
            @endif

            {{-- PHẦN 2: LÀM Ở ĐÂU? --}}
            @if($major->career_places)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                
                {{-- NỘI DUNG BÊN TRÁI --}}
                <div class="order-2 lg:order-1">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-1.5 h-10 bg-red-600 rounded-full"></div>
                        <h3 class="text-2xl font-bold text-blue-900 leading-tight">Ngành <span class="text-blue-600">{{ $major->name }}</span> ra trường làm ở đâu?</h3>
                    </div>
                    <div class="career-content prose prose-lg text-gray-600 max-w-none">
                        {!! \App\Helpers\HtmlHelper::clean($major->career_places) !!}
                    </div>
                </div>

                {{-- ẢNH BÊN PHẢI --}}
                <div class="relative group order-1 lg:order-2">
                    {{-- Khối màu vàng trang trí phía sau (cắt xéo) --}}
                    <div class="absolute -top-8 -bottom-8 left-12 -right-6 bg-yellow-50 rounded-3xl -z-10 transform rotate-3" style="clip-path: polygon(0 10%, 100% 0, 100% 100%, 0 90%);"></div>
                    
                    {{-- Khung ảnh chính --}}
                    <div class="relative z-10 rounded-2xl shadow-xl overflow-hidden bg-white border border-gray-100 transition-transform duration-500 hover:-translate-y-2 {{ $major->career_places_image ? 'cursor-pointer' : '' }}"
                         @if($major->career_places_image) onclick="openModal('{{ asset('storage/' . $major->career_places_image) }}')" @endif>
                        
                        <img src="{{ $major->career_places_image ? asset('storage/' . $major->career_places_image) : 'https://via.placeholder.com/600x500' }}" 
                             class="w-full h-auto object-cover" alt="Nơi làm việc ngành {{ $major->name }}">
                        
                        @if($major->career_places_image)
                            {{-- Lớp phủ và nút XEM ẢNH GỐC --}}
                            <div class="absolute inset-0 bg-blue-900/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"></div>
                            <div class="absolute inset-0 flex items-center justify-center z-20 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <span class="text-white font-bold uppercase tracking-wider text-sm border-2 border-white px-5 py-2 rounded-full backdrop-blur-md bg-black/40 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 shadow-xl">
                                    <i class="fas fa-search-plus mr-2"></i> Xem ảnh 
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
        
        {{-- CSS TUỲ CHỈNH CHO LIST TRONG PHẦN CAREER --}}
        <style>
            .career-content p {
                margin-bottom: 1.5rem;
                text-align: justify;
                line-height: 1.7;
            }
            .career-content strong {
                color: #1e3a8a; /* blue-900 */
                display: block;
                margin-bottom: 1rem;
                font-size: 1.125rem;
            }
            .career-content ul { 
                list-style: none !important; 
                padding-left: 0 !important; 
            }
            .career-content ul li { 
                position: relative; 
                padding-left: 2.5rem; 
                margin-bottom: 1rem; 
                line-height: 1.6;
                color: #4b5563; /* gray-600 */
            }
            .career-content ul li::before { 
                content: '\f00c'; /* Unicode của dấu tick FontAwesome */
                font-family: 'Font Awesome 5 Free'; /* Hoặc Font Awesome 6 Free */
                font-weight: 900;
                position: absolute; 
                left: 0; 
                top: 0.2rem; 
                color: #3b82f6; /* blue-500 */
                font-size: 1rem; 
                background-color: #eff6ff; /* blue-50 */
                width: 1.75rem; 
                height: 1.75rem; 
                border-radius: 50%; 
                display: flex; 
                align-items: center; 
                justify-content: center; 
            }
        </style>
        @endif
        {{-- 6. LỘ TRÌNH HỌC TẬP --}}
        @if(!empty($major->roadmap))
        <div id="roadmap" class="mb-24 scroll-mt-24">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-bold tracking-widest uppercase text-sm bg-blue-50 px-4 py-1 rounded-full">Kế hoạch đào tạo</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-blue-900 mt-3">Lộ trình học tập chi tiết</h2>
                <p class="text-gray-500 mt-2"><i class="far fa-clock mr-2"></i>Tổng thời gian đào tạo: <strong>{{ $major->duration }}</strong></p>
            </div>

            <div class="max-w-5xl mx-auto relative">
                <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-blue-200 border-l-2 border-dashed border-blue-300 transform -translate-x-1/2"></div>

                @foreach($major->roadmap as $key => $step)
                <div class="relative mb-12 last:mb-0">
                    <div class="absolute left-4 md:left-1/2 top-0 w-10 h-10 rounded-full bg-white border-4 border-blue-600 text-blue-700 font-bold flex items-center justify-center shadow-lg transform -translate-x-1/2 z-10">
                        {{ $key + 1 }}
                    </div>
                    <div class="ml-16 md:ml-0 flex flex-col md:flex-row {{ ($key % 2 == 0) ? 'md:flex-row-reverse' : '' }} items-start">
                        <div class="hidden md:block md:w-1/2"></div>
                        <div class="w-full md:w-1/2 {{ ($key % 2 == 0) ? 'md:pl-12' : 'md:pr-12' }}">
                            <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:-translate-y-1 transition duration-300 group">
                                <div class="w-full h-40 rounded-xl overflow-hidden mb-4 bg-gray-100 relative">
                                    @if(isset($step['image']))
                                        <img src="{{ asset('storage/' . $step['image']) }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                                    @else
                                        <div class="flex items-center justify-center h-full text-blue-200"><i class="fas fa-book-open text-4xl"></i></div>
                                    @endif
                                    <div class="absolute top-2 left-2 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                                        Giai đoạn {{ $key + 1 }}
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-blue-900 mb-2">{{ $step['title'] ?? 'Nội dung học tập' }}</h3>
                                <p class="text-gray-600 text-sm leading-relaxed text-justify">
                                    {{ $step['description'] ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="absolute left-4 md:left-1/2 bottom-0 transform -translate-x-1/2 translate-y-full text-blue-300 pt-2">
                    <i class="fas fa-chevron-down text-2xl animate-bounce"></i>
                </div>
            </div>
        </div>
        @endif

        {{-- 7. ĐIỂM NỔI BẬT --}}
        @if(!empty($major->program_advantages))
        <div class="mt-16 mb-12">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-blue-900 leading-tight">
                        Điểm nổi bật khi học <span class="text-blue-600">{{ $major->name }}</span> <br>
                        tại Trường Trung Cấp Á Châu
                    </h2>
                    <div class="w-24 h-1 bg-blue-600 mx-auto mt-6 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($major->program_advantages as $item)
                    <div class="bg-white rounded-xl p-8 border border-gray-200 hover:border-blue-300 hover:shadow-xl hover:-translate-y-1 transition duration-300 group h-full">
                        <div class="flex flex-col items-start gap-5">
                            <div class="text-4xl text-gray-700 group-hover:text-blue-600 transition-colors duration-300">
                                <i class="{{ $item['icon'] ?? 'fas fa-check-circle' }}"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-700 transition leading-snug">
                                {{ $item['title'] ?? 'Tiêu đề điểm nổi bật' }}
                            </h3>
                        </div>
                        <div class="w-12 h-0.5 bg-gray-100 my-4 group-hover:bg-blue-100 transition"></div>
                        <p class="text-gray-500 leading-relaxed text-sm text-justify">
                            {{ $item['description'] ?? 'Nội dung mô tả ngắn gọn về điểm nổi bật này.' }}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

    </div> {{-- KẾT THÚC DIV CONTAINER MAX-W-7XL --}}

    {{-- 8. FORM ĐĂNG KÝ (NẰM NGOÀI CONTAINER ĐỂ FULL WIDTH, NHƯNG VẪN TRONG MAIN) --}}
    <section id="dang-ky" class="relative py-16 md:py-24 bg-blue-900 text-white overflow-hidden">
        
        {{-- Background Effects --}}
        <div class="absolute inset-0 opacity-10" 
             style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png'); background-repeat: repeat;">
        </div>
        <div class="absolute inset-0 bg-gradient-to-br from-blue-950 via-blue-900 to-indigo-900/90 pointer-events-none"></div>
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500/30 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 w-80 h-80 bg-yellow-500/10 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
                
                {{-- CỘT TRÁI: TEXT --}}
                <div class="lg:col-span-5 space-y-8">
                    <div>
                        <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 px-4 py-2 rounded-full mb-6 backdrop-blur-md shadow-lg">
                            <span class="relative flex h-3 w-3">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-3 w-3 bg-yellow-500"></span>
                            </span>
                            <span class="text-yellow-300 font-bold text-xs uppercase tracking-widest">Cổng tuyển sinh 2026</span>
                        </div>
                        
                        <h2 class="text-3xl md:text-5xl font-black leading-tight mb-4 text-white">
                            Đăng ký xét tuyển <br>
                            <span class="text-yellow-400 drop-shadow-md">
                                {{ $major->name }}
                            </span>
                        </h2>
                        
                        <p class="text-blue-100 text-lg font-light leading-relaxed">
                            Điền thông tin để nhận tư vấn lộ trình và <span class="text-white font-bold border-b border-yellow-400">ưu đãi học phí 100% </span> ngay hôm nay.
                        </p>
                    </div>

                    <ul class="space-y-4">
                        @foreach(['Tư vấn 1:1 miễn phí', 'Xét tuyển online nhanh chóng', 'Hỗ trợ giới thiệu việc làm', 'Chứng chỉ chuẩn Quốc gia'] as $item)
                        <li class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full bg-blue-800/80 border border-blue-600 flex items-center justify-center text-yellow-400 shadow-md">
                                <i class="fas fa-check text-xs"></i>
                            </div>
                            <span class="text-blue-50 font-medium">{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- CỘT PHẢI: FORM STYLE KÍNH PHA LÊ --}}
                <div class="lg:col-span-7">
                    <div class="relative group">
                        <div class="absolute -inset-0.5 bg-gradient-to-b from-white/30 to-white/0 rounded-[2rem] blur-sm opacity-50"></div>
                        
                        <div class="relative bg-white/10 backdrop-blur-2xl rounded-[2rem] p-8 md:p-10 border border-white/20 shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)]">
                            
                            {{-- THÔNG BÁO THÀNH CÔNG --}}
                            @if(session('success'))
                            <div id="success-alert" class="mb-8 bg-green-600 border-l-4 border-green-300 p-4 rounded-lg shadow-lg flex items-start gap-4 animate-bounce">
                                <div class="bg-white/20 rounded-full p-2 mt-1">
                                    <i class="fas fa-check text-white text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white text-lg">Đăng ký thành công!</h4>
                                    <p class="text-green-100 text-sm">{{ session('success') }}</p>
                                </div>
                            </div>
                            @endif

                            @if(!session('success'))
                            <div class="mb-8 text-center border-b border-white/10 pb-6">
                                <h3 class="text-2xl font-bold text-white uppercase tracking-wide">Thông tin thí sinh</h3>
                                <p class="text-blue-200 text-sm mt-1">Vui lòng điền thông tin chính xác để nhà trường liên hệ</p>
                            </div>
                            @endif

                            <form action="{{ route('candidate.store') }}" method="POST" class="space-y-5">
                                @csrf
                                <input type="hidden" name="major_id" value="{{ $major->id }}">

                                {{-- Input Họ tên --}}
                                <div class="group/input">
                                    <label class="block text-xs font-bold text-blue-200 uppercase mb-2 ml-1">Họ và tên *</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-blue-300">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <input type="text" name="name" required value="{{ old('name') }}" placeholder="Ví dụ: Nguyễn Văn An" 
                                               class="w-full pl-11 pr-4 py-4 rounded-xl bg-blue-950/40 border border-blue-400/30 text-white placeholder-blue-300/50 focus:bg-blue-900/60 focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 outline-none transition-all font-bold shadow-inner">
                                    </div>
                                    @error('name') <p class="text-red-300 text-xs mt-1 ml-1 italic"><i class="fas fa-exclamation-triangle mr-1"></i>{{ $message }}</p> @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    {{-- Input Số điện thoại --}}
                                    <div class="group/input">
                                        <label class="block text-xs font-bold text-blue-200 uppercase mb-2 ml-1">Số điện thoại *</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-blue-300">
                                                <i class="fas fa-phone-alt"></i>
                                            </div>
                                            <input type="tel" 
                                                   name="phone" 
                                                   required 
                                                   value="{{ old('phone') }}" 
                                                   pattern="0[0-9]{9}" 
                                                   minlength="10" 
                                                   maxlength="10"
                                                   oninvalid="this.setCustomValidity('Vui lòng nhập đúng 10 số điện thoại (VD: 0912345678)')"
                                                   oninput="this.setCustomValidity('')" 
                                                   placeholder="Nhập SĐT..." 
                                                   class="w-full pl-11 pr-4 py-4 rounded-xl bg-blue-950/40 border border-blue-400/30 text-white placeholder-blue-300/50 focus:bg-blue-900/60 focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 outline-none transition-all font-bold shadow-inner">
                                        </div>
                                        @error('phone') <p class="text-red-300 text-xs mt-1 ml-1 italic"><i class="fas fa-exclamation-triangle mr-1"></i>{{ $message }}</p> @enderror
                                    </div>

                                    {{-- Input Email --}}
                                    <div class="group/input">
                                        <label class="block text-xs font-bold text-blue-200 uppercase mb-2 ml-1 flex justify-between">
                                            <span>Email</span>
                                            <span class="text-blue-400 normal-case font-normal text-[10px] bg-blue-900/50 px-2 py-0.5 rounded">(Nếu có)</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-blue-300">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <input type="email" name="email" value="{{ old('email') }}" placeholder="example@gmail.com" 
                                                   class="w-full pl-11 pr-4 py-4 rounded-xl bg-blue-950/40 border border-blue-400/30 text-white placeholder-blue-300/50 focus:bg-blue-900/60 focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 outline-none transition-all font-medium shadow-inner">
                                        </div>
                                        @error('email') <p class="text-red-300 text-xs mt-1 ml-1 italic"><i class="fas fa-exclamation-triangle mr-1"></i>{{ $message }}</p> @enderror
                                    </div>
                                </div>

                                {{-- Nút Gửi --}}
                                <button type="submit" 
                                        class="w-full group relative overflow-hidden bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-500 hover:from-yellow-300 hover:to-orange-400 text-blue-950 font-black text-lg py-5 rounded-xl shadow-[0_10px_40px_-10px_rgba(234,179,8,0.5)] transform hover:-translate-y-1 transition-all duration-300 mt-4 border border-yellow-300/50">
                                    <span class="relative flex items-center justify-center gap-3 uppercase tracking-wider z-10">
                                        Gửi đăng ký ngay
                                        <i class="fas fa-paper-plane group-hover:translate-x-1 transition-transform"></i>
                                    </span>
                                    <div class="absolute inset-0 bg-white/30 skew-x-12 -translate-x-full group-hover:animate-[shine_0.75s_infinite]"></div>
                                </button>

                                <p class="text-center text-xs text-blue-300/60 pt-2">
                                    <i class="fas fa-shield-alt mr-1"></i> Thông tin được bảo mật theo quy định nhà trường.
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main> {{-- Đóng main --}}

{{-- SCRIPT TỰ ĐỘNG CUỘN --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if($errors->any() || session('success'))
            const formSection = document.getElementById('dang-ky');
            if (formSection) {
                formSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        @endif
    });
</script>

{{-- STYLE HIỆU ỨNG --}}
<style>
    @keyframes shine {
        100% { left: 125%; }
    }
</style>
{{-- LIGHTBOX MODAL ĐỂ XEM ẢNH GỐC --}}
<div id="imageModal" class="fixed inset-0 z-[9999] bg-black/95 hidden flex-col items-center justify-center backdrop-blur-md transition-opacity duration-300 opacity-0" onclick="closeModal()">
    
    {{-- Nút đóng --}}
    <button class="absolute top-6 right-6 text-white/70 hover:text-white text-5xl font-light cursor-pointer focus:outline-none transition-colors duration-200 z-50">
        &times;
    </button>
    
    {{-- Nội dung ảnh (Chứa ảnh gốc không bị cắt xén) --}}
    <div class="relative w-full h-full flex items-center justify-center p-4 md:p-12">
        {{-- Dùng object-contain để hiển thị toàn bộ ảnh gốc (ngang/dọc/vuông) --}}
        <img id="modalImg" src="" class="max-w-full max-h-full rounded-xl shadow-2xl transform scale-95 transition-transform duration-300 object-contain" alt="Phóng to ảnh">
    </div>
</div>

<script>
    // Logic xử lý bật/tắt Modal ảnh
    function openModal(src) {
        const modal = document.getElementById('imageModal');
        const img = document.getElementById('modalImg');
        
        img.src = src; // Gắn link ảnh gốc vào popup
        modal.classList.remove('hidden'); // Hiển thị khung popup
        
        // Timeout nhỏ để tạo hiệu ứng mượt mà
        requestAnimationFrame(() => {
            modal.classList.remove('opacity-0');
            img.classList.replace('scale-95', 'scale-100');
        });
        
        // Khóa cuộn trang khi đang xem ảnh
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        const img = document.getElementById('modalImg');
        
        modal.classList.add('opacity-0');
        img.classList.replace('scale-100', 'scale-95');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            img.src = ''; // Xóa source cũ đi
            document.body.style.overflow = ''; // Mở lại cuộn trang
        }, 300);
    }
    
    // Đóng popup bằng nút ESC trên bàn phím
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('imageModal').classList.contains('hidden')) {
            closeModal();
        }
    });
</script>
@include('components.footer')