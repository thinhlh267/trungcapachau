@include('components.header')

<div class="bg-gray-50 min-h-screen pb-20 font-bevietnam">

    {{-- 1. HERO HEADER (Banner tên Khoa) --}}
    <div class="relative bg-blue-900 py-16 md:py-20 overflow-hidden">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900 via-blue-800 to-blue-900"></div>
        
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <span class="inline-block py-1 px-3 rounded bg-yellow-400 text-blue-900 text-xs font-bold uppercase tracking-wider mb-3">
                {{ $department->type === 'khoa' ? 'Khoa Chuyên Môn' : 'Phòng Ban Chức Năng' }}
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight mb-4">
                {{ $department->name }}
            </h1>
            
            {{-- Breadcrumb đơn giản --}}
            <div class="text-blue-200 text-sm flex items-center justify-center gap-2">
                <a href="/" class="hover:text-white transition"><i class="fas fa-home"></i> Trang chủ</a>
                <span>/</span>
                <span class="text-white">{{ $department->name }}</span>
            </div>
        </div>
    </div>

    {{-- 2. MAIN CONTENT --}}
    <div class="max-w-7xl mx-auto px-4 -mt-10 relative z-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            {{-- CỘT TRÁI (NỘI DUNG CHÍNH) --}}
            <div class="lg:col-span-8">
                
                {{-- Box Giới thiệu --}}
                <div class="bg-white p-6 md:p-10 rounded-xl shadow-sm border border-gray-100 mb-8">
                    <h2 class="text-2xl font-bold text-blue-900 mb-6 flex items-center">
                        <span class="w-1.5 h-8 bg-yellow-500 mr-3 rounded-full"></span>
                        Giới thiệu chung
                    </h2>
                    
                    <div class="prose prose-blue max-w-none text-gray-600 leading-relaxed text-justify">
                        @if($department->description)
                            {!! nl2br(e($department->description)) !!}
                        @else
                            <p class="italic text-gray-400">Nội dung giới thiệu đang được cập nhật...</p>
                        @endif
                    </div>
                </div>

                {{-- DANH SÁCH NGÀNH ĐÀO TẠO (Chỉ hiện nếu là Khoa và có ngành) --}}
                @if($department->type === 'khoa' && $relatedMajors->count() > 0)
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-blue-900 mb-6 flex items-center">
                        <span class="w-1.5 h-8 bg-blue-600 mr-3 rounded-full"></span>
                        Các ngành đào tạo thuộc Khoa
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($relatedMajors as $major)
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition group">
                            {{-- Ảnh ngành --}}
                            <div class="h-48 overflow-hidden relative">
                                <img src="{{ $major->image ? asset('storage/' . $major->image) : 'https://via.placeholder.com/400x300' }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500" 
                                     alt="{{ $major->name }}">
                                <div class="absolute top-0 right-0 bg-yellow-400 text-blue-900 text-xs font-bold px-3 py-1 m-3 rounded">
                                    {{ $major->duration ?? '2 năm' }}
                                </div>
                            </div>
                            
                            {{-- Nội dung ngành --}}
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition mb-2 line-clamp-2">
                                    <a href="{{ route('major.detail', $major->slug) }}">
                                        {{ $major->name }}
                                    </a>
                                </h3>
                                <div class="flex items-center text-sm text-green-700 font-bold mb-4 bg-green-50 border border-green-200 w-fit px-3 py-1.5 rounded-full shadow-sm">
    <i class="fas fa-check-circle mr-2"></i> Miễn 100% học phí (Hệ 9+)
</div>
                                <a href="{{ route('major.detail', $major->slug) }}" class="block w-full text-center py-2 rounded border border-blue-600 text-blue-600 font-bold hover:bg-blue-600 hover:text-white transition uppercase text-sm">
                                    Xem chi tiết
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

            {{-- CỘT PHẢI (SIDEBAR) --}}
            <div class="lg:col-span-4 space-y-8">
                
                {{-- 1. THÔNG TIN LIÊN HỆ --}}
                <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-blue-900">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 uppercase">Thông tin liên hệ</h3>
                    <ul class="space-y-4 text-sm text-gray-600">
                        <li class="flex items-start">
                            <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 mr-3 flex-shrink-0">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <span>Văn phòng Khoa: Tầng 1, Khu A, Trường Trung cấp Á Châu</span>
                        </li>
                        <li class="flex items-center">
                            <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 mr-3 flex-shrink-0">
                                <i class="fas fa-phone"></i>
                            </div>
                            <span class="font-bold text-gray-800">093 740 40 60</span>
                        </li>
                        <li class="flex items-center">
                            <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 mr-3 flex-shrink-0">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <span>info@acv.edu.vn</span>
                        </li>
                    </ul>
                    
                    <div class="mt-6 pt-6 border-t border-gray-100 text-center">
                        <a href="{{ route('page.register') }}" class="inline-block bg-yellow-400 text-blue-900 font-bold py-3 px-8 rounded-full hover:bg-yellow-500 transition shadow-md animate-pulse">
                            ĐĂNG KÝ TƯ VẤN
                        </a>
                    </div>
                </div>

                {{-- 2. ĐƠN VỊ KHÁC --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 pb-2 border-b border-gray-100">
                        {{ $department->type === 'khoa' ? 'Các Khoa khác' : 'Các Phòng ban khác' }}
                    </h3>
                    <div class="space-y-3">
                        @foreach($otherDepartments as $other)
                        <a href="{{ $other->type === 'khoa' ? route('department.detail.khoa', $other->slug) : route('department.detail.phongban', $other->slug) }}" 
                           class="flex items-center p-3 rounded-lg hover:bg-blue-50 group transition">
                            <div class="w-10 h-10 rounded-full bg-gray-100 group-hover:bg-white group-hover:text-blue-600 flex items-center justify-center text-gray-400 mr-3 transition shadow-sm">
                                <i class="{{ $other->type === 'khoa' ? 'fas fa-graduation-cap' : 'fas fa-building' }}"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-blue-700 transition">
                                {{ $other->name }}
                            </span>
                        </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@include('components.footer')