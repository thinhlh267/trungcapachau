@php
    $currentPage = 'muctieu';
    $mainMenu = 'tongquan';
@endphp

@include('components.header')

{{-- 1. BANNER HEADER - HOÀN TOÀN ĐỒNG BỘ --}}
<div class="relative h-[400px] md:h-[550px] lg:h-[600px] overflow-hidden bg-blue-900 group">
    
    <div class="absolute inset-0 overflow-hidden">
        <picture>
            <source srcset="{{ asset('images/muc-tieu-va-chinh-sach-chat-luong.webp') }}" type="image/webp">
            <source srcset="{{ asset('images/gioithieuchung.jpg') }}" type="image/jpeg">
            <img src="{{ asset('images/gioithieuchung.jpg') }}"
                 class="absolute inset-0 w-full h-full object-cover opacity-50"
                 alt="Mục tiêu giáo dục & Chính sách chất lượng - Trường Trung Cấp Á Châu"
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
                    <i class="fas fa-check-double mr-2"></i>Cam kết chất lượng
                </span>
                <div class="h-px w-12 bg-yellow-400/50"></div>
            </div>

            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black font-bevietnam leading-tight mb-4">
                <span class="text-yellow-400">Mục tiêu</span> & <span class="text-blue-300">Chính sách chất lượng</span>
            </h1>

            <p class="text-xl md:text-2xl text-blue-100 font-light mb-8 leading-relaxed max-w-2xl">
                Đào tạo nguồn nhân lực chất lượng cao - Xây dựng hệ thống đảm bảo chất lượng toàn diện
            </p>

            <div class="w-32 h-1.5 bg-gradient-to-r from-yellow-500 to-yellow-300 rounded-full mb-8 shadow-lg"></div>

            <div class="flex flex-wrap gap-4 mt-10">
                <a href="#section-muctieu" 
                   class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-bold px-8 py-3 
                          rounded-full transition-all duration-300 transform hover:-translate-y-1 
                          shadow-lg hover:shadow-xl flex items-center gap-2">
                    <span>Khám phá mục tiêu</span>
                    <i class="fas fa-arrow-down"></i>
                </a>
                <a href="{{ route('page.sumenh') }}" 
                   class="bg-transparent border-2 border-white/50 hover:border-white text-white 
                          font-bold px-8 py-3 rounded-full transition-all duration-300 
                          hover:bg-white/10 backdrop-blur-sm flex items-center gap-2">
                    <i class="fas fa-undo-alt"></i>
                    <span>Về Sứ mệnh & Tầm nhìn</span>
                </a>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
        <a href="#section-muctieu" class="animate-bounce">
            <div class="w-6 h-10 border-2 border-white/50 rounded-full flex justify-center">
                <div class="w-1 h-3 bg-white/70 rounded-full mt-2"></div>
            </div>
        </a>
    </div>
</div>

<div id="section-muctieu" class="scroll-mt-20"></div>

<main class="font-bevietnam bg-white">
    
    {{-- 2. MỤC TIÊU ĐÀO TẠO - NÂNG CẤP VỚI BADGE & HIỆU ỨNG --}}
    <section class="py-12 md:py-16 bg-gradient-to-b from-white to-blue-50/30">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-12 items-center">
                
                {{-- Cột trái: Nội dung (GIỮ BỐ CỤC TRANG SỨ MỆNH) --}}
                <div class="space-y-6">
                    <div>
                        <div class="inline-flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-bullseye text-xl text-blue-600"></i>
                            </div>
                            <h2 class="text-3xl md:text-4xl font-black text-blue-900">MỤC TIÊU ĐÀO TẠO</h2>
                        </div>
                        
                        <div class="bg-white p-6 rounded-2xl shadow-lg border border-blue-100 mb-6 relative z-10">
                            <p class="text-gray-700 text-lg leading-relaxed text-justify">
                                <span class="font-bold text-blue-900 text-xl block mb-3">
                                    Đào tạo nguồn nhân lực cho địa bàn
                                </span>
                                có năng lực hành nghề tương ứng với trình độ đào tạo; có đạo đức, sức khỏe; có trách nhiệm nghề nghiệp; có khả năng sáng tạo, thích ứng với môi trường làm việc trong bối cảnh hội nhập quốc tế; bảo đảm nâng cao năng suất, chất lượng lao động.
                            </p>
                        </div>
                    </div>

                    {{-- 3 Trụ cột mục tiêu (ĐỒNG BỘ VỚI TRANG SỨ MỆNH) --}}
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                        <h3 class="text-xl font-bold text-blue-900 mb-4 flex items-center gap-2">
                            <i class="fas fa-layer-group text-green-500"></i>
                            3 Trụ cột đào tạo
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-4 p-3 hover:bg-green-50/50 rounded-lg transition-colors">
                                <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user-tie text-green-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-800 mb-1">Năng lực & Phẩm chất</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Đạo đức, sức khỏe, trách nhiệm nghề nghiệp và năng lực hành nghề thực tế</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4 p-3 hover:bg-blue-50/50 rounded-lg transition-colors">
                                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-lightbulb text-blue-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-800 mb-1">Sáng tạo & Thích ứng</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Khả năng sáng tạo và thích ứng nhanh trong môi trường hội nhập quốc tế</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4 p-3 hover:bg-yellow-50/50 rounded-lg transition-colors">
                                <div class="flex-shrink-0 w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-briefcase text-yellow-600"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-800 mb-1">Việc làm & Học tiếp</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed">Cơ hội tìm việc, tự tạo việc làm hoặc học lên trình độ cao hơn sau tốt nghiệp</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Stats mini --}}
                    <div class="grid grid-cols-3 gap-4 pt-2">
                        <div class="text-center p-3 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl border border-blue-200">
                            <div class="text-2xl font-bold text-blue-900">100%</div>
                            <div class="text-xs text-gray-600 mt-1">Đạt chuẩn đầu ra</div>
                        </div>
                        <div class="text-center p-3 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl border border-blue-200">
                            <div class="text-2xl font-bold text-blue-900">90%+</div>
                            <div class="text-xs text-gray-600 mt-1">Có việc làm sau 6 tháng</div>
                        </div>
                        <div class="text-center p-3 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl border border-blue-200">
                            <div class="text-2xl font-bold text-blue-900">30%+</div>
                            <div class="text-xs text-gray-600 mt-1">Học tiếp lên cao hơn</div>
                        </div>
                    </div>
                </div>

                {{-- Cột phải: Hình ảnh (ĐỒNG BỘ KIỂU DÁNG VỚI TRANG SỨ MỆNH) --}}
                <div class="relative">
                    {{-- Background trang trí --}}
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[110%] h-[110%] bg-yellow-100/50 rounded-full blur-3xl -z-10"></div>
                    
                   {{-- Khung ảnh chính --}}
                    <div class="relative overflow-hidden rounded-3xl shadow-2xl group">
                        <picture>
                            {{-- WebP cho trình duyệt hiện đại --}}
                            <source srcset="{{ asset('images/muctieu-training.webp') }}" type="image/webp">
                            {{-- JPG fallback cho trình duyệt cũ --}}
                            <source srcset="{{ asset('images/muctieu-training.jpg') }}" type="image/jpeg">
                            {{-- Ảnh hiển thị mặc định --}}
                            <img src="{{ asset('images/muctieu-training.jpg') }}"
                                alt="Đào tạo thực hành - Trường Trung Cấp Á Châu"
                                class="w-full h-[400px] md:h-[550px] object-cover transition duration-700 group-hover:scale-105"
                                loading="lazy"
                                onerror="this.src='{{ asset('images/placeholder-training.jpg') }}'">
                        </picture>
                    </div>
                        
                        {{-- Overlay text trên ảnh (GIỐNG TRANG SỨ MỆNH) --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-transparent to-transparent flex items-end p-8">
                            <div class="text-white transform translate-y-2 group-hover:translate-y-0 transition duration-500">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-8 h-1 bg-yellow-400 rounded-full"></div>
                                    <span class="text-yellow-400 font-bold uppercase tracking-widest text-xs">Mục tiêu đào tạo</span>
                                </div>
                                <p class="text-xl md:text-2xl font-bold leading-tight">"Thực học - Thực nghiệp - Thực chất lượng"</p>
                            </div>
                        </div>
                    </div>

                    {{-- Badge số 01 (Màu Vàng - ĐỒNG BỘ VỚI TRANG SỨ MỆNH) --}}
                    <div class="absolute -top-6 -right-6 z-20">
                        <div class="bg-yellow-400 text-blue-900 rounded-2xl w-20 h-20 md:w-24 md:h-24 flex flex-col justify-center items-center text-center shadow-xl border-4 border-white transform -rotate-3 hover:rotate-0 transition duration-300">
                            <span class="text-3xl md:text-4xl font-black">01</span>
                            <span class="text-[10px] md:text-xs font-bold uppercase">Mục tiêu</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

{{-- 3. CHÍNH SÁCH CHẤT LƯỢNG - ĐIỀU CHỈNH KHOẢNG CÁCH --}}
    <section class="py-8 md:py-12 bg-gradient-to-b from-white to-blue-50/50"> {{-- GIẢM padding: py-12/16 -> py-8/12 --}}
        <div class="max-w-7xl mx-auto px-4">
            
            <div class="text-center mb-8"> {{-- GIẢM margin: mb-12 -> mb-8 --}}
                <div class="inline-flex items-center justify-center gap-3 mb-4"> {{-- GIẢM mb-6 -> mb-4 --}}
                    <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-file-contract text-2xl text-blue-900"></i>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-black text-blue-900">CHÍNH SÁCH CHẤT LƯỢNG</h2>
                </div>
                
                <div class="bg-white p-5 rounded-2xl shadow-lg border border-blue-100 max-w-5xl mx-auto mb-6"> {{-- GIẢM padding và margin --}}
                    <p class="text-gray-700 text-lg leading-relaxed text-justify">
                        Trường Trung cấp Á Châu phấn đấu từng bước nâng cao vị thế và uy tín của nhà trường trong hệ thống giáo dục nghề nghiệp, việc đảm bảo chất lượng giáo dục nghề nghiệp là trách nhiệm cao nhất mà toàn thể lãnh đạo, cán bộ, giáo viên và người lao động của trường phải thực hiện.
                    </p>
                </div>
            </div>

            {{-- Cam kết chính sách - GIẢM KHOẢNG CÁCH --}}
            <div class="bg-gradient-to-r from-blue-50 to-blue-100/50 rounded-2xl p-6 md:p-8 mb-8 border border-blue-100"> {{-- GIẢM padding và margin --}}
                <div class="flex flex-col md:flex-row items-center gap-6"> {{-- GIẢM gap-8 -> gap-6 --}}
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center"> {{-- GIẢM kích thước --}}
                            <i class="fas fa-handshake text-2xl text-yellow-300"></i> {{-- GIẢM text size --}}
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-blue-900 mb-3">Cam kết chất lượng</h3> {{-- GIẢM text size và margin --}}
                        <p class="text-gray-700 leading-relaxed text-sm md:text-base"> {{-- GIẢM text size --}}
                            Để đạt được yêu cầu chất lượng trong hoạt động giáo dục nghề nghiệp, <strong>Hiệu trưởng và toàn bộ cán bộ, giáo viên và người lao động cam kết</strong> xây dựng, vận hành, đánh giá và cải tiến hệ thống đảm bảo chất lượng theo quy định tại <strong>Thông tư số 28/2017/TT-BLĐTBXH</strong> ngày 15/12/2017 của Bộ Lao động – Thương binh và Xã hội.
                        </p>
                    </div>
                </div>
            </div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
    @php
        $qualityPolicies = [
            [
                'number' => '01',
                'title' => 'Cải tiến quản lý & giảng dạy',
                'content' => 'Không ngừng cải tiến công tác quản lý, nâng cao chất lượng giảng dạy, học tập và các hoạt động hỗ trợ khác.',
                'icon' => 'fas fa-chart-line',
                'color' => 'blue'
            ],
            [
                'number' => '02',
                'title' => 'Phát triển đội ngũ',
                'content' => 'Xây dựng đội ngũ cán bộ, viên chức nhiệt tình, tận tâm, đủ năng lực và phẩm chất.',
                'icon' => 'fas fa-users',
                'color' => 'green'
            ],
            [
                'number' => '03',
                'title' => 'Đáp ứng nhu cầu người học',
                'content' => 'Luôn lắng nghe, tìm hiểu nhu cầu, tiếp thu ý kiến và đáp ứng yêu cầu của người học.',
                'icon' => 'fas fa-user-graduate',
                'color' => 'purple'
            ],
            [
                'number' => '04',
                'title' => 'Cập nhật chương trình',
                'content' => 'Thường xuyên rà soát, cập nhật chương trình, giáo trình đào tạo, phương pháp giảng dạy.',
                'icon' => 'fas fa-book-open',
                'color' => 'yellow'
            ],
            [
                'number' => '05',
                'title' => 'Đầu tư thiết bị',
                'content' => 'Thiết bị đào tạo đáp ứng yêu cầu của Bộ LĐTBXH, bổ sung thiết bị tiên tiến.',
                'icon' => 'fas fa-tools',
                'color' => 'red'
            ],
            [
                'number' => '06',
                'title' => 'Hợp tác doanh nghiệp',
                'content' => 'Mở rộng hợp tác trong và ngoài nước, tăng cường quan hệ với doanh nghiệp.',
                'icon' => 'fas fa-handshake',
                'color' => 'indigo'
            ],
            [
                'number' => '07',
                'title' => 'Cải tiến hệ thống chất lượng',
                'content' => 'Duy trì có hiệu quả và thường xuyên cải tiến, phát triển hệ thống bảo đảm chất lượng.',
                'icon' => 'fas fa-sync-alt',
                'color' => 'orange',
                'full' => true
            ]
        ];
    @endphp
    
    @foreach($qualityPolicies as $policy)
        @if(isset($policy['full']) && $policy['full'])
            <div class="md:col-span-2 lg:col-span-3">
                <div class="relative overflow-hidden rounded-2xl shadow-xl border-2 border-yellow-400 bg-gradient-to-br from-blue-700 via-blue-800 to-blue-900 group hover:shadow-2xl transition-all duration-300">
                    
                    {{-- Decorative elements --}}
                    <div class="absolute top-0 right-0 w-32 h-32 bg-yellow-400/10 rounded-full -translate-y-16 translate-x-16"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-yellow-400/10 rounded-full translate-y-12 -translate-x-12"></div>
                    
                    <div class="relative z-10 p-6 md:p-8">
                        <div class="flex flex-col md:flex-row items-center gap-6">
                            
                            {{-- Badge số 7 nổi bật --}}
                            <div class="flex-shrink-0">
                                <div class="relative">
                                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-2xl flex flex-col items-center justify-center shadow-lg transform rotate-3 group-hover:rotate-0 transition-transform duration-300">
                                        <span class="text-blue-900 font-black text-3xl leading-none">{{ $policy['number'] }}</span>
                                        <span class="text-blue-900 font-bold text-[10px] uppercase mt-1">Trọng tâm</span>
                                    </div>
                                    {{-- Glow effect --}}
                                    <div class="absolute -inset-2 bg-yellow-400/30 rounded-full blur-md -z-10"></div>
                                </div>
                            </div>
                            
                            {{-- Nội dung chính --}}
                            <div class="flex-1 text-center md:text-left">
                                <div class="flex flex-col md:flex-row md:items-center gap-4 mb-4">
                                    <div class="flex items-center justify-center md:justify-start gap-3">
                                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                            <i class="{{ $policy['icon'] }} text-yellow-300 text-xl"></i>
                                        </div>
                                        <h4 class="text-white text-2xl font-black">{{ $policy['title'] }}</h4>
                                    </div>
                                </div>
                                
                                <p class="text-blue-100 text-lg leading-relaxed mb-4 font-light">
                                    {{ $policy['content'] }}
                                </p>
                                
                                {{-- Highlight tag --}}
                                <div class="inline-flex items-center gap-2 bg-white/10 px-4 py-2 rounded-full backdrop-blur-sm border border-white/20">
                                    <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
                                    <span class="text-yellow-300 font-semibold text-sm">Cam kết cốt lõi của Nhà trường</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- CÁC POLICY 1-6 - GIỮ NGUYÊN KIỂU DÁNG --}}
            <div class="bg-white p-5 rounded-2xl shadow-lg border border-blue-100 hover:shadow-xl transition-all duration-300 group">
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center group-hover:bg-blue-600 transition-colors">
                            <span class="text-blue-600 group-hover:text-white font-bold text-sm">{{ $policy['number'] }}</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-blue-900 text-sm md:text-base mb-1">{{ $policy['title'] }}</h4>
                        <p class="text-gray-600 text-xs leading-relaxed">
                            {{ $policy['content'] }}
                        </p>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>

            {{-- Thông tư chi tiết - ĐIỀU CHỈNH KHOẢNG CÁCH --}}
            <div class="bg-blue-50 rounded-2xl p-6 border border-blue-200"> {{-- GIẢM padding --}}
                <div class="flex flex-col md:flex-row items-start gap-4"> {{-- GIẢM gap --}}
                    <div class="flex-shrink-0">
                        <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center"> {{-- GIẢM kích thước --}}
                            <i class="fas fa-gavel text-xl text-yellow-300"></i> {{-- GIẢM text size --}}
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-blue-900 mb-2">Tuân thủ quy định pháp lý</h3> {{-- GIẢM text size và margin --}}
                        <p class="text-gray-700 text-sm mb-3"> {{-- GIẢM text size và margin --}}
                            Toàn bộ hoạt động đảm bảo chất lượng của Trường được thực hiện theo đúng quy định tại:
                        </p>
                        <div class="bg-white p-3 rounded-xl border border-blue-100"> {{-- GIẢM padding --}}
                            <div class="flex items-center gap-2"> {{-- GIẢM gap --}}
                                <i class="fas fa-file-alt text-blue-600 text-lg"></i> {{-- GIẢM text size --}}
                                <div>
                                    <h4 class="font-bold text-blue-900 text-sm md:text-base">Thông tư số 28/2017/TT-BLĐTBXH</h4> {{-- Điều chỉnh text size --}}
                                    <p class="text-xs text-gray-600">Ngày 15/12/2017 của Bộ Lao động – Thương binh và Xã hội</p> {{-- GIẢM text size --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 4. KẾT LUẬN & CTA - CẬP NHẬT: ẢNH CHỦ TỊCH HĐQT TO & BÊN PHẢI --}}
<section class="relative py-16 md:py-24 bg-blue-900 text-white overflow-hidden">
    
    {{-- Lớp nền họa tiết --}}
    <div class="absolute inset-0 opacity-10" 
            style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png'); background-repeat: repeat;">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-blue-900/50 to-blue-950/80 pointer-events-none"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
        
        <h2 class="text-3xl md:text-5xl font-black mb-6 leading-tight">
            Cam kết <span class="text-yellow-400">chất lượng đào tạo</span>
        </h2>
        
        <p class="text-blue-100 text-lg md:text-xl mb-12 leading-relaxed font-light max-w-3xl mx-auto">
            Với mục tiêu đào tạo rõ ràng và chính sách chất lượng minh bạch, Trường Trung cấp Á Châu cam kết mang đến 
            cho người học môi trường đào tạo tốt nhất, đáp ứng nhu cầu nhân lực chất lượng cao cho xã hội.
        </p>
        
        {{-- KHỐI QUOTE VỚI AVATAR CHỦ TỊCH HĐQT (ĐÃ CHỈNH SỬA ĐỒNG BỘ) --}}
        <div class="bg-white/10 backdrop-blur-md p-8 md:p-12 rounded-3xl border border-white/20 shadow-2xl mb-12 relative overflow-hidden">
            
            {{-- Dấu ngoặc kép trang trí chìm --}}
            <i class="fas fa-quote-left text-white opacity-10 text-[8rem] absolute -top-4 -left-4 pointer-events-none"></i>

            <div class="flex flex-col-reverse md:flex-row items-center gap-8 md:gap-12 relative z-10">
                
                {{-- 1. Nội dung text (Bên Trái) --}}
                <div class="flex-1 text-center md:text-left">
                    <p class="text-xl md:text-2xl italic font-medium leading-relaxed mb-6 text-white">
                        "Chất lượng đào tạo là trách nhiệm cao nhất của Nhà trường - Cam kết đồng hành cùng sự thành công của mỗi học viên trên hành trình phát triển nghề nghiệp. - Vì mục tiêu chung: Tất cả là vì học sinh thân yêu"
                    </p>
                    
                    <div class="border-t border-white/20 pt-4 inline-block md:block w-full">
                        <div class="font-black text-yellow-400 text-xl md:text-2xl uppercase tracking-wide mb-1">
                            TS. Hồ Duy Xuyên
                        </div>
                        <div class="text-blue-200 text-sm md:text-base font-light uppercase tracking-widest">
                            Chủ tịch Hội đồng quản trị Trường Trung cấp Á Châu
                        </div>
                    </div>
                </div>

                {{-- 2. Ảnh Chủ tịch (Bên Phải & To hơn) --}}
                <div class="flex-shrink-0 relative">
                    {{-- Vòng tròn trang trí --}}
                    <div class="absolute inset-0 bg-yellow-400 rounded-full blur-xl opacity-20 animate-pulse"></div>
                    
                    <div class="relative w-32 h-32 md:w-48 md:h-48 p-1.5 rounded-full bg-gradient-to-br from-yellow-300 via-yellow-500 to-yellow-600 shadow-2xl">
                        {{-- LƯU Ý: Bạn cần chuẩn bị ảnh 'chu-tich-ho-duy-xuyen.webp' và đặt vào thư mục images --}}
                        <img src="{{ asset('images/chu-tich-ho-duy-xuyen.webp') }}" 
                                alt="TS. Hồ Duy Xuyên" 
                                class="w-full h-full rounded-full object-cover border-4 border-blue-900 bg-white shadow-inner"
                                onerror="this.src='https://ui-avatars.com/api/?name=Ho+Duy+Xuyen&background=random&color=fff&size=256'">
                        
                        {{-- Huy hiệu xác thực --}}
                        <div class="absolute bottom-2 right-2 md:bottom-3 md:right-3 bg-blue-600 text-white w-8 h-8 md:w-10 md:h-10 flex items-center justify-center rounded-full border-4 border-blue-900 shadow-lg z-20" title="Đã xác thực">
                            <i class="fas fa-check text-xs md:text-sm"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        {{-- Các nút bấm (CTA) ĐỒNG BỘ KIỂU DÁNG --}}
        <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
            <a href="{{ route('page.sumenh') }}" 
                class="group bg-yellow-500 hover:bg-yellow-400 text-blue-900 font-bold px-8 py-4 
                        rounded-full transition-all duration-300 shadow-[0_0_20px_rgba(234,179,8,0.5)] 
                        hover:shadow-[0_0_30px_rgba(234,179,8,0.7)] flex items-center gap-3 w-full md:w-auto justify-center hover:-translate-y-1">
                <i class="fas fa-arrow-left"></i>
                <span>Về Sứ mệnh & Tầm nhìn</span>
            </a>
            
            @if(Route::has('page.chungnhan'))
            <a href="{{ route('page.chungnhan') }}" 
                class="group bg-white hover:bg-gray-100 text-blue-900 font-bold px-8 py-4 
                        rounded-full transition-all duration-300 transform hover:-translate-y-1 
                        shadow-lg hover:shadow-xl flex items-center gap-3 w-full md:w-auto justify-center">
                <i class="fas fa-award"></i>
                <span>Xem chứng nhận chất lượng</span>
                <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
            @endif
            
            <a href="{{ route('page.gioithieu') }}" 
                class="group bg-transparent border-2 border-white/30 hover:border-white hover:bg-white/10 text-white 
                        font-bold px-8 py-4 rounded-full transition-all duration-300 
                        flex items-center gap-3 w-full md:w-auto justify-center">
                <i class="fas fa-home"></i>
                <span>Về trang chủ</span>
            </a>
        </div>
    </div>
</section>
</main>

{{-- LIGHTWEIGHT JAVASCRIPT ĐỒNG BỘ --}}
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