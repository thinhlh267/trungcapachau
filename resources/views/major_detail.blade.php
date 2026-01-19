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
    
    <div class="max-w-7xl mx-auto px-4 py-16">
        
        {{-- 2. INTRO CARD --}}
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 md:p-12 flex flex-col lg:flex-row gap-12 items-center mb-20 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-blue-50/50 skew-x-12 translate-x-1/4 z-0"></div>
            <div class="flex-1 relative z-10 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-1 bg-green-500 rounded-full"></div>
                    <span class="uppercase tracking-widest text-sm font-bold text-gray-500">{{ $major->department ?? 'Khoa Đào Tạo' }}</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-extrabold text-blue-900 leading-tight text-balance">{{ $major->name }}</h2>
                <div class="text-gray-600 text-lg leading-relaxed text-justify prose prose-blue max-w-none">
                    {!! $major->description ?? 'Nội dung đang được cập nhật...' !!}
                </div>
                <div class="pt-4 flex flex-wrap gap-4">
                    <a href="#dang-ky" class="bg-red-600 text-white font-bold px-8 py-3 rounded-full shadow-lg hover:bg-red-700 transition transform hover:-translate-y-1">Đăng ký ngay</a>
                    <a href="#roadmap" class="text-blue-700 font-bold px-6 py-3 hover:underline flex items-center gap-2">Xem lộ trình <i class="fas fa-arrow-down"></i></a>
                </div>
            </div>
            <div class="w-full lg:w-5/12 relative z-10 flex justify-center">
                <div class="relative w-full max-w-md aspect-square">
                    <div class="absolute inset-0 bg-blue-600 rounded-full opacity-10 scale-110 animate-pulse"></div>
                    <div class="absolute inset-4 bg-gradient-to-br from-blue-500 to-cyan-400 rounded-full shadow-2xl overflow-hidden border-4 border-white">
                        @if($major->intro_image)
                            <img src="{{ asset('storage/' . $major->intro_image) }}" class="w-full h-full object-cover hover:scale-110 transition duration-700">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-blue-100 text-blue-300"><i class="fas fa-image text-4xl"></i></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- 3. ĐỊNH NGHĨA NGÀNH --}}
        @if($major->overview)
        <div class="mb-24 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Ngành <span class="text-blue-600">{{ $major->name }}</span> là gì?</h2>
            <div class="w-24 h-1.5 bg-blue-600 mx-auto rounded-full mb-8"></div>
            <div class="prose prose-lg max-w-4xl mx-auto text-gray-600 leading-relaxed text-justify md:text-center mb-12">{!! $major->overview !!}</div>
            @if(!empty($major->gallery) && count($major->gallery) > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($major->gallery as $key => $img)
                @if($key < 3) 
                <div class="group relative aspect-[4/3] rounded-2xl overflow-hidden shadow-lg cursor-pointer hover:-translate-y-2 transition duration-300">
                    <img src="{{ asset('storage/' . $img) }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end justify-center pb-6">
                        <span class="text-white font-bold uppercase tracking-wider text-sm border border-white px-4 py-2 rounded-full">Xem ảnh</span>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            @endif
        </div>
        @endif

        {{-- 4. WHY US --}}
        @if(!empty($major->why_us_reasons) && is_array($major->why_us_reasons) && count($major->why_us_reasons) > 0)
        <div class="mb-32 mt-16 bg-white relative">
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-50 rounded-full blur-3xl opacity-60 -z-10"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-cyan-50 rounded-full blur-3xl opacity-60 -z-10"></div>

            <div class="max-w-7xl mx-auto px-4">
                <div class="flex flex-col lg:flex-row gap-16 items-stretch">
                    
                    {{-- ẢNH BÊN TRÁI --}}
                    <div class="w-full lg:w-5/12 relative">
                        <div class="sticky top-24">
                            <div class="absolute -top-6 -left-6 w-24 h-24 bg-yellow-400/20 rounded-full blur-2xl animate-pulse"></div>
                            <div class="relative z-10 rounded-[2.5rem] overflow-hidden shadow-2xl border-8 border-white aspect-[4/5]">
                                @if($major->why_us_image)
                                    <img src="{{ asset('storage/' . $major->why_us_image) }}" 
                                        class="w-full h-full object-cover transition duration-1000 hover:scale-110">
                                @else
                                    <div class="w-full h-full bg-blue-100 flex items-center justify-center">
                                        <i class="fas fa-graduation-cap text-8xl text-blue-200"></i>
                                    </div>
                                @endif
                                <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-blue-900 via-blue-900/60 to-transparent">
                                    <p class="text-white font-medium italic opacity-90">"Môi trường học tập năng động, bám sát thực tế doanh nghiệp."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- NỘI DUNG BÊN PHẢI --}}
                    <div class="w-full lg:w-7/12 flex flex-col">
                        <div class="mb-10">
                            {{-- BADGE --}}
                            <div class="inline-flex items-center gap-2 bg-red-50 text-red-600 px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-widest mb-4">
                                <span class="w-2 h-2 bg-red-600 rounded-full"></span>
                                Điểm khác biệt tại Á Châu
                            </div>
                            
                            {{-- TIÊU ĐỀ - ĐÃ FIX MÀU --}}
                            <h2 class="text-3xl md:text-5xl font-extrabold text-blue-900 leading-tight text-balance">
                                <span class="block text-gray-700">Lý do nên học</span>
                                
                                {{-- TÊN NGÀNH - HIỂN THỊ RÕ RÀNG --}}
                                <span class="text-blue-700 bg-blue-50/80 px-3 py-2 rounded-xl border border-blue-200 
                                        inline-block my-2 text-4xl md:text-5xl font-black">
                                    {{ $major->name }}
                                </span>
                                
                                <span class="block text-blue-800 mt-2">tại Trung Cấp Á Châu</span>
                            </h2>
                            
                            {{-- GẠCH CHÂN --}}
                            <div class="w-24 h-1.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full mt-6"></div>
                        </div>
                        
                        {{-- Grid lý do --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($major->why_us_reasons as $index => $reason)
                            <div class="bg-white p-7 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-blue-200 transition-all duration-500 group">
                                <div class="space-y-4">
                                    {{-- Icon --}}
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

                        {{-- CTA --}}
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
        <div class="mb-24 space-y-20">
            <div class="text-center mb-16 relative">
                <h2 class="text-3xl md:text-4xl font-extrabold text-blue-900 uppercase inline-block relative z-10 bg-white px-4">
                    Cơ hội nghề nghiệp của ngành <span class="text-blue-500">{{ $major->name }}</span>
                </h2>
                <div class="absolute top-1/2 left-0 w-full h-px bg-blue-100 -z-0"></div>
            </div>

            @if($major->career_titles)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="relative group h-full min-h-[350px]">
                    <div class="absolute inset-0 bg-blue-50 rounded-tr-[80px] rounded-bl-[80px] transform rotate-3 transition duration-500 group-hover:rotate-0 border-2 border-dashed border-blue-200"></div>
                    <img src="{{ $major->career_titles_image ? asset('storage/' . $major->career_titles_image) : 'https://via.placeholder.com/600x400' }}" class="relative z-10 w-full h-full rounded-tr-[80px] rounded-bl-[80px] shadow-xl object-cover transform transition duration-500 hover:scale-[1.02]">
                </div>
                <div class="pl-0 lg:pl-6">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-1.5 h-12 bg-red-600 rounded-full"></div>
                        <h3 class="text-2xl font-bold text-gray-800 leading-tight">Ngành <span class="text-blue-700">{{ $major->name }}</span> ra trường làm nghề gì?</h3>
                    </div>
                    <div class="career-content prose prose-lg text-gray-600">{!! $major->career_titles !!}</div>
                </div>
            </div>
            @endif

            @if($major->career_places)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1 pr-0 lg:pr-6">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-1.5 h-12 bg-red-600 rounded-full"></div>
                        <h3 class="text-2xl font-bold text-gray-800 leading-tight">Ngành <span class="text-blue-700">{{ $major->name }}</span> ra trường làm ở đâu?</h3>
                    </div>
                    <div class="career-content prose prose-lg text-gray-600">{!! $major->career_places !!}</div>
                </div>
                <div class="relative group h-full min-h-[350px] order-1 lg:order-2">
                    <div class="absolute inset-0 bg-yellow-50 rounded-tl-[80px] rounded-br-[80px] transform -rotate-3 transition duration-500 group-hover:rotate-0 border-2 border-dashed border-yellow-200"></div>
                    <img src="{{ $major->career_places_image ? asset('storage/' . $major->career_places_image) : 'https://via.placeholder.com/600x400' }}" class="relative z-10 w-full h-full rounded-tl-[80px] rounded-br-[80px] shadow-xl object-cover transform transition duration-500 hover:scale-[1.02]">
                </div>
            </div>
            @endif
        </div>
        <style>
            .career-content ul { list-style: none !important; padding-left: 0 !important; }
            .career-content ul li { position: relative; padding-left: 2rem; margin-bottom: 0.75rem; line-height: 1.6; }
            .career-content ul li::before { content: '✓'; position: absolute; left: 0; top: 0; color: #2563eb; font-weight: 900; font-size: 1.1rem; background-color: #eff6ff; width: 1.5rem; height: 1.5rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; }
        </style>
        @endif

        {{-- 6. LỘ TRÌNH HỌC TẬP (NEW DESIGN: CENTERED & CLEAN) --}}
        @if(!empty($major->roadmap))
        <div id="roadmap" class="mb-24 scroll-mt-24">
            {{-- Tiêu đề chính --}}
            <div class="text-center mb-16">
                <span class="text-blue-600 font-bold tracking-widest uppercase text-sm bg-blue-50 px-4 py-1 rounded-full">Kế hoạch đào tạo</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-blue-900 mt-3">Lộ trình học tập chi tiết</h2>
                <p class="text-gray-500 mt-2"><i class="far fa-clock mr-2"></i>Tổng thời gian đào tạo: <strong>{{ $major->duration }}</strong></p>
            </div>

            {{-- Timeline Container --}}
            <div class="max-w-5xl mx-auto relative">
                
                {{-- Đường kẻ dọc nối liền (Nét đứt màu xanh) --}}
                <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-blue-200 border-l-2 border-dashed border-blue-300 transform -translate-x-1/2"></div>

                @foreach($major->roadmap as $key => $step)
                <div class="relative mb-12 last:mb-0">
                    
                    {{-- Dấu chấm tròn (Center Dot) --}}
                    <div class="absolute left-4 md:left-1/2 top-0 w-10 h-10 rounded-full bg-white border-4 border-blue-600 text-blue-700 font-bold flex items-center justify-center shadow-lg transform -translate-x-1/2 z-10">
                        {{ $key + 1 }}
                    </div>

                    {{-- Layout: Trên mobile nằm phải, Trên Desktop so le --}}
                    <div class="ml-16 md:ml-0 flex flex-col md:flex-row {{ ($key % 2 == 0) ? 'md:flex-row-reverse' : '' }} items-start">
                        
                        {{-- Khoảng trống bên kia của trục --}}
                        <div class="hidden md:block md:w-1/2"></div>

                        {{-- Card Nội dung --}}
                        <div class="w-full md:w-1/2 {{ ($key % 2 == 0) ? 'md:pl-12' : 'md:pr-12' }}">
                            <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:-translate-y-1 transition duration-300 group">
                                
                                {{-- Ảnh minh họa của kỳ học --}}
                                <div class="w-full h-40 rounded-xl overflow-hidden mb-4 bg-gray-100 relative">
                                    @if(isset($step['image']))
                                        <img src="{{ asset('storage/' . $step['image']) }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                                    @else
                                        <div class="flex items-center justify-center h-full text-blue-200"><i class="fas fa-book-open text-4xl"></i></div>
                                    @endif
                                    
                                    {{-- Badge tên kỳ --}}
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
                
                {{-- Mũi tên kết thúc --}}
                <div class="absolute left-4 md:left-1/2 bottom-0 transform -translate-x-1/2 translate-y-full text-blue-300 pt-2">
                    <i class="fas fa-chevron-down text-2xl animate-bounce"></i>
                </div>
            </div>
        </div>
        @endif

        {{-- 7. ĐIỂM NỔI BẬT (DESIGN HIỆN ĐẠI - CLEAN STYLE) --}}
        @if(!empty($major->program_advantages))
        <div class="mb-24 mt-24">
            <div class="max-w-7xl mx-auto">
                {{-- Tiêu đề Section --}}
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-blue-900 leading-tight">
                        Điểm nổi bật khi học <span class="text-blue-600">{{ $major->name }}</span> <br>
                        tại Trường Trung Cấp Á Châu
                    </h2>
                    <div class="w-24 h-1 bg-blue-600 mx-auto mt-6 rounded-full"></div>
                </div>

                {{-- Grid Content --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($major->program_advantages as $item)
                    <div class="bg-white rounded-xl p-8 border border-gray-200 hover:border-blue-300 hover:shadow-xl hover:-translate-y-1 transition duration-300 group h-full">
                        
                        {{-- Phần Icon & Tiêu đề --}}
                        <div class="flex flex-col items-start gap-5">
                            {{-- Icon: Thiết kế đơn giản, sang trọng (Giống mẫu) --}}
                            <div class="text-4xl text-gray-700 group-hover:text-blue-600 transition-colors duration-300">
                                {{-- Hiển thị icon user đã chọn trong Admin --}}
                                <i class="{{ $item['icon'] ?? 'fas fa-check-circle' }}"></i>
                            </div>

                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-700 transition leading-snug">
                                {{ $item['title'] ?? 'Tiêu đề điểm nổi bật' }}
                            </h3>
                        </div>
                        
                        {{-- Đường gạch mờ ngăn cách (Optional) --}}
                        <div class="w-12 h-0.5 bg-gray-100 my-4 group-hover:bg-blue-100 transition"></div>

                        {{-- Phần Mô tả --}}
                        <p class="text-gray-500 leading-relaxed text-sm text-justify">
                            {{ $item['description'] ?? 'Nội dung mô tả ngắn gọn về điểm nổi bật này.' }}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        </div> {{-- Đóng container max-w-7xl --}}
</main>

{{-- 8. FORM ĐĂNG KÝ NGÀNH HỌC (MẪU MỚI - ĐẸP & CHUYÊN NGHIỆP) --}}
<section id="dang-ky" class="relative py-16 md:py-24 bg-blue-900 text-white overflow-hidden mt-24">
    
    {{-- Lớp nền họa tiết --}}
    <div class="absolute inset-0 opacity-10" 
         style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png'); background-repeat: repeat;">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-blue-900/50 to-blue-950/80 pointer-events-none"></div>

    <div class="relative z-10">
        
        {{-- Header --}}
        <div class="text-center mb-12 max-w-5xl mx-auto px-4 md:px-8 lg:px-12">
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 px-5 py-2.5 rounded-full mb-6">
                <i class="fas fa-graduation-cap text-yellow-300"></i>
                <span class="font-bold text-sm uppercase tracking-widest">Cổng Đăng Ký Trực Tuyến</span>
            </div>
            
            <h2 class="text-3xl md:text-5xl font-black mb-6 leading-tight">
                Đăng ký xét tuyển<br>
                <span class="text-yellow-400">Ngành {{ $major->name }}</span>
            </h2>
            
            <p class="text-blue-100 text-lg md:text-xl mb-12 leading-relaxed font-light max-w-3xl mx-auto">
                Để lại thông tin để nhận <span class="font-bold text-yellow-300">tư vấn chi tiết</span> và 
                <span class="font-bold text-yellow-300">ưu đãi học phí đặc biệt</span> từ Trường Trung cấp Á Châu.
            </p>
        </div>

        {{-- Main Content: Quote + Form --}}
        <div class="bg-white/10 backdrop-blur-md border border-white/20 shadow-2xl mb-12">
            <div class="max-w-5xl mx-auto p-8 md:p-12 relative overflow-hidden">
                
                {{-- Dấu ngoặc kép trang trí chìm --}}
                <i class="fas fa-quote-left text-white opacity-10 text-[8rem] absolute -top-4 -left-4 pointer-events-none"></i>

                <div class="flex flex-col-reverse md:flex-row items-start gap-8 md:gap-12 relative z-10">
                    
                    {{-- 1. Phần Quote/Thông điệp (Bên Trái) --}}
                    <div class="flex-1">
                        <div class="mb-8">
                            <h3 class="text-2xl font-bold mb-4 text-white">Tại sao nên đăng ký ngay?</h3>
                            <ul class="space-y-3 text-blue-100">
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-400 mt-1"></i>
                                    <span>Nhận tư vấn lộ trình học tập cá nhân hóa</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-400 mt-1"></i>
                                    <span>Ưu đãi học phí lên đến <span class="text-yellow-300 font-bold">30%</span></span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-400 mt-1"></i>
                                    <span>Đảm bảo việc làm sau tốt nghiệp</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-400 mt-1"></i>
                                    <span>Hỗ trợ thủ tục nhập học nhanh chóng</span>
                                </li>
                            </ul>
                        </div>
                        
                        {{-- Quote from Director --}}
                        <div class="border-l-4 border-yellow-400 pl-4 py-2 bg-white/5 rounded-r-lg">
                            <p class="text-white italic mb-2">
                                "Chúng tôi cam kết đồng hành cùng bạn trên hành trình phát triển nghề nghiệp."
                            </p>
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-blue-500 flex items-center justify-center">
                                    <i class="fas fa-user-tie text-xs"></i>
                                </div>
                                <span class="text-blue-200 text-sm font-medium">Ban tuyển sinh</span>
                            </div>
                        </div>
                    </div>

                    {{-- 2. Form Đăng Ký (Bên Phải) --}}
                    <div class="flex-shrink-0 w-full md:w-1/2">
                        
                        {{-- Success Message --}}
                        @if(session('success'))
                        <div class="mb-6 bg-gradient-to-r from-green-500/20 to-emerald-500/20 backdrop-blur-sm border border-green-400/30 rounded-xl p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-white">{{ session('success') }}</p>
                                    <p class="text-green-200 text-sm">Chúng tôi sẽ liên hệ bạn trong 5 phút!</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- Form --}}
                        <form action="{{ route('candidate.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <input type="hidden" name="major_id" value="{{ $major->id }}">
                            
                            {{-- Họ và tên --}}
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-blue-200 flex items-center gap-2">
                                    <i class="fas fa-user-circle"></i>
                                    Họ và tên học viên
                                </label>
                                <input type="text" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       required 
                                       placeholder="Nhập họ tên của bạn"
                                       class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white placeholder-blue-300/50 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all font-medium">
                                @error('name')
                                <p class="text-red-300 text-xs mt-1 flex items-center gap-1">
                                    <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                </p>
                                @enderror
                            </div>
                            
                            {{-- Số điện thoại --}}
                            <div class="space-y-2">
                                <label class="text-sm font-semibold text-blue-200 flex items-center gap-2">
                                    <i class="fas fa-phone-alt"></i>
                                    Số điện thoại liên hệ
                                </label>
                                <input type="tel" 
                                       name="phone" 
                                       value="{{ old('phone') }}" 
                                       required 
                                       placeholder="0912 345 678"
                                       class="w-full px-4 py-3 bg-white/5 border border-white/20 rounded-lg text-white placeholder-blue-300/50 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all font-medium">
                                @error('phone')
                                <p class="text-red-300 text-xs mt-1 flex items-center gap-1">
                                    <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                </p>
                                @enderror
                            </div>
                            
                            {{-- Nút Gửi --}}
                            <button type="submit" 
                                    class="w-full py-4 bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-400 hover:to-yellow-500 text-blue-900 font-bold text-lg rounded-lg shadow-lg hover:shadow-yellow-500/30 transform hover:-translate-y-1 active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-3 group">
                                <span>GỬI ĐĂNG KÝ NGAY</span>
                                <i class="fas fa-paper-plane group-hover:translate-x-1 transition-transform"></i>
                            </button>
                            
                            {{-- Assurance --}}
                            <div class="pt-4 border-t border-white/10">
                                <p class="text-center text-blue-200 text-xs">
                                    <i class="fas fa-shield-alt text-green-400 mr-2"></i>
                                    Thông tin được bảo mật tuyệt đối
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Contact Info & CTA --}}
        <div class="text-center max-w-5xl mx-auto px-4 md:px-8 lg:px-12">
            <div class="inline-flex flex-col md:flex-row items-center justify-center gap-6 mb-8">
                <div class="flex items-center gap-3 bg-white/5 backdrop-blur-sm px-6 py-3 rounded-full border border-white/10">
                    <i class="fas fa-headset text-yellow-300 text-xl"></i>
                    <div class="text-left">
                        <p class="text-sm text-blue-200">Hotline hỗ trợ 24/7</p>
                        <a href="tel:02836221199" class="text-white font-bold hover:text-yellow-300 transition">(028) 3622 1199</a>
                    </div>
                </div>
                
                <div class="flex items-center gap-3 bg-white/5 backdrop-blur-sm px-6 py-3 rounded-full border border-white/10">
                    <i class="fas fa-clock text-yellow-300 text-xl"></i>
                    <div class="text-left">
                        <p class="text-sm text-blue-200">Thời gian xử lý</p>
                        <p class="text-white font-bold">5 - 15 phút</p>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
                <a href="#roadmap" 
                   class="group bg-transparent border-2 border-white/30 hover:border-white hover:bg-white/10 text-white 
                          font-bold px-8 py-3 rounded-full transition-all duration-300 
                          flex items-center gap-3 w-full md:w-auto justify-center">
                    <i class="fas fa-road text-yellow-400"></i>
                    <span>Xem lại lộ trình học tập</span>
                </a>
                
                <a href="{{ route('home') }}" 
                   class="group bg-yellow-500 hover:bg-yellow-400 text-blue-900 font-bold px-8 py-3 
                          rounded-full transition-all duration-300 shadow-[0_0_20px_rgba(234,179,8,0.5)] 
                          hover:shadow-[0_0_30px_rgba(234,179,8,0.7)] flex items-center gap-3 w-full md:w-auto justify-center hover:-translate-y-1">
                    <i class="fas fa-home text-xl"></i>
                    <span>Về trang chủ</span>
                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>
    </div>
</section>

    </div>
</main>

@include('components.footer')