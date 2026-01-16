@include('components.header')

{{-- 1. BANNER HEADER --}}
<div class="relative h-[400px] md:h-[550px] lg:h-[600px] overflow-hidden bg-blue-900 group">
    
    <div class="absolute inset-0 overflow-hidden">
        <picture>
            <source srcset="{{ asset('images/gioithieuchung.webp') }}" type="image/webp">
            <source srcset="{{ asset('images/gioithieuchung.jpg') }}" type="image/jpeg">
            {{-- Đã sửa đường dẫn ảnh bị thiếu 'images/' --}}
            <img src="{{ asset('images/gioithieuchung.jpg') }}"
                 class="absolute inset-0 w-full h-full object-cover opacity-50"
                 alt="Trường Trung Cấp Á Châu - Sứ mệnh và Tầm nhìn"
                 loading="eager"
                 width="1920"
                 height="600">
        </picture>
        
        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-blue-900/50 to-blue-900/20"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/30 to-transparent"></div>
    </div>

    <div class="relative z-10 h-full max-w-7xl mx-auto flex flex-col justify-center px-4 md:px-8 text-white">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-3 mb-6">
                <span class="text-yellow-400 font-bold uppercase tracking-[0.3em] text-xs md:text-sm 
                           bg-blue-800/50 px-4 py-2 rounded-full backdrop-blur-md border border-yellow-400/30 shadow-lg">
                    <i class="fas fa-compass mr-2"></i>Định hướng tương lai
                </span>
                <div class="h-px w-12 bg-yellow-400/50"></div>
            </div>

            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black font-bevietnam leading-tight mb-4">
                <span class="text-yellow-400">Sứ mệnh</span> & <span class="text-blue-300">Tầm nhìn</span>
            </h1>

            <p class="text-xl md:text-2xl text-blue-100 font-light mb-8 leading-relaxed max-w-2xl">
                Định hướng phát triển bền vững - Kiến tạo tương lai thế hệ trẻ
            </p>

            <div class="w-32 h-1.5 bg-gradient-to-r from-yellow-500 to-yellow-300 rounded-full mb-8 shadow-lg"></div>

            <div class="flex flex-wrap gap-4 mt-10">
                <a href="#section-sumenh" 
                   class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-bold px-8 py-3 
                          rounded-full transition-all duration-300 transform hover:-translate-y-1 
                          shadow-lg hover:shadow-xl flex items-center gap-2">
                    <span>Khám phá sứ mệnh</span>
                    <i class="fas fa-arrow-down"></i>
                </a>
                <a href="{{ route('page.gioithieu') }}" 
                   class="bg-transparent border-2 border-white/50 hover:border-white text-white 
                          font-bold px-8 py-3 rounded-full transition-all duration-300 
                          hover:bg-white/10 backdrop-blur-sm flex items-center gap-2">
                    <i class="fas fa-undo-alt"></i>
                    <span>Về tổng quan trường</span>
                </a>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
        <div class="w-6 h-10 border-2 border-white/50 rounded-full flex justify-center">
            <div class="w-1 h-3 bg-white/70 rounded-full mt-2"></div>
        </div>
    </div>
</div>

<div id="section-sumenh" class="scroll-mt-20"></div>

<main class="font-bevietnam bg-white">
    
    {{-- 2. PHẦN GIỚI THIỆU CHUNG --}}
    {{-- GIẢM padding: py-20/28 -> py-12/16 --}}
    <section class="py-12 md:py-16 bg-gradient-to-b from-white to-blue-50/30">
        <div class="max-w-7xl mx-auto px-4">
            
            {{-- GIẢM margin bottom: mb-16 -> mb-10 --}}
            <div class="text-center mb-10">
                <span class="inline-block text-blue-600 font-bold uppercase tracking-[0.3em] text-sm 
                           bg-blue-50 px-4 py-2 rounded-full mb-4 border border-blue-100">
                    <i class="fas fa-bullseye mr-2"></i>Định hướng chiến lược
                </span>
                <h2 class="text-3xl md:text-5xl font-black text-blue-900 mb-4 leading-tight">
                    Kim chỉ nam <span class="text-blue-600">cho phát triển</span>
                </h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                    Sứ mệnh và Tầm nhìn là nền tảng cho mọi hoạt động đào tạo của Trường Trung Cấp Á Châu, 
                    định hướng chiến lược phát triển bền vững trong bối cảnh hội nhập kinh tế toàn cầu.
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-yellow-300 rounded-full mx-auto mt-6"></div>
            </div>

            <div class="bg-gradient-to-r from-blue-50 to-blue-100/50 rounded-2xl p-8 md:p-12 mb-8 border border-blue-100">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="flex-shrink-0">
                        <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-lightbulb text-3xl text-yellow-300"></i>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-blue-900 mb-4">Tại sao Sứ mệnh & Tầm nhìn quan trọng?</h3>
                        <p class="text-gray-700 leading-relaxed">
                            Như la bàn dẫn đường cho con thuyền, Sứ mệnh và Tầm nhìn giúp chúng tôi giữ vững định hướng 
                            trong mọi hoạt động, đảm bảo mục tiêu xuyên suốt: 
                            <span class="font-bold text-blue-700">Đào tạo nguồn nhân lực chất lượng cao - Phục vụ sự nghiệp công nghiệp hóa, hiện đại hóa đất nước</span>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{-- 3. SỨ MỆNH CHI TIẾT --}}
    <section class="py-12 md:py-16 bg-gradient-to-b from-blue-50/50 to-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-12 items-center">
                
                {{-- Cột trái: Hình ảnh (ĐÃ SỬA ĐỂ ĐỒNG BỘ VỚI SECTION 4) --}}
                <div class="relative order-1">
                    {{-- Background trang trí --}}
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[110%] h-[110%] bg-yellow-100/50 rounded-full blur-3xl -z-10"></div>
                    
                    {{-- Khung ảnh chính --}}
                    <div class="relative overflow-hidden rounded-3xl shadow-2xl group">
                        <picture>
                            <source srcset="{{ asset('images/sumenh-mission.webp') }}" type="image/webp">
                            <source srcset="{{ asset('images/sumenh-mission.jpg') }}" type="image/jpeg">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                                 data-src="{{ asset('images/sumenh-mission.jpg') }}"
                                 alt="Sứ mệnh đào tạo - Trường Trung Cấp Á Châu"
                                 class="lazy-image w-full h-[400px] md:h-[550px] object-cover transition duration-700 group-hover:scale-105"
                                 loading="lazy">
                        </picture>
                        
                        {{-- Overlay text trên ảnh --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-transparent to-transparent flex items-end p-8">
                            <div class="text-white transform translate-y-2 group-hover:translate-y-0 transition duration-500">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-8 h-1 bg-yellow-400 rounded-full"></div>
                                    <span class="text-yellow-400 font-bold uppercase tracking-widest text-xs">Sứ mệnh cốt lõi</span>
                                </div>
                                <p class="text-xl md:text-2xl font-bold leading-tight">"Cung cấp đào tạo chất lượng - Phát triển nhân lực"</p>
                            </div>
                        </div>
                    </div>

                    {{-- Badge số 01 (Màu Vàng - Đối lập với màu Xanh của 02) --}}
                    <div class="absolute -top-6 -right-6 z-20">
                        <div class="bg-yellow-400 text-blue-900 rounded-2xl w-20 h-20 md:w-24 md:h-24 flex flex-col justify-center items-center text-center shadow-xl border-4 border-white transform -rotate-3 hover:rotate-0 transition duration-300">
                            <span class="text-3xl md:text-4xl font-black">01</span>
                            <span class="text-[10px] md:text-xs font-bold uppercase">Sứ mệnh</span>
                        </div>
                    </div>
                </div>

                {{-- Cột phải: Nội dung Sứ mệnh --}}
                <div class="space-y-6 order-2">
                    <div>
                        <div class="inline-flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-rocket text-xl text-blue-600"></i>
                            </div>
                            <h2 class="text-3xl md:text-4xl font-black text-blue-900">SỨ MỆNH</h2>
                        </div>
                        
                        <div class="bg-white p-6 rounded-2xl shadow-lg border border-blue-100 mb-6 relative z-10">
                            <p class="text-gray-700 text-lg leading-relaxed text-justify">
                                <span class="font-bold text-blue-900 text-xl block mb-3">
                                    Trường Trung cấp Á Châu là nơi cung cấp chương trình đào tạo chất lượng cao
                                </span>
                                góp phần phát triển nguồn nhân lực phục vụ công nghiệp hóa, hiện đại hóa đất nước trong bối cảnh hội nhập toàn cầu.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                        <h3 class="text-xl font-bold text-blue-900 mb-4 flex items-center gap-2">
                            <i class="fas fa-layer-group text-green-500"></i>
                            3 Trụ cột chính
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-4 p-3 hover:bg-green-50/50 rounded-lg transition-colors">
                                <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-green-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-800 mb-1">Đào tạo chất lượng</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Cung cấp chương trình bài bản, cập nhật công nghệ và phương pháp tiên tiến</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4 p-3 hover:bg-blue-50/50 rounded-lg transition-colors">
                                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-users text-blue-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-800 mb-1">Phát triển nhân lực</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Đào tạo tay nghề cao, đáp ứng nhu cầu khắt khe của thị trường lao động</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4 p-3 hover:bg-yellow-50/50 rounded-lg transition-colors">
                                <div class="flex-shrink-0 w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-globe text-yellow-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-800 mb-1">Hội nhập quốc tế</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Trang bị năng lực cạnh tranh và thích ứng trong môi trường toàn cầu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- 4. TẦM NHÌN CHI TIẾT --}}
    <section class="py-12 md:py-16 bg-gradient-to-b from-white to-blue-50/50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-12 items-center">
                
                {{-- Cột trái: Nội dung Tầm nhìn (GIỮ NGUYÊN) --}}
                <div class="space-y-6 order-2 lg:order-1">
                    <div>
                        <div class="inline-flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-binoculars text-xl text-blue-600"></i>
                            </div>
                            <h2 class="text-3xl md:text-4xl font-black text-blue-900">TẦM NHÌN</h2>
                        </div>
                        
                        <div class="bg-white p-6 rounded-2xl shadow-lg border border-blue-100 mb-6 relative z-20">
                            <p class="text-gray-700 text-lg leading-relaxed text-justify">
                                <span class="font-bold text-blue-900 text-xl block mb-3">
                                    Đến năm 2030, trường Trung cấp Á Châu sẽ nâng cấp lên Trường Cao đẳng
                                </span>
                                và trở thành một cơ sở đào tạo uy tín; là nơi cung cấp cho người học môi trường học nghề tốt nhất, có tính chuyên môn cao.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                        <h3 class="text-xl font-bold text-blue-900 mb-4 flex items-center gap-2">
                            <i class="fas fa-flag-checkered text-blue-500"></i>
                            Mục tiêu đến năm 2030
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-4 p-3 hover:bg-blue-50/50 rounded-lg transition-colors">
                                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-building text-blue-700"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-800 mb-1">Nâng cấp lên Cao đẳng</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Hoàn tất quy trình nâng cấp trường lên trình độ Cao đẳng với đầy đủ các ngành nghề trọng điểm</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4 p-3 hover:bg-blue-50/50 rounded-lg transition-colors">
                                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-trophy text-blue-700"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-800 mb-1">Trở thành cơ sở đào tạo uy tín</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Được công nhận là cơ sở đào tạo nghề nghiệp chất lượng cao tại khu vực Tây Ninh và các tỉnh lân cận</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4 p-3 hover:bg-blue-50/50 rounded-lg transition-colors">
                                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-globe-asia text-blue-700"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-800 mb-1">Đạt chuẩn hội nhập quốc tế</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Đào tạo nguồn nhân lực có khả năng cạnh tranh và thích ứng nhanh với nền kinh tế toàn cầu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Cột phải: Hình ảnh (ĐÃ SỬA LẠI CHO GỌN) --}}
                <div class="relative order-1 lg:order-2">
                    {{-- Background trang trí --}}
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[110%] h-[110%] bg-blue-100/50 rounded-full blur-3xl -z-10"></div>
                    
                    {{-- Khung ảnh chính --}}
                    <div class="relative overflow-hidden rounded-3xl shadow-2xl group">
                        <picture>
                            <source srcset="{{ asset('images/sumenh-vision.webp') }}" type="image/webp">
                            <source srcset="{{ asset('images/sumenh-vision.jpg') }}" type="image/jpeg">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
                                 data-src="{{ asset('images/sumenh-vision.jpg') }}"
                                 alt="Tầm nhìn tương lai - Trường Trung Cấp Á Châu"
                                 class="lazy-image w-full h-[400px] md:h-[550px] object-cover transition duration-700 group-hover:scale-105"
                                 loading="lazy">
                        </picture>
                        
                        {{-- Overlay text trên ảnh --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-transparent to-transparent flex items-end p-8">
                            <div class="text-white transform translate-y-2 group-hover:translate-y-0 transition duration-500">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-8 h-1 bg-yellow-400 rounded-full"></div>
                                    <span class="text-yellow-400 font-bold uppercase tracking-widest text-xs">Tầm nhìn 2030</span>
                                </div>
                                <p class="text-xl md:text-2xl font-bold leading-tight">"Vươn tầm cao mới - Khẳng định vị thế"</p>
                            </div>
                        </div>
                    </div>

                    {{-- Badge số 02 (Đưa lên góc trên trái để cân đối với ảnh Sứ mệnh) --}}
                    <div class="absolute -top-6 -left-6 z-20">
                        <div class="bg-blue-600 text-white rounded-2xl w-20 h-20 md:w-24 md:h-24 flex flex-col justify-center items-center text-center shadow-xl border-4 border-white transform rotate-3 hover:rotate-0 transition duration-300">
                            <span class="text-3xl md:text-4xl font-black">02</span>
                            <span class="text-[10px] md:text-xs font-bold uppercase">Tầm nhìn</span>
                        </div>
                    </div>

                    {{-- Badge mốc thời gian (Góc dưới phải) --}}
                    <div class="absolute -bottom-5 -right-5 z-20">
                        <div class="bg-white p-2 rounded-xl shadow-lg animate-bounce-slow">
                            <div class="bg-gradient-to-r from-yellow-500 to-yellow-400 text-blue-900 rounded-lg px-6 py-3">
                                <div class="text-center">
                                    <div class="font-black text-2xl leading-none">2030</div>
                                    <div class="text-[10px] font-bold uppercase tracking-wider mt-1">Mục tiêu</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

{{-- 5. LỘ TRÌNH THỰC HIỆN (LÀM LẠI GIAO DIỆN CARD DỄ ĐỌC) --}}
    <section class="py-16 bg-gray-50"> {{-- Đổi nền sang xám nhẹ để tách biệt --}}
        <div class="max-w-6xl mx-auto px-4">
            
            <div class="text-center mb-12">
                <span class="text-blue-600 font-bold uppercase tracking-widest text-sm mb-2 block">Lộ trình chiến lược</span>
                <h2 class="text-3xl md:text-4xl font-black text-blue-900">Hành trình đến năm 2030</h2>
                <div class="w-20 h-1.5 bg-yellow-400 rounded-full mx-auto mt-4"></div>
            </div>

            <div class="relative">
                {{-- Đường kẻ dọc --}}
                <div class="absolute left-4 md:left-1/2 transform md:-translate-x-1/2 h-full w-1 bg-blue-200 rounded-full"></div>
                
                <div class="space-y-12">
                    {{-- Giai đoạn 1 --}}
                    <div class="relative flex flex-col md:flex-row items-center justify-between group">
                        {{-- Mốc thời gian (Mobile: trái, Desktop: giữa) --}}
                        <div class="absolute left-0 md:left-1/2 transform md:-translate-x-1/2 w-10 h-10 bg-blue-600 rounded-full border-4 border-white shadow-lg z-10 flex items-center justify-center text-white font-bold text-xs">
                            2024
                        </div>

                        {{-- Nội dung bên TRÁI --}}
                        <div class="w-full md:w-[45%] pl-12 md:pl-0 md:pr-12 md:text-right">
                            <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-600 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <h3 class="text-xl font-bold text-blue-900 mb-2">Củng cố nền tảng</h3>
                                <ul class="space-y-2 text-sm text-gray-600">
                                    <li class="flex items-center gap-2 md:justify-end">
                                        <span class="md:hidden"><i class="fas fa-check text-green-500"></i></span>
                                        <span>Hoàn thiện cơ sở vật chất & chương trình</span>
                                        <span class="hidden md:inline"><i class="fas fa-check text-green-500"></i></span>
                                    </li>
                                    <li class="flex items-center gap-2 md:justify-end">
                                        <span class="md:hidden"><i class="fas fa-check text-green-500"></i></span>
                                        <span>Tăng cường đội ngũ giảng viên</span>
                                        <span class="hidden md:inline"><i class="fas fa-check text-green-500"></i></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="w-full md:w-[45%]"></div> {{-- Spacer --}}
                    </div>

                    {{-- Giai đoạn 2 --}}
                    <div class="relative flex flex-col md:flex-row items-center justify-between group">
                        <div class="absolute left-0 md:left-1/2 transform md:-translate-x-1/2 w-10 h-10 bg-green-500 rounded-full border-4 border-white shadow-lg z-10 flex items-center justify-center text-white font-bold text-xs">
                            2026
                        </div>

                        <div class="w-full md:w-[45%]"></div> {{-- Spacer --}}
                        
                        {{-- Nội dung bên PHẢI --}}
                        <div class="w-full md:w-[45%] pl-12 md:pl-12">
                            <div class="bg-white p-6 rounded-xl shadow-md border-l-4 md:border-l-0 md:border-r-4 border-green-500 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <h3 class="text-xl font-bold text-blue-900 mb-2">Phát triển vượt bậc</h3>
                                <ul class="space-y-2 text-sm text-gray-600">
                                    <li class="flex items-center gap-2">
                                        <i class="fas fa-check text-green-500"></i>
                                        <span>Mở rộng hợp tác doanh nghiệp quốc tế</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class="fas fa-check text-green-500"></i>
                                        <span>Số hóa toàn diện công tác đào tạo</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Giai đoạn 3 --}}
                    <div class="relative flex flex-col md:flex-row items-center justify-between group">
                        <div class="absolute left-0 md:left-1/2 transform md:-translate-x-1/2 w-10 h-10 bg-yellow-500 rounded-full border-4 border-white shadow-lg z-10 flex items-center justify-center text-white font-bold text-xs">
                            2030
                        </div>

                        {{-- Nội dung bên TRÁI --}}
                        <div class="w-full md:w-[45%] pl-12 md:pl-0 md:pr-12 md:text-right">
                            <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-yellow-500 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <h3 class="text-xl font-bold text-blue-900 mb-2">Hoàn thành mục tiêu</h3>
                                <ul class="space-y-2 text-sm text-gray-600">
                                    <li class="flex items-center gap-2 md:justify-end">
                                        <span class="md:hidden"><i class="fas fa-trophy text-yellow-500"></i></span>
                                        <span class="font-bold">Nâng cấp lên TRƯỜNG CAO ĐẲNG</span>
                                        <span class="hidden md:inline"><i class="fas fa-trophy text-yellow-500"></i></span>
                                    </li>
                                    <li class="flex items-center gap-2 md:justify-end">
                                        <span class="md:hidden"><i class="fas fa-check text-green-500"></i></span>
                                        <span>Trung tâm đào tạo nghề trọng điểm</span>
                                        <span class="hidden md:inline"><i class="fas fa-check text-green-500"></i></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="w-full md:w-[45%]"></div> {{-- Spacer --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
{{-- 6. KẾT LUẬN & CTA (CẬP NHẬT: ẢNH HIỆU TRƯỞNG TO & BÊN PHẢI) --}}
    <section class="relative py-16 md:py-24 bg-blue-900 text-white overflow-hidden">
        
        {{-- Lớp nền họa tiết --}}
        <div class="absolute inset-0 opacity-10" 
             style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png'); background-repeat: repeat;">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/50 to-blue-950/80 pointer-events-none"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
            
            <h2 class="text-3xl md:text-5xl font-black mb-6 leading-tight">
                Sứ mệnh và Tầm nhìn<br>
                <span class="text-yellow-400">Hành trình chúng ta cùng nhau</span>
            </h2>
            
            <p class="text-blue-100 text-lg md:text-xl mb-12 leading-relaxed font-light max-w-3xl mx-auto">
                Từ những định hướng chiến lược này, Trường Trung cấp Á Châu cam kết không ngừng nỗ lực 
                để mang đến cho học viên môi trường học tập tốt nhất, chương trình đào tạo chất lượng cao 
                và cơ hội phát triển nghề nghiệp vững chắc.
            </p>
            
            {{-- KHỐI QUOTE VỚI AVATAR HIỆU TRƯỞNG (ĐÃ CHỈNH SỬA) --}}
            <div class="bg-white/10 backdrop-blur-md p-8 md:p-12 rounded-3xl border border-white/20 shadow-2xl mb-12 relative overflow-hidden">
                
                {{-- Dấu ngoặc kép trang trí chìm --}}
                <i class="fas fa-quote-left text-white opacity-10 text-[8rem] absolute -top-4 -left-4 pointer-events-none"></i>

                <div class="flex flex-col-reverse md:flex-row items-center gap-8 md:gap-12 relative z-10">
                    
                    {{-- 1. Nội dung text (Bên Trái) --}}
                    <div class="flex-1 text-center md:text-left">
                        <p class="text-xl md:text-2xl italic font-medium leading-relaxed mb-6 text-white">
                            "Với Sứ mệnh làm nền tảng và Tầm nhìn làm đích đến, chúng tôi tự tin đồng hành 
                            cùng thế hệ trẻ ở khu vực Tây Ninh trên hành trình kiến tạo tương lai vững chắc."
                        </p>
                        
                        <div class="border-t border-white/20 pt-4 inline-block md:block w-full">
                            <div class="font-black text-yellow-400 text-xl md:text-2xl uppercase tracking-wide mb-1">
                                TS. Ngô Quốc Cường
                            </div>
                            <div class="text-blue-200 text-sm md:text-base font-light uppercase tracking-widest">
                                Hiệu trưởng Trường Trung cấp Á Châu
                            </div>
                        </div>
                    </div>

                    {{-- 2. Ảnh Hiệu trưởng (Bên Phải & To hơn) --}}
                    <div class="flex-shrink-0 relative">
                        {{-- Vòng tròn trang trí --}}
                        <div class="absolute inset-0 bg-yellow-400 rounded-full blur-xl opacity-20 animate-pulse"></div>
                        
                        <div class="relative w-32 h-32 md:w-48 md:h-48 p-1.5 rounded-full bg-gradient-to-br from-yellow-300 via-yellow-500 to-yellow-600 shadow-2xl">
                            <img src="{{ asset('images/hieu-truong-ngo-quoc-cuong.webp') }}" 
                                 alt="TS. Ngô Quốc Cường" 
                                 class="w-full h-full rounded-full object-cover border-4 border-blue-900 bg-white shadow-inner"
                                 onerror="this.src='https://ui-avatars.com/api/?name=Ngo+Quoc+Cuong&background=random&color=fff&size=256'">
                            
                            {{-- Huy hiệu xác thực --}}
                            <div class="absolute bottom-2 right-2 md:bottom-3 md:right-3 bg-blue-600 text-white w-8 h-8 md:w-10 md:h-10 flex items-center justify-center rounded-full border-4 border-blue-900 shadow-lg z-20" title="Đã xác thực">
                                <i class="fas fa-check text-xs md:text-sm"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
            {{-- Các nút bấm (CTA) --}}
            <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
                <a href="{{ route('page.muctieu') }}" 
                   class="group bg-yellow-500 hover:bg-yellow-400 text-blue-900 font-bold px-8 py-4 
                          rounded-full transition-all duration-300 shadow-[0_0_20px_rgba(234,179,8,0.5)] 
                          hover:shadow-[0_0_30px_rgba(234,179,8,0.7)] flex items-center gap-3 w-full md:w-auto justify-center hover:-translate-y-1">
                    <i class="fas fa-bullseye text-xl"></i>
                    <span>Khám phá Mục tiêu giáo dục</span>
                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </a>
                
                <a href="{{ route('page.chungnhan') }}" 
                   class="group bg-transparent border-2 border-white/30 hover:border-white hover:bg-white/10 text-white 
                          font-bold px-8 py-4 rounded-full transition-all duration-300 
                          flex items-center gap-3 w-full md:w-auto justify-center">
                    <i class="fas fa-award text-xl text-yellow-400"></i>
                    <span>Xem chứng nhận chất lượng</span>
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
    @keyframes fade-in-left { from { opacity: 0; transform: translateX(-50px); } to { opacity: 1; transform: translateX(0); } }
    @keyframes fade-in-right { from { opacity: 0; transform: translateX(50px); } to { opacity: 1; transform: translateX(0); } }
    .timeline-item-left { animation: fade-in-left 0.8s ease-out forwards; opacity: 0; }
    .timeline-item-right { animation: fade-in-right 0.8s ease-out forwards; opacity: 0; }
</style>

@include('components.footer')