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
        'sumenh' => 'Sứ mệnh & Tầm nhìn - Trường Trung cấp Á Châu',
        'muctieu' => 'Mục tiêu giáo dục - Trường Trung cấp Á Châu',
        'chungnhan' => 'Chứng nhận chất lượng - Trường Trung cấp Á Châu',
        'thungo' => 'Thư ngỏ - Trường Trung cấp Á Châu',
        'sodotochuc' => 'Sơ đồ tổ chức - Trường Trung cấp Á Châu',
        'tuyensinh' => 'Thông tin tuyển sinh - Trường Trung cấp Á Châu',
        'tintuc' => 'Tin tức & Sự kiện - Trường Trung cấp Á Châu',
        'lienhe' => 'Liên hệ - Trường Trung cấp Á Châu',
    ];
    
    $currentTitle = $title ?? ($pageTitles[$currentPage] ?? 'Trường Trung cấp Á Châu - Đào tạo nghề & Văn hóa');
    $metaDesc = $description ?? "Trường Trung cấp Á Châu Tây Ninh - Đào tạo đa ngành nghề chất lượng cao, kết hợp văn hóa và kỹ năng thực tế. Đào tạo hệ 9+, 12+, liên thông Đại học.";
    
    // Tạo URL canonical và OG image
    $canonicalUrl = url()->current();
    $ogImage = asset('assets/images/og-image.jpg'); // Bạn cần tạo file này sau
@endphp

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  {{-- TITLE & BASIC META --}}
  <title>{{ $currentTitle }}</title>
  <meta name="description" content="{{ $metaDesc }}">
  <meta name="keywords" content="Trung cấp Á Châu, Tuyển sinh trung cấp, Học nghề, Đào tạo nghề Tây Ninh, Trường nghề Tây Ninh, Đào tạo hệ 9+, Đào tạo hệ 12+, Liên thông Đại học">
  <meta name="author" content="Trường Trung cấp Á Châu">
  <meta name="robots" content="index, follow">
  
  {{-- CANONICAL URL --}}
  <link rel="canonical" href="{{ $canonicalUrl }}">
  
  {{-- FAVICON --}}
  <link rel="icon" type="image/png" href="{{ asset('assets/images/trungcapachau.jpg') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  {{-- OPEN GRAPH (Facebook, Zalo, LinkedIn) --}}
  <meta property="og:title" content="{{ $currentTitle }}">
  <meta property="og:description" content="{{ $metaDesc }}">
  <meta property="og:image" content="{{ $ogImage }}">
  <meta property="og:url" content="{{ $canonicalUrl }}">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="vi_VN">
  <meta property="og:site_name" content="Trường Trung cấp Á Châu">
  
  {{-- TWITTER CARD --}}
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ $currentTitle }}">
  <meta name="twitter:description" content="{{ $metaDesc }}">
  <meta name="twitter:image" content="{{ $ogImage }}">
  
  {{-- THEME COLOR (Mobile Browser) --}}
  <meta name="theme-color" content="#1e3a8a">
  <meta name="msapplication-navbutton-color" content="#1e3a8a">
  <meta name="apple-mobile-web-app-status-bar-style" content="#1e3a8a">
  
  {{-- PRELOAD & PREFETCH FOR PERFORMANCE --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="dns-prefetch" href="https://cdn.tailwindcss.com">
  <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
  
  {{-- STYLESHEETS --}}
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
    
    /* SMOOTH SCROLL */
    html {
      scroll-behavior: smooth;
    }
    
    /* BETTER FOCUS FOR ACCESSIBILITY */
    *:focus {
      outline: 2px solid #f59e0b;
      outline-offset: 2px;
    }
    
    /* PREVENT FONT FLASH */
    body {
      font-family: 'Be Vietnam Pro', system-ui, sans-serif;
    }
  </style>
</head>

<body class="bg-gray-50">
{{-- NAVIGATION WITH ARIA ATTRIBUTES --}}
<nav id="navbar" class="w-full bg-white shadow sticky top-0 z-50 transition-all duration-300" aria-label="Menu chính">
  <div class="w-full max-w-[1920px] mx-auto px-4 md:px-6 lg:px-4 xl:px-8 flex items-center h-20 md:h-24 justify-between">
    
    {{-- LOGO (Tự động thu nhỏ trên màn hình vừa, phóng to trên màn hình rộng) --}}
    <a href="{{ route('home') }}" 
       class="flex-shrink-0 logo-link group text-blue-900 font-extrabold text-lg md:text-xl lg:text-[1.1rem] xl:text-2xl 2xl:text-3xl relative inline-block transition duration-300 whitespace-nowrap"
       aria-label="Trang chủ - Trường Trung cấp Á Châu">
       TRUNG CẤP Á CHÂU
    </a>
    
    {{-- DESKTOP MENU (Đã thiết lập flex-shrink và điều chỉnh gap/padding tự động) --}}
    <div class="hidden lg:flex flex-1 items-center justify-end lg:gap-1 xl:gap-4 2xl:gap-8 pl-4">
        
        {{-- 1. TỔNG QUAN --}}
        <div class="menu-dropdown-container relative group flex-shrink-0" role="menuitem">
            <button type="button"
                    class="menu-button font-bevietnam lg:text-[13px] xl:text-[15px] 2xl:text-lg lg:px-2 xl:px-3 py-3 no-underline transition duration-300 uppercase font-semibold {{ ($mainMenu === 'tongquan' || in_array($currentPage, $tongquanPages)) ? 'text-yellow-500 border-b-2 border-yellow-500' : 'text-blue-900 hover:text-yellow-500' }} flex items-center justify-center focus:outline-none whitespace-nowrap"
                    aria-haspopup="true" aria-expanded="false">
                Tổng quan <i class="fas fa-chevron-down ml-1 xl:ml-2 text-[10px] xl:text-xs"></i>
            </button>
            <ul class="menu-dropdown dropdown-center bg-white text-gray-800 shadow-xl rounded-lg w-64 border-t-4 border-yellow-500 overflow-hidden list-none p-0">
                <li role="none"><a href="{{ route('page.gioithieu') }}" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-600 transition border-b border-gray-100 flex items-center text-sm" role="menuitem"><i class="fas fa-university mr-3 text-yellow-500 w-5 text-center"></i> Giới thiệu chung</a></li>
                <li role="none"><a href="{{ route('page.sumenh') }}" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-600 transition border-b border-gray-100 flex items-center text-sm" role="menuitem"><i class="fas fa-compass mr-3 text-yellow-500 w-5 text-center"></i> Sứ mệnh - Tầm nhìn</a></li>
                <li role="none"><a href="{{ route('page.muctieu') }}" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-600 transition border-b border-gray-100 flex items-center text-sm" role="menuitem"><i class="fas fa-bullseye mr-3 text-yellow-500 w-5 text-center"></i> Mục tiêu giáo dục</a></li>
                <li role="none"><a href="{{ route('page.chungnhan') }}" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-600 transition border-b border-gray-100 flex items-center text-sm" role="menuitem"><i class="fas fa-award mr-3 text-yellow-500 w-5 text-center"></i> Chứng nhận</a></li>
                <li role="none"><a href="{{ route('page.thungo') }}" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-600 transition border-b border-gray-100 flex items-center text-sm" role="menuitem"><i class="fas fa-envelope-open-text mr-3 text-yellow-500 w-5 text-center"></i> Thư ngỏ</a></li>
                <li role="none"><a href="{{ route('page.sodotochuc') }}" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-600 transition flex items-center text-sm" role="menuitem"><i class="fas fa-sitemap mr-3 text-yellow-500 w-5 text-center"></i> Sơ đồ tổ chức</a></li>
            </ul>
        </div>

        {{-- 2. NGÀNH ĐÀO TẠO --}}
        <div class="menu-dropdown-container relative group flex-shrink-0" role="menuitem">
            <button type="button"
                    class="menu-button font-bevietnam lg:text-[13px] xl:text-[15px] 2xl:text-lg lg:px-2 xl:px-3 py-3 no-underline transition duration-300 uppercase font-semibold text-blue-900 hover:text-yellow-500 flex items-center justify-center focus:outline-none whitespace-nowrap">
                Ngành Đào Tạo <i class="fas fa-chevron-down ml-1 xl:ml-2 text-[10px] xl:text-xs"></i>
            </button>
            <div class="menu-dropdown dropdown-center dropdown-wide bg-white shadow-lg rounded-lg border-t-4 border-yellow-500">
                <div class="max-h-[400px] overflow-y-auto">
                    @if(isset($headerMajors) && $headerMajors->count() > 0)
                        @foreach($headerMajors as $major)
                            <a href="{{ route('major.detail', $major->slug) }}" class="block px-6 py-3 text-blue-900 hover:bg-gray-50 hover:text-yellow-600 border-b border-gray-100 last:border-0 transition duration-200 whitespace-normal text-sm" role="menuitem">
                                <i class="fas fa-graduation-cap mr-3 text-yellow-500 w-5 text-center"></i> {{ $major->name }}
                            </a>
                        @endforeach
                    @else
                        <span class="block px-6 py-4 text-gray-400 italic text-sm text-center">Đang cập nhật...</span>
                    @endif
                </div>
            </div>
        </div>

        {{-- 3. TUYỂN SINH --}}
        <div class="menu-dropdown-container relative group flex-shrink-0" role="menuitem">
            <button type="button"
                    class="menu-button font-bevietnam lg:text-[13px] xl:text-[15px] 2xl:text-lg lg:px-2 xl:px-3 py-3 no-underline transition duration-300 uppercase font-semibold flex items-center justify-center focus:outline-none whitespace-nowrap {{ request()->routeIs('admission.*') ? 'text-yellow-500 border-b-2 border-yellow-500' : 'text-blue-900 hover:text-yellow-500' }}">
                Tuyển sinh <i class="fas fa-chevron-down ml-1 xl:ml-2 text-[10px] xl:text-xs"></i>
            </button>
            <ul class="menu-dropdown dropdown-center bg-white text-gray-800 shadow-xl rounded-lg border-t-4 border-yellow-500 overflow-hidden list-none p-0 min-w-[260px]">
                @if(isset($admissionMenu) && count($admissionMenu) > 0)
                    @foreach($admissionMenu as $cat)
                    <li role="none">
                        <a href="{{ route('admission.index', ['category' => $cat->slug]) }}" class="block px-6 py-3 hover:bg-blue-50 hover:text-blue-600 transition border-b border-gray-100 flex items-center text-sm" role="menuitem">
                            <i class="fas fa-graduation-cap mr-3 text-yellow-500 w-5 text-center"></i> {{ $cat->name }}
                        </a>
                    </li>
                    @endforeach
                @else
                    <li role="none"><span class="block px-6 py-3 text-gray-400 italic text-sm">Đang cập nhật...</span></li>
                @endif
                <li role="none"><a href="{{ route('page.faq') }}" class="block px-6 py-3 hover:bg-blue-50 hover:text-blue-600 transition border-b border-gray-100 flex items-center text-sm" role="menuitem"><i class="fas fa-question-circle mr-3 text-yellow-500 w-5 text-center"></i> Câu hỏi thường gặp</a></li>
                <li role="none"><a href="{{ route('page.register') }}" class="block px-6 py-3 hover:bg-blue-50 hover:text-blue-600 transition flex items-center text-sm font-bold text-yellow-600" role="menuitem"><i class="fas fa-edit mr-3 text-yellow-500 w-5 text-center"></i> Đăng ký Tư vấn</a></li>
            </ul>
        </div>
        
        {{-- 4. KHOA - PHÒNG BAN --}}
        <div class="menu-dropdown-container relative group flex-shrink-0" role="menuitem">
            <button type="button" 
                    class="menu-button font-bevietnam lg:text-[13px] xl:text-[15px] 2xl:text-lg lg:px-2 xl:px-3 py-3 no-underline transition duration-300 uppercase font-semibold text-blue-900 hover:text-yellow-500 flex items-center justify-center focus:outline-none whitespace-nowrap">
                Khoa - Phòng ban <i class="fas fa-chevron-down ml-1 xl:ml-2 text-[10px] xl:text-xs"></i>
            </button>
            <div class="menu-dropdown dropdown-center bg-white shadow-xl rounded-lg border-t-4 border-yellow-500 min-w-[260px]">
                <div class="py-2">
                    <h4 class="px-5 py-2 text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Khoa chuyên môn</h4>
                    @if(isset($globalDepartments))
                        @foreach($globalDepartments->where('type', 'khoa') as $dept)
                            <a href="{{ url('/khoa/' . $dept->slug) }}" class="block px-5 py-2.5 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition text-sm font-medium flex items-center">
                                <i class="fas fa-graduation-cap mr-3 text-blue-500 w-4 text-center"></i> {{ $dept->name }}
                            </a>
                        @endforeach
                    @endif
                </div>
                <div class="border-t border-gray-100 my-1"></div>
                <div class="py-2">
                    <h4 class="px-5 py-2 text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Phòng ban chức năng</h4>
                    @if(isset($globalDepartments))
                        @foreach($globalDepartments->where('type', 'phong_ban') as $dept)
                            <a href="{{ url('/phong-ban/' . $dept->slug) }}" class="block px-5 py-2.5 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition text-sm font-medium flex items-center">
                                <i class="fas fa-building mr-3 text-yellow-500 w-4 text-center"></i> {{ $dept->name }}
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        {{-- 5. TIN TỨC --}}
        <div role="menuitem" class="flex-shrink-0">
            <a href="{{ route('news.index') }}" 
               class="menu-button font-bevietnam lg:text-[13px] xl:text-[15px] 2xl:text-lg lg:px-2 xl:px-3 py-3 no-underline transition duration-300 uppercase font-semibold {{ $mainMenu === 'tintuc' ? 'text-yellow-500 border-b-2 border-yellow-500' : 'text-blue-900 hover:text-yellow-500' }} flex items-center justify-center whitespace-nowrap">
                Tin tức
            </a>
        </div>

        {{-- 6. HỌC SINH --}}
        <div class="menu-dropdown-container relative group flex-shrink-0" role="menuitem">
            <button type="button"
                    class="menu-button font-bevietnam lg:text-[13px] xl:text-[15px] 2xl:text-lg lg:px-2 xl:px-3 py-3 no-underline transition duration-300 uppercase font-semibold {{ $mainMenu === 'hocsinh' ? 'text-yellow-500 border-b-2 border-yellow-500' : 'text-blue-900 hover:text-yellow-500' }} flex items-center justify-center focus:outline-none whitespace-nowrap"
                    aria-haspopup="true" aria-expanded="false">
                Học sinh <i class="fas fa-chevron-down ml-1 xl:ml-2 text-[10px] xl:text-xs"></i>
            </button>
            <ul class="menu-dropdown dropdown-center bg-white text-gray-800 shadow-xl rounded-lg w-56 border-t-4 border-yellow-500 overflow-hidden list-none p-0">
                <li role="none">
                    <a href="https://asia.phanmemdaotao.edu.vn/" target="_blank" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-600 transition border-b border-gray-100 flex items-center text-sm" role="menuitem">
                        <i class="fas fa-file-signature mr-3 text-yellow-500 w-5 text-center"></i> Tra cứu điểm
                    </a>
                </li>
                <li role="none"><a href="{{ route('page.tracuu.vanbang') }}" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-600 transition border-b border-gray-100 flex items-center text-sm" role="menuitem"><i class="fas fa-certificate mr-3 text-yellow-500 w-5 text-center"></i> Tra cứu văn bằng</a></li>
                <li role="none"><a href="#" class="block px-5 py-3 hover:bg-blue-50 hover:text-blue-600 transition flex items-center text-sm" role="menuitem"><i class="fas fa-users mr-3 text-yellow-500 w-5 text-center"></i> Hoạt động khác</a></li>
            </ul>
        </div>
        
        {{-- 7. LIÊN HỆ --}}
        <div role="menuitem" class="flex-shrink-0">
            <a href="{{ route('page.lienhe') }}" 
               class="menu-button font-bevietnam lg:text-[13px] xl:text-[15px] 2xl:text-lg lg:px-2 xl:px-3 py-3 no-underline transition duration-300 uppercase font-semibold {{ $mainMenu === 'lienhe' ? 'text-yellow-500 border-b-2 border-yellow-500' : 'text-blue-900 hover:text-yellow-500' }} flex items-center justify-center whitespace-nowrap">
                Liên hệ
            </a>
        </div>
    </div>
    
    {{-- MOBILE BUTTON --}}
    <div class="lg:hidden ml-auto flex-shrink-0">
        <button id="mobile-menu-btn" 
                class="text-blue-900 text-2xl focus:outline-none p-2 hover:text-yellow-500 transition"
                aria-label="Mở menu di động" aria-expanded="false" aria-controls="mobile-menu-content">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    
  </div>
</nav>

    {{-- MOBILE MENU OVERLAY --}}
    <div id="mobile-menu-overlay" 
         class="fixed inset-0 bg-black/50 z-[999] hidden transition-opacity duration-300 opacity-0"
         aria-hidden="true">
         
        <div id="mobile-menu-content" 
             class="absolute top-0 right-0 w-[80%] max-w-[300px] h-full bg-white shadow-2xl transform translate-x-full transition-transform duration-300 flex flex-col"
             role="dialog"
             aria-modal="true"
             aria-labelledby="mobile-menu-title">
            
            <div class="flex items-center justify-between p-4 border-b border-gray-200 bg-blue-50">
                <span id="mobile-menu-title" class="font-bold text-blue-900 text-lg">MENU CHÍNH</span>
                <button id="close-mobile-menu" 
                        class="text-red-500 text-2xl hover:rotate-90 transition-transform duration-300 focus:outline-none"
                        aria-label="Đóng menu">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto p-4 space-y-4 font-bevietnam" role="menu">
                <a href="{{ route('home') }}" class="block font-semibold text-gray-700 hover:text-blue-600 border-b pb-2" role="menuitem">Trang chủ</a>
                
                {{-- Mobile: TỔNG QUAN --}}
                <div>
                    <p class="font-bold text-blue-900 uppercase text-sm border-l-4 border-yellow-500 pl-2 mb-2">Tổng quan</p>
                    <div class="pl-4 space-y-1" role="group" aria-label="Menu Tổng quan">
                        <a href="{{ route('page.gioithieu') }}" class="block text-sm text-gray-600 hover:text-blue-600 py-1" role="menuitem">Giới thiệu chung</a>
                        <a href="{{ route('page.sumenh') }}" class="block text-sm text-gray-600 hover:text-blue-600 py-1" role="menuitem">Sứ mệnh & Tầm nhìn</a>
                        <a href="{{ route('page.muctieu') }}" class="block text-sm text-gray-600 hover:text-blue-600 py-1" role="menuitem">Mục tiêu giáo dục</a>
                        <a href="{{ route('page.chungnhan') }}" class="block text-sm text-gray-600 hover:text-blue-600 py-1" role="menuitem">Chứng nhận</a>
                        <a href="{{ route('page.thungo') }}" class="block text-sm text-gray-600 hover:text-blue-600 py-1" role="menuitem">Thư ngỏ</a>
                        <a href="{{ route('page.sodotochuc') }}" class="block text-sm text-gray-600 hover:text-blue-600 py-1" role="menuitem">Sơ đồ tổ chức</a>
                    </div>
                </div>

                {{-- Mobile: NGÀNH ĐÀO TẠO --}}
                <div>
                    <p class="font-bold text-blue-900 uppercase text-sm border-l-4 border-yellow-500 pl-2 mb-2">Ngành Đào Tạo</p>
                    <div class="pl-4 space-y-1" role="group" aria-label="Ngành đào tạo">
                        @if(isset($headerMajors) && $headerMajors->count() > 0)
                            @foreach($headerMajors as $major)
                                <a href="{{ route('major.detail', $major->slug) }}" class="block text-sm text-gray-600 hover:text-blue-600 py-1 font-medium" role="menuitem">• {{ $major->name }}</a>
                            @endforeach
                        @else
                            <span class="block pl-4 text-sm text-gray-400 italic">Đang cập nhật...</span>
                        @endif
                    </div>
                </div>

                {{-- Mobile: TUYỂN SINH --}}
                <div>
                    <p class="font-bold text-blue-900 uppercase text-sm border-l-4 border-yellow-500 pl-2 mb-2">Tuyển sinh</p>
                    <div class="pl-4 space-y-1" role="group" aria-label="Tuyển sinh">
                        {{-- Loop danh mục động --}}
                        @if(isset($admissionMenu) && count($admissionMenu) > 0)
                            @foreach($admissionMenu as $cat)
                                <a href="{{ route('admission.index', ['category' => $cat->slug]) }}" 
                                   class="block text-sm text-gray-600 hover:text-blue-600 py-1 font-medium"
                                   role="menuitem">
                                   • {{ $cat->name }}
                                </a>
                            @endforeach
                        @endif

                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 py-1" role="menuitem">Câu hỏi thường gặp</a>
                        <a href="{{ route('admission.index') }}#dang-ky" class="block text-sm text-yellow-600 font-bold hover:text-yellow-700 py-1" role="menuitem">Đăng ký Tư vấn</a>
                    </div>
                </div>

                <a href="{{ route('news.index') }}" class="block font-semibold text-gray-700 hover:text-blue-600 border-t pt-2" role="menuitem">Tin tức</a>
                {{-- Mobile: HỌC SINH (Đã chuyển thành List con) --}}
                <div class="border-t pt-2">
                    <p class="font-bold text-blue-900 uppercase text-sm border-l-4 border-yellow-500 pl-2 mb-2 mt-1">Học sinh</p>
                    <div class="pl-4 space-y-1" role="group" aria-label="Menu Học sinh">
                        <a href="https://asia.phanmemdaotao.edu.vn/" target="_blank" class="block text-sm text-gray-600 hover:text-blue-600 py-1" role="menuitem">Tra cứu điểm</a>
                        <a href="{{ route('page.tracuu.vanbang') }} class="block text-sm text-gray-600 hover:text-blue-600 py-1" role="menuitem">Tra cứu văn bằng</a>
                        <a href="#" class="block text-sm text-gray-600 hover:text-blue-600 py-1" role="menuitem">Hoạt động khác</a>
                    </div>
                </div>
                <a href="{{ route('page.lienhe') }}" class="block font-semibold text-gray-700 hover:text-blue-600 border-t pt-2" role="menuitem">Liên hệ</a>
            </div>
            
            <div class="p-4 bg-gray-50 border-t border-gray-200 text-center">
                <a href="tel:0937404060" 
                   class="inline-block bg-yellow-400 text-blue-900 px-6 py-2 rounded-full font-bold shadow hover:bg-yellow-500 w-full focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2"
                   aria-label="Gọi hotline 093 740 40 60">
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
    <a href="{{ route('page.gioithieu') }}" class="px-4 py-2 rounded-full transition duration-200 text-center {{ $isSubNavActive('gioithieu', $currentPage) }} focus:outline-none focus:ring-2 focus:ring-yellow-500">Giới thiệu</a>
    <a href="{{ route('page.sumenh') }}" class="px-4 py-2 rounded-full transition duration-200 text-center {{ $isSubNavActive('sumenh', $currentPage) }} focus:outline-none focus:ring-2 focus:ring-yellow-500">Sứ mệnh & Tầm nhìn</a>
    <a href="{{ route('page.muctieu') }}" class="px-4 py-2 rounded-full transition duration-200 text-center {{ $isSubNavActive('muctieu', $currentPage) }} focus:outline-none focus:ring-2 focus:ring-yellow-500">Mục tiêu giáo dục</a>
    <a href="{{ route('page.chungnhan') }}" class="px-4 py-2 rounded-full transition duration-200 text-center {{ $isSubNavActive('chungnhan', $currentPage) }} focus:outline-none focus:ring-2 focus:ring-yellow-500">Chứng nhận</a>
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
                mobileMenuBtn.setAttribute('aria-expanded', 'true');
                mobileMenuOverlay.setAttribute('aria-hidden', 'false');
                setTimeout(() => {
                    mobileMenuOverlay.classList.remove('opacity-0');
                    mobileMenuContent.classList.remove('translate-x-full');
                }, 10);
            });
            
            // Đóng mobile menu
            function closeMenu() {
                mobileMenuOverlay.classList.add('opacity-0');
                mobileMenuContent.classList.add('translate-x-full');
                mobileMenuBtn.setAttribute('aria-expanded', 'false');
                mobileMenuOverlay.setAttribute('aria-hidden', 'true');
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
            
            // ESC key để đóng menu
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !mobileMenuOverlay.classList.contains('hidden')) {
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