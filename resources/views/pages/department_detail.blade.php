@php
    $title = $department->seo_title ?: $department->name . ' - Trường Trung cấp Á Châu';
    $description = $department->seo_description ?: Str::limit(strip_tags($department->description), 150);
@endphp

@include('components.header')

<div class="bg-gray-50 min-h-screen pb-20 font-bevietnam">

    {{-- 1. HEADER BANNER (Giống hệt ảnh 3) --}}
    <div class="relative bg-[#2b4c99] py-14 md:py-20 overflow-hidden flex flex-col items-center justify-center min-h-[220px]">
        {{-- Hiệu ứng chữ chìm Watermark phía sau --}}
        <div class="absolute inset-0 flex items-center justify-center opacity-5 pointer-events-none select-none overflow-hidden">
            <span class="text-[80px] md:text-[140px] font-black text-white whitespace-nowrap tracking-tighter">
                {{ mb_strtoupper($department->name, 'UTF-8') }}
            </span>
        </div>

        <div class="relative z-10 text-center px-4">
            {{-- Nhãn vàng nhỏ trên cùng --}}
            <div class="mb-4">
                <span class="text-yellow-400 text-xs md:text-sm font-bold uppercase tracking-[0.2em]">
                    {{ $department->type === 'khoa' ? 'Khoa Chuyên Môn' : 'Phòng Ban Chức Năng' }}
                </span>
                <div class="w-24 h-px bg-yellow-400/50 mx-auto mt-2"></div>
            </div>
            
            {{-- Tiêu đề chính --}}
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 drop-shadow-sm">
                {{ $department->name }}
            </h1>
            
            {{-- Breadcrumb --}}
            <div class="text-gray-300 text-xs md:text-sm flex items-center justify-center gap-2 font-medium">
                <a href="/" class="hover:text-white transition flex items-center gap-1"><i class="fas fa-home"></i> Trang chủ</a>
                <span>/</span>
                <span class="text-white">{{ $department->name }}</span>
            </div>
        </div>
    </div>

    {{-- 2. MAIN CONTENT --}}
    <div class="max-w-[1200px] mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            {{-- CỘT TRÁI (NỘI DUNG CHÍNH) --}}
            <div class="lg:col-span-8 space-y-10">
                
                {{-- Box Giới thiệu --}}
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-1.5 h-6 bg-blue-600"></div>
                        <h2 class="text-2xl font-bold text-blue-900">Giới thiệu chung</h2>
                    </div>
                    
                    {{-- ẢNH ĐẠI DIỆN KHOA/PHÒNG BAN --}}
                    @if($department->image)
                        <div class="w-full mb-8 rounded-xl overflow-hidden shadow-sm bg-gray-50">
                            <img src="{{ asset('storage/' . $department->image) }}" 
                                 alt="Ảnh đại diện {{ $department->name }}" 
                                 class="w-full h-auto max-h-[550px] object-contain md:object-cover hover:scale-[1.02] transition-transform duration-700">
                        </div>
                    @endif
                    
                    {{-- Xử lý text để dù admin nhập plain text vẫn dễ đọc --}}
                    <div class="custom-content text-gray-700 leading-[1.8] text-[15px] text-justify">
                        @if($department->content)
                            {!! \App\Helpers\HtmlHelper::rich($department->content) !!}
                        @elseif($department->description)
                            {!! nl2br(e($department->description)) !!}
                        @else
                            <p class="italic text-gray-400">Nội dung giới thiệu đang được cập nhật...</p>
                        @endif
                    </div>
                </div>

                {{-- DANH SÁCH NGÀNH ĐÀO TẠO (Card dọc giống ảnh 2) --}}
                @if($department->type === 'khoa' && $relatedMajors->count() > 0)
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-1.5 h-6 bg-yellow-500"></div>
                        <h2 class="text-2xl font-bold text-blue-900">Các ngành đào tạo thuộc Khoa</h2>
                    </div>

                    <div class="grid grid-cols-1 gap-5">
                        @foreach($relatedMajors as $major)
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md hover:border-blue-200 transition duration-300 flex flex-col sm:flex-row group">
                            
                            {{-- Ảnh Thumbnail --}}
                            <div class="w-full sm:w-[260px] h-48 sm:h-auto relative overflow-hidden flex-shrink-0">
                                <img src="{{ $major->image ? asset('storage/' . $major->image) : 'https://via.placeholder.com/400x300' }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition duration-500" 
                                     alt="{{ $major->name }}">
                                
                                {{-- Nền chìm gradient giống thiết kế --}}
                                <div class="absolute inset-0 bg-blue-900/10"></div>
                                
                                {{-- Badge Thời gian --}}
                                <div class="absolute top-3 right-3 bg-yellow-400 text-blue-900 text-[11px] font-bold px-2 py-0.5 rounded shadow-sm">
                                    {{ $major->duration ?? '2 năm' }}
                                </div>
                            </div>
                            
                            {{-- Nội dung Card --}}
                            <div class="p-5 flex flex-col flex-1 justify-between">
                                <div>
                                    <h3 class="text-[18px] font-bold text-blue-950 group-hover:text-blue-700 transition mb-2">
                                        <a href="{{ route('major.detail', $major->slug) }}">
                                            {{ $major->name }}
                                        </a>
                                    </h3>
                                    
                                    <div class="text-gray-500 text-sm line-clamp-3 mb-4 leading-relaxed text-justify">
                                        {{ strip_tags($major->description) }}
                                    </div>
                                </div>

                                <div class="flex items-center justify-between border-t border-gray-100 pt-3 mt-2">
                                    <div class="text-sm text-[#059669] font-semibold flex items-center gap-1.5">
                                        <i class="fas fa-check-circle"></i> Miễn 100% học phí (Hệ 9+)
                                    </div>
                                    <a href="{{ route('major.detail', $major->slug) }}" class="text-blue-600 font-bold text-sm flex items-center gap-1 group/link">
                                        CHI TIẾT <i class="fas fa-chevron-right text-[10px] transform group-hover/link:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- CỘT PHẢI (SIDEBAR) - Giống hệt ảnh 2 --}}
            <div class="lg:col-span-4 space-y-6">
                
                {{-- Box Thông tin liên hệ --}}
                <div class="bg-white rounded-xl shadow-sm border border-blue-900 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <h3 class="text-[16px] font-bold text-blue-950 uppercase tracking-wide">
                            THÔNG TIN LIÊN HỆ
                        </h3>
                    </div>
                    
                    <div class="p-6">
                        <ul class="space-y-5 text-sm">
                            @if($department->contact_info && is_array($department->contact_info) && count($department->contact_info) > 0)
                                @foreach($department->contact_info as $key => $value)
                                    @if(!empty($value))
                                        <li class="flex items-start gap-3">
                                            <div class="text-blue-600 mt-1 flex-shrink-0 w-4 text-center">
                                                @if(Str::contains(strtolower($key), ['điện thoại', 'hotline'])) <i class="fas fa-phone-alt"></i>
                                                @elseif(Str::contains(strtolower($key), 'email')) <i class="fas fa-envelope"></i>
                                                @else <i class="fas fa-map-marker-alt"></i> @endif
                                            </div>
                                            <div>
                                                <p class="text-[11px] text-gray-500 font-bold uppercase tracking-wider mb-0.5">{{ $key }}</p>
                                                <p class="font-bold text-gray-900 text-[14px]">{{ $value }}</p>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            @else
                                <li class="flex items-start gap-3">
                                    <div class="text-blue-600 mt-1 flex-shrink-0 w-4 text-center"><i class="fas fa-map-marker-alt"></i></div>
                                    <div>
                                        <p class="text-[11px] text-gray-500 font-bold uppercase tracking-wider mb-0.5">VĂN PHÒNG</p>
                                        <p class="font-bold text-gray-900 text-[14px]">Trường Trung cấp Á Châu</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div class="text-blue-600 mt-1 flex-shrink-0 w-4 text-center"><i class="fas fa-phone-alt"></i></div>
                                    <div>
                                        <p class="text-[11px] text-gray-500 font-bold uppercase tracking-wider mb-0.5">HOTLINE</p>
                                        <p class="font-bold text-gray-900 text-[14px]">093 740 40 60</p>
                                    </div>
                                </li>
                            @endif
                        </ul>
                        
                        <div class="mt-6">
                            <a href="{{ route('page.register') }}" class="block text-center bg-[#f0f4f8] text-blue-700 font-bold py-2.5 px-4 rounded hover:bg-blue-600 hover:text-white transition duration-300">
                                Đăng ký tư vấn
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Box Các Khoa khác --}}
                @if($otherDepartments->count() > 0)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                        <h3 class="text-[15px] font-bold text-gray-800">
                            {{ $department->type === 'khoa' ? 'Các Khoa khác' : 'Phòng ban khác' }}
                        </h3>
                    </div>
                    <div class="p-3">
                        <ul class="space-y-1">
                            @foreach($otherDepartments as $other)
                            <li>
                                <a href="{{ $other->type === 'khoa' ? route('department.detail.khoa', $other->slug) : route('department.detail.phongban', $other->slug) }}" 
                                   class="flex items-center gap-3 p-3 rounded-lg hover:bg-blue-50 text-gray-600 hover:text-blue-600 transition group">
                                    <i class="fas fa-angle-right text-gray-300 group-hover:text-blue-500 text-sm transition"></i>
                                    <span class="font-medium text-[14px]">
                                        {{ $other->name }}
                                    </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

{{-- CSS KHÔI PHỤC ĐỊNH DẠNG HOÀN CHỈNH CHO TINYMCE VÀ TAILWIND --}}
<style>
    /* Khoảng cách đoạn văn */
    .custom-content p {
        margin-bottom: 1rem;
        line-height: 1.7;
    }
    .custom-content p:last-child {
        margin-bottom: 0;
    }

    /* KHÔI PHỤC IN ĐẬM, IN NGHIÊNG, GẠCH CHÂN */
    .custom-content b, 
    .custom-content strong {
        font-weight: 700 !important;
        color: #1e3a8a; /* Cho chữ in đậm có màu xanh đen quyền lực giống ảnh của bạn */
    }
    .custom-content i, 
    .custom-content em {
        font-style: italic !important;
    }
    .custom-content u {
        text-decoration: underline !important;
    }

    /* KHÔI PHỤC KÍCH THƯỚC CÁC THẺ TIÊU ĐỀ (HEADING) */
    .custom-content h1, 
    .custom-content h2, 
    .custom-content h3, 
    .custom-content h4, 
    .custom-content h5, 
    .custom-content h6 {
        font-weight: 800 !important;
        color: #1e3a8a; /* Màu xanh của trường */
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
        line-height: 1.3;
    }
    .custom-content h1 { font-size: 2.25rem !important; }
    .custom-content h2 { font-size: 1.875rem !important; }
    .custom-content h3 { font-size: 1.5rem !important; }
    .custom-content h4 { font-size: 1.25rem !important; }
    .custom-content h5 { font-size: 1.125rem !important; }
    .custom-content h6 { font-size: 1rem !important; }

    /* KHÔI PHỤC DANH SÁCH (BULLET & NUMBER) */
    .custom-content ul {
        list-style-type: disc !important;
        padding-left: 1.5rem !important;
        margin-top: 0.5rem !important;
        margin-bottom: 1rem !important;
    }
    .custom-content ol {
        list-style-type: decimal !important;
        padding-left: 1.5rem !important;
        margin-top: 0.5rem !important;
        margin-bottom: 1rem !important;
    }
    .custom-content li {
        margin-bottom: 0.35rem !important;
        display: list-item !important;
    }

    /* Đảm bảo ảnh/bảng chèn từ Editor không bị tràn khung */
    .custom-content img, .custom-content table {
        max-width: 100% !important;
        height: auto !important;
    }
</style>

@include('components.footer')