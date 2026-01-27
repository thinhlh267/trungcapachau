@php
    // 1. CẤU HÌNH TITLE & META
    $currentPage = $currentPage ?? 'index';
    $mainMenu = $mainMenu ?? 'index';

    // Hàm kiểm tra Active Menu
    $isActive = function($menu, $current) {
        return $menu === $current ? 'bg-blue-100 text-blue-700 font-bold border-b-2 border-yellow-500' : 'hover:text-yellow-500 hover:bg-gray-100';
    };
    $isSubNavActive = function($menu, $current) {
        return $menu === $current ? 'bg-yellow-500 text-white font-bold shadow-md' : 'hover:text-yellow-500 hover:bg-gray-50 text-gray-800';
    };

    // Định nghĩa các nhóm trang
    $tongquanPages = ['gioithieu', 'sumenh', 'muctieu', 'chungnhan', 'sodotochuc', 'thungo'];
    $tuyensinhPages = ['tuyensinh_main', 'quytrinh', 'faq', 'dangkytuvan'];

    // Logic SEO Title (Có thể mở rộng thêm)
    $pageTitles = [
        'index' => 'Trang chủ - Trường Trung cấp Á Châu',
        'gioithieu' => 'Giới thiệu chung - Trường Trung cấp Á Châu',
    ];
    $currentTitle = $title ?? ($pageTitles[$currentPage] ?? 'Trường Trung cấp Á Châu - Đào tạo nghề & Văn hóa');
    $metaDesc = "Trường Trung cấp Á Châu. Đào tạo đa ngành nghề, kết hợp văn hóa và kỹ năng thực tế.";
@endphp

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>{{ $currentTitle }}</title>
  <meta name="description" content="{{ $metaDesc }}">
  <meta name="keywords" content="Trung cấp Á Châu, Tuyển sinh trung cấp, Học nghề, Đào tạo nghề Tây Ninh">
  <meta name="author" content="Trường Trung cấp Á Châu">
  <meta name="robots" content="index, follow">
  
  <link rel="icon" type="image/png" href="{{ asset('assets/images/trungcapachau.png') }}">

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <style>
    /* FIX CĂN CHỈNH DROPDOWN CHÍNH XÁC */
    .menu-dropdown-container {
      position: relative;
    }
    
    .menu-dropdown {
      position: absolute;
      top: 100%;
      left: 0;
      opacity: 0;
      visibility: hidden;
      transform: translateY(10px);
      transition: all 0.3s ease;
      z-index: 100;
    }
    
    .menu-dropdown-container:hover .menu-dropdown {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }
    
    /* Căn giữa dropdown với menu item */
    .dropdown-center {
      left: 50%;
      transform: translateX(-50%) translateY(10px);
    }
    
    .menu-dropdown-container:hover .dropdown-center {
      transform: translateX(-50%) translateY(0);
    }
    
    /* Dropdown rộng hơn cho ngành đào tạo */
    .dropdown-wide {
      min-width: 320px;
      max-width: 400px;
    }
  </style>
</head>

<body class="bg-gray-50">
<nav id="navbar" class="w-full bg-white shadow sticky top-0 z-50 transition-transform duration-500">
  <div class="w-full px-4 md:px-8 flex items-center h-24 justify-between">
    
    {{-- LOGO --}}
    <a href="{{ route('home') }}" class="flex-shrink-0 logo-link group text-blue-900 font-bold text-xl md:text-2xl lg:text-3xl relative inline-block transition duration-300 whitespace-nowrap">
       TRƯỜNG TRUNG CẤP Á CHÂU
    </a>
    
    {{-- DESKTOP MENU --}}
    <div class="hidden lg:flex flex-1 items-center justify-center gap-8 xl:gap-12 whitespace-nowrap px-4">
        
        {{-- 1. TỔNG QUAN --}}
        <div class="menu-dropdown-container">
            <a href="#" class="menu-button font-bevietnam text-base xl:text-lg px-4 py-3 no-underline transition duration-300 uppercase font-semibold {{ ($mainMenu === 'tongquan' || in_array($currentPage, $tongquanPages)) ? 'text-yellow-500' : 'text-blue-900 hover:text-yellow-500' }} flex items-center justify-center">
                Tổng quan <i class="fas fa-chevron-down ml-2 text-xs"></i>
            </a>

            <ul class="menu-dropdown dropdown-center bg-white text-gray-800 shadow-xl rounded-lg w-64 border-t-4 border-yellow-500 overflow-hidden list-none p-0">
                <li><a href="{{ route('page.gioithieu') }}" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-600 transition border-b border-gray-100 flex items-center"><i class="fas fa-university mr-3 text-yellow-500 w-5"></i> Giới thiệu chung</a></li>
                <li><a href="{{ route('page.sumenh') }}" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-600 transition border-b border-gray-100 flex items-center"><i class="fas fa-compass mr-3 text-yellow-500 w-5"></i> Sứ mệnh - Tầm nhìn</a></li>
                <li><a href="{{ route('page.muctieu') }}" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-600 transition border-b border-gray-100 flex items-center"><i class="fas fa-bullseye mr-3 text-yellow-500 w-5"></i> Mục tiêu giáo dục</a></li>
                <li><a href="{{ route('page.chungnhan') }}" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-600 transition border-b border-gray-100 flex items-center"><i class="fas fa-award mr-3 text-yellow-500 w-5"></i> Chứng nhận</a></li>
                <li><a href="{{ route('page.thungo') }}" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-600 transition border-b border-gray-100 flex items-center"><i class="fas fa-envelope-open-text mr-3 text-yellow-500 w-5"></i> Thư ngỏ</a></li>
                <li><a href="{{ route('page.sodotochuc') }}" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-600 transition flex items-center"><i class="fas fa-sitemap mr-3 text-yellow-500 w-5"></i> Sơ đồ tổ chức</a></li>
            </ul>
        </div>

        {{-- 2. NGÀNH ĐÀO TẠO --}}
        <div class="menu-dropdown-container">
            <a href="#" class="menu-button font-bevietnam text-base xl:text-lg px-4 py-3 no-underline transition duration-300 uppercase font-semibold text-blue-900 hover:text-yellow-500 flex items-center justify-center gap-1">
                Ngành Đào Tạo <i class="fas fa-chevron-down text-xs ml-2"></i>
            </a>
            <div class="menu-dropdown dropdown-center dropdown-wide bg-white shadow-lg rounded-lg border-t-4 border-yellow-500">
                <div class="max-h-[400px] overflow-y-auto">
                    @if(isset($headerMajors) && $headerMajors->count() > 0)
                        @foreach($headerMajors as $major)
                            <a href="{{ route('major.detail', $major->slug) }}" class="block px-6 py-3 text-blue-900 hover:bg-gray-50 hover:text-yellow-600 border-b border-gray-100 last:border-0 transition duration-200 whitespace-normal">
                                <i class="fas fa-graduation-cap mr-3 text-yellow-500 w-5"></i> {{ $major->name }}
                            </a>
                        @endforeach
                    @else
                        <span class="block px-6 py-4 text-gray-400 italic text-sm text-center">Đang cập nhật...</span>
                    @endif
                </div>
            </div>
        </div>

        {{-- 3. TUYỂN SINH (ĐÃ SỬA CSS CHO ĐỒNG BỘ) --}}
        <div class="menu-dropdown-container">
            {{-- Link cha --}}
            <a href="{{ route('admission.index') }}" 
               class="menu-button font-bevietnam text-base xl:text-lg px-4 py-3 no-underline transition duration-300 uppercase font-semibold flex items-center justify-center gap-1 {{ request()->routeIs('admission.*') ? 'text-yellow-500' : 'text-blue-900 hover:text-yellow-500' }}">
                TUYỂN SINH <i class="fas fa-chevron-down text-xs ml-2"></i>
            </a>

            {{-- Dropdown Menu --}}
            <ul class="menu-dropdown dropdown-center dropdown-wide bg-white text-gray-800 shadow-xl rounded-lg border-t-4 border-yellow-500 overflow-hidden list-none p-0 min-w-[280px]">
                
                {{-- Loop qua danh mục động --}}
                @if(isset($admissionMenu) && count($admissionMenu) > 0)
                    @foreach($admissionMenu as $cat)
                    <li>
                        <a href="{{ route('admission.index', ['category' => $cat->slug]) }}" 
                           class="block px-6 py-3 hover:bg-blue-50 hover:text-blue-600 transition border-b border-gray-100 flex items-center">
                            <i class="fas fa-graduation-cap mr-3 text-yellow-500 w-5"></i> 
                            {{ $cat->name }}
                        </a>
                    </li>
                    @endforeach
                @else
                    <li><span class="block px-6 py-3 text-gray-400 italic text-sm">Đang cập nhật hệ đào tạo...</span></li>
                @endif

                {{-- Các link tĩnh --}}
                
                <li>
                    <a href="#" class="block px-6 py-3 hover:bg-blue-50 hover:text-blue-600 transition border-b border-gray-100 flex items-center">
                        <i class="fas fa-question-circle mr-3 text-yellow-500 w-5"></i> Câu hỏi thường gặp
                    </a>
                </li>
                <li>
                    <a href="{{ route('admission.index') }}#dang-ky" class="block px-6 py-3 hover:bg-blue-50 hover:text-blue-600 transition flex items-center">
                        <i class="fas fa-edit mr-3 text-yellow-500 w-5"></i> Đăng ký Tư vấn
                    </a>
                </li>
            </ul>
        </div>
        
        {{-- 4. TIN TỨC --}}
        <div>
            <a href="{{ route('news.index') }}" class="menu-button font-bevietnam text-base xl:text-lg px-4 py-3 no-underline transition duration-300 uppercase font-semibold {{ $mainMenu === 'tintuc' ? 'text-yellow-500' : 'text-blue-900 hover:text-yellow-500' }} flex items-center justify-center">
                Tin tức
            </a>
        </div>

        {{-- 5. LIÊN HỆ --}}
        <div>
            <a href="{{ route('page.lienhe') }}" class="menu-button font-bevietnam text-base xl:text-lg px-4 py-3 no-underline hover:text-yellow-500 transition duration-300 uppercase font-semibold flex items-center justify-center">
                Liên hệ
            </a>
        </div>
    </div>
    
    {{-- MOBILE BUTTON --}}
    <div class="lg:hidden ml-auto">
        <button id="mobile-menu-btn" class="text-blue-900 text-2xl focus:outline-none p-2 hover:text-yellow-500 transition">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    
    {{-- HOTLINE --}}
    <div class="hidden lg:block w-auto">
         <a href="tel:0937404060" class="flex items-center gap-2 bg-yellow-400 text-blue-900 px-4 py-3 rounded-full font-bold shadow hover:bg-yellow-500 transition transform hover:scale-105 whitespace-nowrap">
            <i class="fas fa-phone-alt"></i> <span class="font-semibold">093 740 40 60</span>
        </a>
    </div>
  </div>
</nav>

    {{-- MOBILE MENU OVERLAY --}}
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black/50 z-[999] hidden transition-opacity duration-300 opacity-0">
        <div id="mobile-menu-content" class="absolute top-0 right-0 w-[80%] max-w-[300px] h-full bg-white shadow-2xl transform translate-x-full transition-transform duration-300 flex flex-col">
            
            <div class="flex items-center justify-between p-4 border-b border-gray-200 bg-blue-50">
                <span class="font-bold text-blue-900 text-lg">MENU</span>
                <button id="close-mobile-menu" class="text-red-500 text-2xl hover:rotate-90 transition-transform duration-300">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto p-4 space-y-4 font-bevietnam">
                <a href="{{ route('home') }}" class="block font-semibold text-gray-700 hover:text-blue-600 border-b pb-2">Trang chủ</a>
                
                {{-- Mobile: TỔNG QUAN --}}
                <div class="space-y-2">
                    <p class="font-bold text-blue-900 uppercase text-sm border-l-4 border-yellow-500 pl-2">Tổng quan</p>
                    <a href="{{ route('page.gioithieu') }}" class="block pl-4 text-sm text-gray-600 hover:text-blue-600 py-1">Giới thiệu chung</a>
                    <a href="{{ route('page.sumenh') }}" class="block pl-4 text-sm text-gray-600 hover:text-blue-600 py-1">Sứ mệnh & Tầm nhìn</a>
                    <a href="{{ route('page.muctieu') }}" class="block pl-4 text-sm text-gray-600 hover:text-blue-600 py-1">Mục tiêu giáo dục</a>
                    <a href="{{ route('page.chungnhan') }}" class="block pl-4 text-sm text-gray-600 hover:text-blue-600 py-1">Chứng nhận</a>
                    <a href="{{ route('page.thungo') }}" class="block pl-4 text-sm text-gray-600 hover:text-blue-600 py-1">Thư ngỏ</a>
                    <a href="{{ route('page.sodotochuc') }}" class="block pl-4 text-sm text-gray-600 hover:text-blue-600 py-1">Sơ đồ tổ chức</a>
                </div>

                {{-- Mobile: NGÀNH ĐÀO TẠO --}}
                <div class="space-y-2">
                    <p class="font-bold text-blue-900 uppercase text-sm border-l-4 border-yellow-500 pl-2">Ngành Đào Tạo</p>
                    @if(isset($headerMajors) && $headerMajors->count() > 0)
                        @foreach($headerMajors as $major)
                            <a href="{{ route('major.detail', $major->slug) }}" class="block pl-4 text-sm text-gray-600 hover:text-blue-600 py-1 font-medium">• {{ $major->name }}</a>
                        @endforeach
                    @else
                        <span class="block pl-4 text-sm text-gray-400 italic">Đang cập nhật...</span>
                    @endif
                </div>

                {{-- Mobile: TUYỂN SINH (ĐÃ SỬA LẠI THÀNH MENU ĐỘNG) --}}
                <div class="space-y-2">
                    <p class="font-bold text-blue-900 uppercase text-sm border-l-4 border-yellow-500 pl-2">Tuyển sinh</p>
                    
                    {{-- Loop danh mục động --}}
                    @if(isset($admissionMenu) && count($admissionMenu) > 0)
                        @foreach($admissionMenu as $cat)
                            <a href="{{ route('admission.index', ['category' => $cat->slug]) }}" 
                               class="block pl-4 text-sm text-gray-600 hover:text-blue-600 py-1 font-medium">
                               • {{ $cat->name }}
                            </a>
                        @endforeach
                    @endif

                    <a href="#" class="block pl-4 text-sm text-gray-600 hover:text-blue-600 py-1">Câu hỏi thường gặp</a>
                    <a href="{{ route('admission.index') }}#dang-ky" class="block pl-4 text-sm text-yellow-600 font-bold hover:text-yellow-700 py-1">Đăng ký Tư vấn</a>
                </div>

                <a href="{{ route('news.index') }}" class="block font-semibold text-gray-700 hover:text-blue-600 border-t pt-2">Tin tức</a>
                <a href="{{ route('page.lienhe') }}" class="block font-semibold text-gray-700 hover:text-blue-600 border-t pt-2">Liên hệ</a>
            </div>
            
            <div class="p-4 bg-gray-50 border-t border-gray-200 text-center">
                <a href="tel:0937404060" class="inline-block bg-yellow-400 text-blue-900 px-6 py-2 rounded-full font-bold shadow hover:bg-yellow-500 w-full">
                    <i class="fas fa-phone-alt mr-2"></i> 093 740 40 60
                </a>
            </div>
        </div>
    </div>

{{-- SUB-NAV BAR (Giữ nguyên logic cũ) --}}
@php
    $excludeFromSubNav = ['muctieu', 'chungnhan', 'thungo', 'sodotochuc'];
@endphp

@if (in_array($currentPage, $tongquanPages) && !in_array($currentPage, $excludeFromSubNav))
<div class="w-full bg-white shadow-lg flex flex-wrap justify-center gap-4 md:gap-16 items-center text-sm md:text-base font-semibold uppercase font-bevietnam py-4 px-2 border-t border-gray-200">
    <a href="{{ route('page.gioithieu') }}" class="px-4 py-2 rounded-full transition duration-200 text-center {{ $isSubNavActive('gioithieu', $currentPage) }}">Giới thiệu</a>
    <a href="{{ route('page.sumenh') }}" class="px-4 py-2 rounded-full transition duration-200 text-center {{ $isSubNavActive('sumenh', $currentPage) }}">Sứ mệnh & Tầm nhìn</a>
    <a href="{{ route('page.muctieu') }}" class="px-4 py-2 rounded-full transition duration-200 text-center {{ $isSubNavActive('muctieu', $currentPage) }}">Mục tiêu giáo dục</a>
    <a href="{{ route('page.chungnhan') }}" class="px-4 py-2 rounded-full transition duration-200 text-center {{ $isSubNavActive('chungnhan', $currentPage) }}">Chứng nhận</a>
</div>
@endif

    {{-- SCRIPTS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script>
        // Mobile Menu Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const closeMobileMenu = document.getElementById('close-mobile-menu');
            const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
            const mobileMenuContent = document.getElementById('mobile-menu-content');
            
            // Mở mobile menu
            mobileMenuBtn.addEventListener('click', function() {
                mobileMenuOverlay.classList.remove('hidden');
                setTimeout(() => {
                    mobileMenuOverlay.classList.remove('opacity-0');
                    mobileMenuContent.classList.remove('translate-x-full');
                }, 10);
            });
            
            // Đóng mobile menu
            function closeMenu() {
                mobileMenuOverlay.classList.add('opacity-0');
                mobileMenuContent.classList.add('translate-x-full');
                setTimeout(() => {
                    mobileMenuOverlay.classList.add('hidden');
                }, 300);
            }
            
            closeMobileMenu.addEventListener('click', closeMenu);
            mobileMenuOverlay.addEventListener('click', function(e) {
                if (e.target === mobileMenuOverlay) {
                    closeMenu();
                }
            });
            
            // Khởi tạo AOS
            AOS.init({
                duration: 800,
                once: true,
                offset: 100
            });
        });
    </script>
</body>
</html>