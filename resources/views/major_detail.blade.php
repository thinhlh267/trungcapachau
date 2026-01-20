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
        <div class="mb-24">
            <div class="text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Ngành <span class="text-blue-600">{{ $major->name }}</span> là gì?</h2>
                <div class="w-24 h-1.5 bg-blue-600 mx-auto rounded-full mb-8"></div>
            </div>
            
            {{-- SỬA Ở ĐÂY: thay md:text-center bằng text-justify --}}
            <div class="prose prose-lg max-w-4xl mx-auto text-gray-600 leading-relaxed text-justify mb-12">{!! $major->overview !!}</div>
            
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
        <div class="mb-24 mt-24">
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
    <section id="dang-ky" class="relative py-16 md:py-24 bg-blue-900 text-white overflow-hidden mt-24">
        
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
                            Điền thông tin để nhận tư vấn lộ trình và <span class="text-white font-bold border-b border-yellow-400">ưu đãi học phí 30%</span> ngay hôm nay.
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

@include('components.footer')