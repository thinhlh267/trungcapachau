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
        @if($major->why_us_content)
        <div class="mb-24 bg-blue-50/50 rounded-3xl p-8 md:p-16 border border-blue-100">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="relative order-2 lg:order-1">
                    <div class="absolute -top-4 -left-4 w-full h-full border-2 border-yellow-400 rounded-2xl z-0"></div>
                    <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl">
                        @if($major->why_us_image)
                            <img src="{{ asset('storage/' . $major->why_us_image) }}" class="w-full h-full object-cover hover:scale-105 transition duration-700">
                        @else
                            <div class="bg-gray-200 h-80 flex items-center justify-center text-gray-400"><i class="fas fa-university text-6xl"></i></div>
                        @endif
                    </div>
                </div>
                <div class="order-1 lg:order-2">
                    <h2 class="text-2xl md:text-4xl font-extrabold text-blue-900 mb-6 leading-tight text-balance">
                        Lý do lựa chọn học ngành <span class="text-red-600">{{ $major->name }}</span> tại <span class="text-blue-600">Trung Cấp Á Châu</span>
                    </h2>
                    <div class="prose prose-lg prose-blue max-w-none text-gray-600 text-justify prose-li:marker:text-yellow-500 prose-li:marker:text-2xl">
                        {!! $major->why_us_content !!}
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

        {{-- 8. FORM ĐĂNG KÝ (REDESIGN: MODERN GLASS STYLE) --}}
        <div id="dang-ky" class="mt-32 mb-16 scroll-mt-24">
            <div class="relative bg-gradient-to-br from-blue-900 via-indigo-900 to-blue-950 rounded-3xl shadow-2xl p-8 md:p-14 overflow-hidden group">
                
                {{-- Trang trí nền (Background Effects) --}}
                <div class="absolute top-0 left-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-yellow-500 rounded-full blur-[80px] opacity-20 group-hover:opacity-30 transition duration-1000"></div>
                <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-blue-500 rounded-full blur-[80px] opacity-20 group-hover:opacity-30 transition duration-1000"></div>

                <div class="relative z-10 text-center max-w-4xl mx-auto">
                    
                    {{-- Tiêu đề Form --}}
                    <span class="inline-block py-1 px-3 rounded-full bg-blue-800/50 border border-blue-400/30 text-blue-200 text-xs font-bold uppercase tracking-wider mb-4 shadow-sm backdrop-blur-sm">
                        Cổng đăng ký trực tuyến
                    </span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight">
                        Xét tuyển ngành <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-500">{{ $major->name }}</span>
                    </h2>
                    <p class="text-blue-100 mb-10 text-lg font-light">
                        Để lại thông tin ngay để nhận <span class="font-bold text-yellow-300">ưu đãi học phí</span> và được tư vấn lộ trình miễn phí từ chuyên gia.
                    </p>

                    {{-- THÔNG BÁO THÀNH CÔNG (HIỆN KHI CÓ SESSION SUCCESS) --}}
                    @if(session('success'))
                    <div class="mb-8 bg-green-500/20 border border-green-400/50 text-green-100 px-6 py-4 rounded-xl flex items-center justify-center gap-3 shadow-lg backdrop-blur-md animate-fade-in-up">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-check text-white"></i>
                        </div>
                        <span class="font-bold text-lg">{{ session('success') }}</span>
                    </div>
                    @endif

                    {{-- FORM NHẬP LIỆU --}}
                    <form action="{{ route('candidate.store') }}" method="POST" class="bg-white/10 backdrop-blur-lg border border-white/20 p-8 rounded-3xl shadow-xl">
                        @csrf
                        <input type="hidden" name="major_id" value="{{ $major->id }}">
                        
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                            
                            {{-- Input: Họ và tên --}}
                            <div class="md:col-span-4 text-left">
                                <label class="block text-xs font-bold text-blue-200 uppercase mb-2 ml-1">Họ và tên học viên</label>
                                <div class="relative group/input">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fas fa-user text-blue-300 group-focus-within/input:text-yellow-400 transition-colors"></i>
                                    </div>
                                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Nhập họ tên của bạn..." 
                                           class="w-full pl-11 pr-4 py-4 rounded-xl bg-blue-950/50 border border-blue-400/30 text-white placeholder-blue-300/50 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all shadow-inner font-medium">
                                </div>
                                @error('name') 
                                    <p class="text-red-300 text-xs mt-1 ml-1 italic"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> 
                                @enderror
                            </div>

                            {{-- Input: Số điện thoại --}}
                            <div class="md:col-span-4 text-left">
                                <label class="block text-xs font-bold text-blue-200 uppercase mb-2 ml-1">Số điện thoại liên hệ</label>
                                <div class="relative group/input">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fas fa-phone text-blue-300 group-focus-within/input:text-yellow-400 transition-colors"></i>
                                    </div>
                                    <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="VD: 0912 345 678" 
                                           class="w-full pl-11 pr-4 py-4 rounded-xl bg-blue-950/50 border border-blue-400/30 text-white placeholder-blue-300/50 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition-all shadow-inner font-medium">
                                </div>
                                @error('phone') 
                                    <p class="text-red-300 text-xs mt-1 ml-1 italic"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p> 
                                @enderror
                            </div>

                            {{-- Nút Gửi (CTA) --}}
                            <div class="md:col-span-4 flex items-end">
                                <button type="submit" class="w-full h-[58px] bg-gradient-to-r from-yellow-400 to-yellow-600 hover:from-yellow-300 hover:to-yellow-500 text-blue-900 font-extrabold text-lg rounded-xl shadow-lg hover:shadow-yellow-500/50 transform hover:-translate-y-1 transition duration-300 flex items-center justify-center gap-3 uppercase tracking-wide group/btn">
                                    <span>Gửi yêu cầu ngay</span>
                                    <i class="fas fa-paper-plane group-hover/btn:translate-x-1 transition-transform"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <div class="mt-6 flex flex-col md:flex-row items-center justify-center gap-4 text-sm text-blue-200/80">
                        <span class="flex items-center gap-2"><i class="fas fa-shield-alt text-green-400"></i> Bảo mật thông tin 100%</span>
                        <span class="hidden md:inline">|</span>
                        <span class="flex items-center gap-2"><i class="fas fa-headset text-yellow-400"></i> Hỗ trợ 24/7</span>
                    </div>

                </div>
            </div>
        </div>

    </div>
</main>

@include('components.footer')