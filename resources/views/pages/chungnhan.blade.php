@php
    $currentPage = 'chungnhan';
    $mainMenu = 'tongquan';
@endphp

@include('components.header')

{{-- 1. BANNER HEADER - ĐỒNG BỘ VỚI CÁC TRANG TRƯỚC --}}
<div class="relative h-[400px] md:h-[550px] lg:h-[600px] overflow-hidden bg-blue-900 group">
    
    <div class="absolute inset-0 overflow-hidden">
        <picture>
            <source srcset="{{ asset('images/chungnhan-banner.webp') }}" type="image/webp">
            <source srcset="{{ asset('images/chungnhan-banner.jpg') }}" type="image/jpeg">
            <img src="{{ asset('images/chungnhan-banner.jpg') }}"
                 class="absolute inset-0 w-full h-full object-cover opacity-50"
                 alt="Chứng nhận chất lượng - Trường Trung Cấp Á Châu"
                 loading="eager"
                 width="1920"
                 height="600">
        </picture>
        
        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-blue-900/50 to-blue-900/20"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/30 to-transparent"></div>
    </div>

    <div class="relative z-10 h-full max-w-7xl mx-auto flex flex-col justify-center px-4 md:px-8 text-white">
        <div class="max-w-4xl">
            <div class="inline-flex items-center gap-3 mb-6">
                <span class="text-yellow-400 font-bold uppercase tracking-[0.3em] text-xs md:text-sm 
                           bg-blue-800/50 px-4 py-2 rounded-full backdrop-blur-md border border-yellow-400/30 shadow-lg">
                    <i class="fas fa-award mr-2"></i>Kiểm định chất lượng
                </span>
                <div class="h-px w-12 bg-yellow-400/50"></div>
            </div>

            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black font-bevietnam leading-tight mb-4">
                <span class="text-yellow-400">Chứng nhận</span> & 
                <span class="text-blue-300">Kiểm định chất lượng</span>
            </h1>

            <p class="text-xl md:text-2xl text-blue-100 font-light mb-8 leading-relaxed max-w-2xl">
                Khẳng định chất lượng đào tạo qua các chứng nhận kiểm định quốc gia
            </p>

            <div class="w-32 h-1.5 bg-gradient-to-r from-yellow-500 to-yellow-300 rounded-full mb-8 shadow-lg"></div>

            <div class="flex flex-wrap gap-4 mt-10">
                <a href="#section-chungnhan-1" 
                   class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-bold px-8 py-3 
                          rounded-full transition-all duration-300 transform hover:-translate-y-1 
                          shadow-lg hover:shadow-xl flex items-center gap-2">
                    <span>Xem chứng nhận</span>
                    <i class="fas fa-arrow-down"></i>
                </a>
                <a href="{{ route('page.muctieu') }}" 
                   class="bg-transparent border-2 border-white/50 hover:border-white text-white 
                          font-bold px-8 py-3 rounded-full transition-all duration-300 
                          hover:bg-white/10 backdrop-blur-sm flex items-center gap-2">
                    <i class="fas fa-undo-alt"></i>
                    <span>Về Mục tiêu & Chính sách</span>
                </a>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
        <a href="#section-chungnhan-1" class="animate-bounce">
            <div class="w-6 h-10 border-2 border-white/50 rounded-full flex justify-center">
                <div class="w-1 h-3 bg-white/70 rounded-full mt-2"></div>
            </div>
        </a>
    </div>
</div>

<div id="section-chungnhan-1" class="scroll-mt-20"></div>

<main class="font-bevietnam bg-white">
    
    {{-- 2. GIỚI THIỆU TỔNG QUAN --}}
    <section class="py-12 md:py-16 bg-gradient-to-b from-white to-blue-50/30">
        <div class="max-w-7xl mx-auto px-4">
            
            <div class="text-center mb-12">
                <span class="inline-block text-blue-600 font-bold uppercase tracking-[0.3em] text-sm 
                           bg-blue-50 px-4 py-2 rounded-full mb-4 border border-blue-100">
                    <i class="fas fa-medal mr-2"></i>Chứng nhận quốc gia
                </span>
                <h2 class="text-3xl md:text-5xl font-black text-blue-900 mb-4 leading-tight">
                    Chứng nhận <span class="text-blue-600">kiểm định chất lượng</span>
                </h2>
                <p class="text-gray-600 text-lg max-w-4xl mx-auto">
                    Trường Trung cấp Á Châu đã được công nhận đạt chuẩn kiểm định chất lượng giáo dục nghề nghiệp, 
                    khẳng định uy tín và cam kết về chất lượng đào tạo.
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-yellow-300 rounded-full mx-auto mt-6"></div>
            </div>

            {{-- Stats về chứng nhận --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-blue-100 text-center">
                    <div class="text-4xl font-black text-blue-900 mb-2">2</div>
                    <div class="text-gray-700 font-bold">Loại chứng nhận</div>
                    <div class="text-sm text-gray-500 mt-1">Cơ sở & Chương trình đào tạo</div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-blue-100 text-center">
                    <div class="text-4xl font-black text-blue-900 mb-2">03</div>
                    <div class="text-gray-700 font-bold">Chương trình đạt chuẩn</div>
                    <div class="text-sm text-gray-500 mt-1">Kiểm định chất lượng</div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-blue-100 text-center">
                    <div class="text-4xl font-black text-blue-900 mb-2">100%</div>
                    <div class="text-gray-700 font-bold">Đạt yêu cầu</div>
                    <div class="text-sm text-gray-500 mt-1">Theo tiêu chuẩn Bộ LĐTBXH</div>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. CHỨNG NHẬN 1: KIỂM ĐỊNH CƠ SỞ GIÁO DỤC NGHỀ NGHIỆP --}}
    <section id="section-chungnhan-1" class="py-12 md:py-16 bg-gradient-to-b from-blue-50/50 to-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-12 items-center">
                
                {{-- Cột trái: Hình ảnh chứng nhận --}}
                <div class="relative order-1">
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[110%] h-[110%] bg-yellow-100/50 rounded-full blur-3xl -z-10"></div>
                    
                    <div class="relative overflow-hidden rounded-3xl shadow-2xl group">
                        <picture>
                            <source srcset="{{ asset('images/chungnhan-coso.webp') }}" type="image/webp">
                            <source srcset="{{ asset('images/chungnhan-coso.jpg') }}" type="image/jpeg">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                                 data-src="{{ asset('images/chungnhan-coso.jpg') }}"
                                 alt="Chứng nhận kiểm định cơ sở giáo dục nghề nghiệp"
                                 class="lazy-image w-full h-[400px] md:h-[550px] object-cover transition duration-700 group-hover:scale-105"
                                 loading="lazy">
                        </picture>
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-transparent to-transparent flex items-end p-8">
                            <div class="text-white transform translate-y-2 group-hover:translate-y-0 transition duration-500">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-8 h-1 bg-yellow-400 rounded-full"></div>
                                    <span class="text-yellow-400 font-bold uppercase tracking-widest text-xs">Chứng nhận cấp cơ sở</span>
                                </div>
                                <p class="text-xl md:text-2xl font-bold leading-tight">"Đạt chuẩn kiểm định chất lượng GDNN"</p>
                            </div>
                        </div>
                    </div>

                    {{-- Badge số 01 --}}
                    <div class="absolute -top-6 -right-6 z-20">
                        <div class="bg-yellow-400 text-blue-900 rounded-2xl w-20 h-20 md:w-24 md:h-24 flex flex-col justify-center items-center text-center shadow-xl border-4 border-white transform -rotate-3 hover:rotate-0 transition duration-300">
                            <span class="text-3xl md:text-4xl font-black">01</span>
                            <span class="text-[10px] md:text-xs font-bold uppercase">Cơ sở GDNN</span>
                        </div>
                    </div>
                </div>

                {{-- Cột phải: Nội dung chứng nhận 1 --}}
                {{-- Cột phải: Nội dung chứng nhận 1 --}}
<div class="space-y-6 order-2">
    <div>
        <div class="inline-flex items-center gap-3 mb-4">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-building text-xl text-blue-600"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-black text-blue-900">CHỨNG NHẬN CƠ SỞ</h2>
        </div>
        
        <div class="bg-white p-6 rounded-2xl shadow-lg border border-blue-100 mb-6 relative z-10">
            <p class="text-gray-700 text-lg leading-relaxed text-justify">
                <span class="font-bold text-blue-900 text-xl block mb-3">
                    Công nhận đạt chuẩn kiểm định chất lượng cơ sở giáo dục nghề nghiệp
                </span>
                Trường Trung cấp Á Châu là cơ sở đào tạo đầu tiên tại Tây Ninh được Bộ Lao động – Thương binh và Xã hội công nhận đạt chuẩn kiểm định chất lượng giáo dục nghề nghiệp.
            </p>
            
            {{-- Thông tin sự kiện ngắn gọn --}}
            <div class="mt-4 p-4 bg-blue-50 rounded-lg border-l-4 border-blue-500">
                <div class="flex items-start gap-3">
                    <i class="fas fa-calendar-check text-blue-600 mt-1"></i>
                    <div>
                        <h4 class="font-bold text-blue-900 text-sm mb-1">Lễ công bố & trao chứng nhận</h4>
                        <p class="text-gray-600 text-xs">Tháng 12/2024, với sự tham dự của Sở LĐTBXH Tây Ninh và đại diện các doanh nghiệp đối tác.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Thành tựu ngắn gọn --}}
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
        <h3 class="text-xl font-bold text-blue-900 mb-4 flex items-center gap-2">
            <i class="fas fa-star text-yellow-500"></i>
            Thành tựu nổi bật
        </h3>
        <div class="space-y-3">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-check text-green-600 text-xs"></i>
                </div>
                <span class="text-sm text-gray-700">85% sinh viên tốt nghiệp có việc làm đúng ngành</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-check text-green-600 text-xs"></i>
                </div>
                <span class="text-sm text-gray-700">40+ giảng viên đạt chuẩn chuyên môn</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-check text-green-600 text-xs"></i>
                </div>
                <span class="text-sm text-gray-700">732 học viên đang theo học (2024)</span>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </section>

    {{-- 4. CHỨNG NHẬN 2: 03 CHƯƠNG TRÌNH ĐẠT CHUẨN --}}
    <section id="section-chungnhan-2" class="py-12 md:py-16 bg-gradient-to-b from-white to-blue-50/50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-12 items-center">
                
                {{-- Cột trái: Nội dung chứng nhận 2 --}}
                <div class="space-y-6 order-2 lg:order-1">
                    <div>
                        <div class="inline-flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-graduation-cap text-xl text-blue-600"></i>
                            </div>
                            <h2 class="text-3xl md:text-4xl font-black text-blue-900">03 CHƯƠNG TRÌNH ĐẠT CHUẨN</h2>
                        </div>
                        
                        <div class="bg-white p-6 rounded-2xl shadow-lg border border-blue-100 mb-6 relative z-10">
                            <p class="text-gray-700 text-lg leading-relaxed text-justify">
                                <span class="font-bold text-blue-900 text-xl block mb-3">
                                    Nhà trường tự hào khi 03 chương trình đào tạo được công nhận đạt chuẩn kiểm định chất lượng giáo dục.
                                </span>
                                Đây là minh chứng cho chất lượng đào tạo và sự nỗ lực không ngừng của đội ngũ giảng viên, cán bộ nhà trường.
                            </p>
                        </div>
                    </div>

                    {{-- Danh sách 3 chương trình --}}
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                        <h3 class="text-xl font-bold text-blue-900 mb-4 flex items-center gap-2">
                            <i class="fas fa-check-double text-green-500"></i>
                            Các chương trình đạt chuẩn
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-4 p-3 hover:bg-green-50/50 rounded-lg transition-colors border-l-4 border-green-500">
                                <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-network-wired text-green-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-800 mb-1">Quản trị mạng máy tính</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Chương trình đào tạo kỹ thuật viên mạng máy tính chuyên nghiệp</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">Đạt chuẩn</span>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4 p-3 hover:bg-blue-50/50 rounded-lg transition-colors border-l-4 border-blue-500">
                                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-calculator text-blue-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-800 mb-1">Kế toán doanh nghiệp</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Đào tạo kế toán viên chuyên nghiệp cho các doanh nghiệp</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full">Đạt chuẩn</span>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4 p-3 hover:bg-yellow-50/50 rounded-lg transition-colors border-l-4 border-yellow-500">
                                <div class="flex-shrink-0 w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-bolt text-yellow-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-800 mb-1">Điện công nghiệp – dân dụng</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Chương trình đào tạo kỹ thuật điện công nghiệp và dân dụng</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full">Đạt chuẩn</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Lợi ích cho sinh viên --}}
                    <div class="grid grid-cols-2 gap-4 pt-2">
                        <div class="text-center p-3 bg-gradient-to-br from-green-50 to-green-100/50 rounded-xl border border-green-200">
                            <div class="text-2xl font-bold text-green-900">100%</div>
                            <div class="text-xs text-gray-600 mt-1">Đạt chuẩn đầu ra</div>
                        </div>
                        <div class="text-center p-3 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-xl border border-blue-200">
                            <div class="text-2xl font-bold text-blue-900">Ưu tiên</div>
                            <div class="text-xs text-gray-600 mt-1">Tuyển dụng doanh nghiệp</div>
                        </div>
                    </div>
                </div>

                {{-- Cột phải: Hình ảnh chứng nhận 2 --}}
                <div class="relative order-1 lg:order-2">
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[110%] h-[110%] bg-blue-100/50 rounded-full blur-3xl -z-10"></div>
                    
                    <div class="relative overflow-hidden rounded-3xl shadow-2xl group">
                        <picture>
                            <source srcset="{{ asset('images/chungnhan-chuongtrinh.webp') }}" type="image/webp">
                            <source srcset="{{ asset('images/chungnhan-chuongtrinh.jpg') }}" type="image/jpeg">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                                 data-src="{{ asset('images/chungnhan-chuongtrinh.jpg') }}"
                                 alt="Chứng nhận chương trình đào tạo đạt chuẩn"
                                 class="lazy-image w-full h-[400px] md:h-[550px] object-cover transition duration-700 group-hover:scale-105"
                                 loading="lazy">
                        </picture>
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-transparent to-transparent flex items-end p-8">
                            <div class="text-white transform translate-y-2 group-hover:translate-y-0 transition duration-500">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-8 h-1 bg-yellow-400 rounded-full"></div>
                                    <span class="text-yellow-400 font-bold uppercase tracking-widest text-xs">Chương trình đào tạo</span>
                                </div>
                                <p class="text-xl md:text-2xl font-bold leading-tight">"03 chương trình đạt chuẩn quốc gia"</p>
                            </div>
                        </div>
                    </div>

                    {{-- Badge số 02 --}}
                    <div class="absolute -top-6 -left-6 z-20">
                        <div class="bg-blue-600 text-white rounded-2xl w-20 h-20 md:w-24 md:h-24 flex flex-col justify-center items-center text-center shadow-xl border-4 border-white transform rotate-3 hover:rotate-0 transition duration-300">
                            <span class="text-3xl md:text-4xl font-black">02</span>
                            <span class="text-[10px] md:text-xs font-bold uppercase">Chương trình</span>
                        </div>
                    </div>

                    {{-- Badge 03 chương trình --}}
                    <div class="absolute -bottom-5 -right-5 z-20">
                        <div class="bg-white p-2 rounded-xl shadow-lg">
                            <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg px-6 py-3">
                                <div class="text-center">
                                    <div class="font-black text-2xl leading-none">03</div>
                                    <div class="text-[10px] font-bold uppercase tracking-wider mt-1">Chương trình</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- 5. TẦM QUAN TRỌNG CỦA KIỂM ĐỊNH --}}
    <section class="py-12 md:py-16 bg-gradient-to-b from-blue-50 to-white">
        <div class="max-w-7xl mx-auto px-4">
            
            <div class="text-center mb-12">
                <span class="inline-block text-blue-600 font-bold uppercase tracking-[0.3em] text-sm 
                           bg-blue-50 px-4 py-2 rounded-full mb-4 border border-blue-100">
                    <i class="fas fa-flag mr-2"></i>Ý nghĩa kiểm định
                </span>
                <h2 class="text-3xl md:text-5xl font-black text-blue-900 mb-4 leading-tight">
                    Tầm quan trọng của <span class="text-blue-600">kiểm định chất lượng</span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-yellow-300 rounded-full mx-auto mt-6"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-blue-100">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-user-shield text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-3">Bảo vệ quyền lợi người học</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Đảm bảo người học được đào tạo trong môi trường chất lượng, đáp ứng chuẩn đầu ra và có cơ hội việc làm tốt.
                    </p>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-blue-100">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-chart-line text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-3">Nâng cao uy tín nhà trường</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Khẳng định vị thế, thu hút người học và tạo niềm tin với doanh nghiệp trong việc hợp tác đào tạo.
                    </p>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-lg border border-blue-100">
                    <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center mb-4">
                        <i class="fas fa-sync-alt text-2xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-3">Động lực cải tiến chất lượng</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Tạo động lực để nhà trường không ngừng đổi mới, cải tiến phương pháp đào tạo và nâng cao chất lượng.
                    </p>
                </div>
            </div>
        </div>
    </section>

{{-- 5. KẾT LUẬN & CTA - ĐỒNG BỘ VỚI TRANG MỤC TIÊU --}}
<section class="relative py-16 md:py-24 bg-blue-900 text-white overflow-hidden">
    
    {{-- Lớp nền họa tiết --}}
    <div class="absolute inset-0 opacity-10" 
         style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png'); background-repeat: repeat;">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-blue-900/50 to-blue-950/80 pointer-events-none"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
        
        <h2 class="text-3xl md:text-5xl font-black mb-6 leading-tight">
            Khẳng định <span class="text-yellow-400">uy tín chất lượng đào tạo</span>
        </h2>
        
        <p class="text-blue-100 text-lg md:text-xl mb-12 leading-relaxed font-light max-w-3xl mx-auto">
            Với các chứng nhận kiểm định chất lượng quốc gia, Trường Trung cấp Á Châu không ngừng nâng cao chất lượng đào tạo, 
            cam kết mang đến cho người học môi trường học tập chuẩn mực, đáp ứng yêu cầu của doanh nghiệp và xã hội.
        </p>
        
        {{-- KHỐI QUOTE VỚI AVATAR PHÓ HIỆU TRƯỞNG (ĐỒNG BỘ CẤU TRÚC) --}}
        <div class="bg-white/10 backdrop-blur-md p-8 md:p-12 rounded-3xl border border-white/20 shadow-2xl mb-12 relative overflow-hidden">
            
            {{-- Dấu ngoặc kép trang trí chìm --}}
            <i class="fas fa-quote-left text-white opacity-10 text-[8rem] absolute -top-4 -left-4 pointer-events-none"></i>

            <div class="flex flex-col-reverse md:flex-row items-center gap-8 md:gap-12 relative z-10">
                
                {{-- 1. Nội dung text (Bên Trái) --}}
                <div class="flex-1 text-center md:text-left">
                    <p class="text-xl md:text-2xl italic font-medium leading-relaxed mb-6 text-white">
                        "Chứng nhận kiểm định chất lượng không phải là điểm kết thúc, mà là động lực để Nhà trường không ngừng cải tiến, nâng cao chất lượng đào tạo. Cam kết của chúng tôi là duy trì và phát triển các tiêu chuẩn đã đạt được, vì tương lai bền vững của mỗi học viên."
                    </p>
                    
                    <div class="border-t border-white/20 pt-4 inline-block md:block w-full">
                        <div class="font-black text-yellow-400 text-xl md:text-2xl uppercase tracking-wide mb-1">
                            Thầy Nguyễn Văn Kiều
                        </div>
                        <div class="text-blue-200 text-sm md:text-base font-light uppercase tracking-widest">
                            Phó Hiệu trưởng Trường Trung cấp Á Châu
                        </div>
                    </div>
                </div>

                {{-- 2. Ảnh Phó Hiệu trưởng (Bên Phải) --}}
                <div class="flex-shrink-0 relative">
                    {{-- Vòng tròn trang trí --}}
                    <div class="absolute inset-0 bg-yellow-400 rounded-full blur-xl opacity-20 animate-pulse"></div>
                    
                    <div class="relative w-32 h-32 md:w-48 md:h-48 p-1.5 rounded-full bg-gradient-to-br from-yellow-300 via-yellow-500 to-yellow-600 shadow-2xl">
                        <img src="{{ asset('images/pho-hieu-truong.webp') }}" 
                             alt="Thầy Nguyễn Thanh Thống - Phó Hiệu trưởng" 
                             class="w-full h-full rounded-full object-cover border-4 border-blue-900 bg-white shadow-inner">
                        
                        {{-- Huy hiệu xác thực --}}
                        <div class="absolute bottom-2 right-2 md:bottom-3 md:right-3 bg-blue-600 text-white w-8 h-8 md:w-10 md:h-10 flex items-center justify-center rounded-full border-4 border-blue-900 shadow-lg z-20" title="Đã xác thực">
                            <i class="fas fa-check text-xs md:text-sm"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        {{-- Các nút bấm (CTA) ĐỒNG BỘ HOÀN TOÀN --}}
        <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
            <a href="{{ route('page.muctieu') }}" 
               class="group bg-yellow-500 hover:bg-yellow-400 text-blue-900 font-bold px-8 py-4 
                      rounded-full transition-all duration-300 shadow-[0_0_20px_rgba(234,179,8,0.5)] 
                      hover:shadow-[0_0_30px_rgba(234,179,8,0.7)] flex items-center gap-3 w-full md:w-auto justify-center hover:-translate-y-1">
                <i class="fas fa-arrow-left"></i>
                <span>Về Mục tiêu & Chính sách</span>
            </a>
            
            <a href="{{ route('page.gioithieu') }}" 
               class="group bg-white hover:bg-gray-100 text-blue-900 font-bold px-8 py-4 
                      rounded-full transition-all duration-300 transform hover:-translate-y-1 
                      shadow-lg hover:shadow-xl flex items-center gap-3 w-full md:w-auto justify-center">
                <i class="fas fa-home"></i>
                <span>Về trang chủ</span>
                <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>
</section>
</main>

{{-- LIGHTWEIGHT JAVASCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const lazyImages = document.querySelectorAll('.lazy-image');
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    const src = img.getAttribute('data-src');
                    if (src) img.src = src;
                    img.classList.add('loaded');
                    imageObserver.unobserve(img);
                }
            });
        }, { rootMargin: '100px 0px' });
        lazyImages.forEach(img => imageObserver.observe(img));
    }
    
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    window.scrollTo({ top: target.offsetTop - 80, behavior: 'smooth' });
                }
            }
        });
    });
});
</script>

<style>
    .lazy-image { opacity: 0; transition: opacity 0.5s ease-in-out; }
    .lazy-image.loaded { opacity: 1; }
</style>

@include('components.footer')