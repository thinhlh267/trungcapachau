@include('components.header')

<style>
    /* Typography & Core Styles - Tương thích hoàn hảo với TinyMCE */
    .post-content { 
        font-size: 1.125rem; 
        color: #374151; 
        line-height: 1.8; 
    }
    .post-content h2 { 
        font-size: 1.6rem; 
        font-weight: 800; 
        color: #1e3a8a; 
        margin-top: 2rem; 
        margin-bottom: 1rem; 
    }
    .post-content h3 { 
        font-size: 1.3rem; 
        font-weight: 700; 
        color: #1f2937; 
        margin-top: 1.5rem; 
        margin-bottom: 0.75rem; 
        border-left: 4px solid #f59e0b; 
        padding-left: 12px; 
    }
    /* SỬA LỖI TRÁNH TRANH CHẤP CĂN LỀ CỦA TINYMCE */
    .post-content p { 
        margin-bottom: 1.25rem; 
    }
    .post-content p:not([style*="text-align"]) {
        text-align: justify; /* Chỉ căn đều khi tác giả không tự căn lề */
    }
    
    .post-content ul { 
        list-style-type: disc;
        margin-bottom: 1.25rem; 
        padding-left: 1.5rem; 
    }
    .post-content ol { 
        list-style-type: decimal;
        margin-bottom: 1.25rem; 
        padding-left: 1.5rem; 
    }
    .post-content li { 
        margin-bottom: 0.5rem; 
    }
    
    /* SỬA LỖI CO GIÃN ẢNH - CHỐNG BỂ HÌNH */
    .post-content img { 
        border-radius: 0.75rem; 
        margin: 1.5rem auto; 
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); 
        max-width: 100%; /* Giúp ảnh nhỏ không bị kéo to rách hình */
        height: auto; 
        display: block;
    }
    
    /* ĐỊNH DẠNG BẢNG BIỂU (MỚI - Rất quan trọng khi dùng TinyMCE) */
    .post-content table {
        width: 100%;
        margin: 1.5rem 0;
        border-collapse: collapse;
        font-size: 1rem;
    }
    .post-content table th, .post-content table td {
        border: 1px solid #e5e7eb;
        padding: 0.75rem 1rem;
        text-align: left;
    }
    .post-content table th {
        background-color: #f3f4f6;
        font-weight: 700;
        color: #1f2937;
    }
    .post-content table tr:nth-child(even) {
        background-color: #f9fafb;
    }

    .post-content blockquote { 
        font-style: italic; 
        background: #eff6ff; 
        padding: 1rem 1.5rem; 
        border-left: 4px solid #3b82f6; 
        margin: 1.5rem 0; 
        border-radius: 0 8px 8px 0; 
    }
    
    /* Sticky Sidebar Fix */
    .sticky-sidebar { position: sticky; top: 100px; }
    
    /* Vertical Text for Share Bar */
    .vertical-text { writing-mode: vertical-rl; text-orientation: mixed; transform: rotate(180deg); }
</style>

<div class="bg-[#f8fafc] min-h-screen pb-20 font-bevietnam">
    
    {{-- 1. COMPACT HERO HEADER --}}
    <div class="relative bg-blue-900 py-12">
        <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="text-sm text-blue-200 mb-3 flex items-center gap-2">
                <a href="/" class="hover:text-white transition">Trang chủ</a> / 
                <a href="/tin-tuc" class="hover:text-white transition">Tin tức</a> /
                <span class="text-white font-medium truncate max-w-[200px]">{{ $post->category }}</span>
            </div>
            <h1 class="text-2xl md:text-4xl font-extrabold text-white leading-tight mb-4">
                {{ $post->title }}
            </h1>
            <div class="flex flex-wrap items-center gap-6 text-blue-200 text-sm">
                <span class="flex items-center"><i class="far fa-calendar-alt mr-2 text-yellow-400"></i> {{ $post->created_at->format('d/m/Y') }}</span>
                <span class="flex items-center"><i class="fas fa-user-edit mr-2 text-yellow-400"></i> {{ $post->department ?? 'Ban Truyền Thông' }}</span>
                <span class="flex items-center"><i class="fas fa-eye mr-2 text-yellow-400"></i> {{ $post->views ?? 0 }} lượt xem</span>
            </div>
        </div>
    </div>

    {{-- 2. MAIN LAYOUT (GRID) --}}
    <main class="max-w-7xl mx-auto px-4 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            {{-- CỘT TRÁI: THANH CÔNG CỤ (Sticky) --}}
            <div class="hidden lg:block lg:col-span-1">
                <div class="sticky-sidebar flex flex-col gap-6 items-center">
                    
                    {{-- 1. Thông tin tác giả --}}
                    <div class="flex flex-col items-center gap-2 group cursor-default">
                        <div class="w-12 h-12 rounded-full border-2 border-blue-100 overflow-hidden p-0.5">
                            <img src="https://ui-avatars.com/api/?name=Admin&background=random" class="w-full h-full rounded-full object-cover" alt="Author">
                        </div>
                        <span class="text-[10px] font-bold text-gray-400 uppercase text-center leading-tight">Đăng bởi<br><span class="text-blue-700">Ban TT</span></span>
                    </div>

                    <div class="w-8 h-[1px] bg-gray-200"></div>

                    {{-- 2. Công cụ đọc (A+ / A-) --}}
                    <div class="flex flex-col gap-2">
                        <button onclick="adjustFontSize(1)" class="w-10 h-10 rounded-full bg-gray-50 text-gray-600 hover:bg-blue-100 hover:text-blue-600 transition flex items-center justify-center font-bold shadow-sm tooltip" title="Tăng cỡ chữ">
                            A+
                        </button>
                        <button onclick="adjustFontSize(-1)" class="w-10 h-10 rounded-full bg-gray-50 text-gray-600 hover:bg-blue-100 hover:text-blue-600 transition flex items-center justify-center font-bold text-xs shadow-sm tooltip" title="Giảm cỡ chữ">
                            A-
                        </button>
                    </div>

                    <div class="w-8 h-[1px] bg-gray-200"></div>

                    {{-- 3. Các nút Share & Copy Link --}}
                    <div class="flex flex-col gap-3">
                        <span class="text-[10px] font-bold text-gray-400 uppercase vertical-text mb-1">Chia sẻ</span>
                        
                        {{-- Facebook --}}
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="w-10 h-10 rounded-full bg-white border border-gray-200 text-blue-600 hover:bg-blue-600 hover:text-white transition flex items-center justify-center shadow-sm tooltip" title="Chia sẻ Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        {{-- SỬA LỖI ICON ZALO CHUẨN ĐỒNG BỘ --}}
                        <a href="https://zalo.me/share/?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="w-10 h-10 rounded-full bg-white border border-gray-200 text-blue-500 hover:bg-blue-500 hover:text-white transition flex items-center justify-center shadow-sm tooltip" title="Chia sẻ Zalo">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 11.538c0-4.887-4.48-8.846-10-8.846S2 6.651 2 11.538c0 4.223 3.344 7.765 8.01 8.652-.163.535-.615 1.554-.863 2.052-.303.61-.06.843.435.513.51-.342 1.94-1.353 2.656-1.89l.45-.333c.433.056.873.085 1.312.085 5.52 0 10-3.96 10-8.846zm-6.082 3.864c-.312 0-.56-.211-.56-.525v-3.79l-2.617 3.84c-.116.17-.294.275-.487.275h-.363c-.31 0-.56-.25-.56-.56v-4.57c0-.312.25-.562.56-.562s.562.25.562.562v3.743l2.585-3.79c.117-.174.302-.283.497-.283h.384c.31 0 .56.25.56.56v4.52c0 .315-.248.527-.56.527zm-6.28.006H7.132a.56.56 0 0 1-.56-.56v-4.52c0-.31.25-.56.56-.56s.56.25.56.56v3.96h1.946c.31 0 .56.25.56.56s-.25.56-.56.56zm4.846-4.536a1.144 1.144 0 0 1-1.142 1.142h-.372V9.894h.372c.63 0 1.142.512 1.142 1.142z"/>
                            </svg>
                        </a>

                        {{-- Copy Link --}}
                        <button onclick="copyToClipboard()" class="w-10 h-10 rounded-full bg-white border border-gray-200 text-gray-600 hover:bg-gray-800 hover:text-white transition flex items-center justify-center shadow-sm relative group tooltip" title="Sao chép liên kết">
                            <i class="fas fa-link"></i>
                            <span id="copy-success" class="absolute left-full ml-2 bg-black text-white text-xs px-2 py-1 rounded opacity-0 transition pointer-events-none whitespace-nowrap">Đã chép!</span>
                        </button>
                    </div>

                    {{-- 4. Thanh tiến trình đọc --}}
                    <div class="h-24 w-1 bg-gray-200 rounded-full mt-4 relative overflow-hidden">
                        <div id="reading-progress" class="absolute top-0 left-0 w-full bg-blue-600 rounded-full transition-all duration-100" style="height: 0%"></div>
                    </div>
                    <span class="text-[10px] text-gray-400 font-bold" id="progress-text">0%</span>

                </div>
            </div>

            {{-- CỘT GIỮA: NỘI DUNG BÀI VIẾT (8/12) --}}
            <div class="lg:col-span-7">
                <div class="bg-white p-6 md:p-10 rounded-2xl shadow-sm border border-gray-100 h-fit mb-8">
                    
                    {{-- Ảnh đại diện bài viết --}}
                    @if($post->image)
                        <figure class="mb-8">
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-auto rounded-xl shadow-md object-cover max-h-[500px]" alt="{{ $post->title }}">
                            @if($post->image_caption)
                                <figcaption class="text-center text-sm text-gray-500 italic mt-2 bg-gray-50 py-1 rounded">
                                    <i class="fas fa-camera mr-1"></i> {{ $post->image_caption }}
                                </figcaption>
                            @endif
                        </figure>
                    @endif

                    {{-- Nội dung chính --}}
                    <div class="post-content">
                        @if(is_array($post->content))
                            @foreach($post->content as $block)
                                @if($block['type'] === 'doan_van')
                                    <div class="mb-4">{!! $block['data']['noi_dung'] !!}</div>
                                @elseif($block['type'] === 'hinh_anh')
                                    <figure class="my-6">
                                        <img src="{{ asset('storage/' . $block['data']['url']) }}" alt="{{ $block['data']['chu_thich'] ?? '' }}" class="rounded-lg shadow">
                                        @if(!empty($block['data']['chu_thich']))
                                            <figcaption class="text-center text-sm text-gray-500 italic mt-2">{{ $block['data']['chu_thich'] }}</figcaption>
                                        @endif
                                    </figure>
                                @endif
                            @endforeach
                        @else
                            {!! $post->content !!}
                        @endif
                    </div>

                    {{-- Gallery --}}
                    @if(!empty($post->gallery))
                        <div class="mt-10 border-t border-gray-100 pt-8">
                            <h3 class="text-xl font-bold text-blue-900 mb-4 flex items-center">
                                <i class="fas fa-images mr-2 text-yellow-500"></i> Thư viện ảnh hoạt động
                            </h3>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                @foreach($post->gallery as $img)
                                    <div class="relative group overflow-hidden rounded-lg cursor-pointer" onclick="openModal('{{ asset('storage/' . $img) }}')">
                                        <img src="{{ asset('storage/' . $img) }}" class="w-full h-24 md:h-32 object-cover transition duration-500 group-hover:scale-110">
                                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                            <i class="fas fa-search-plus text-white"></i>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                {{-- BÀI VIẾT LIÊN QUAN --}}
                @if($relatedPosts->count() > 0)
                <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100 mt-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center border-b border-gray-100 pb-4">
                        <span class="w-1.5 h-6 bg-blue-600 mr-3 rounded-full"></span>
                        Bài viết cùng chuyên mục
                    </h3>
                    
                    <div class="flex flex-col space-y-6">
                        @foreach($relatedPosts as $related)
                            <a href="{{ route('post.detail', $related->slug) }}" class="group flex flex-col sm:flex-row gap-5 items-start p-4 rounded-xl hover:bg-blue-50/50 transition border border-transparent hover:border-blue-100">
                                <div class="w-full sm:w-40 h-28 flex-shrink-0 overflow-hidden rounded-lg border border-gray-100 relative shadow-sm">
                                    <img src="{{ $related->image ? asset('storage/' . $related->image) : 'https://via.placeholder.com/300x200' }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                                         alt="{{ $related->title }}">
                                </div>
                                
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-lg font-bold text-gray-800 group-hover:text-blue-700 line-clamp-2 mb-2 transition leading-snug">
                                        {{ $related->title }}
                                    </h4>
                                    
                                    <div class="flex items-center text-sm text-gray-500 gap-4 mb-2">
                                        <span class="flex items-center"><i class="far fa-calendar-alt mr-1.5 text-blue-400"></i> {{ $related->created_at->format('d/m/Y') }}</span>
                                        <span class="flex items-center text-xs font-semibold bg-gray-100 text-gray-600 px-2 py-0.5 rounded">
                                            {{ $related->category }}
                                        </span>
                                    </div>

                                    <p class="text-sm text-gray-600 line-clamp-2 hidden sm:block">
                                        {{ \Illuminate\Support\Str::limit(strip_tags(is_array($related->content) ? ($related->content[0]['data']['noi_dung'] ?? '') : $related->content), 120) }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- CỘT PHẢI (4/12): SIDEBAR --}}
            <div class="lg:col-span-4 space-y-8">
                
                {{-- FORM ĐĂNG KÝ --}}
                <div id="sidebar-register" class="bg-white rounded-2xl shadow-xl border border-blue-100 overflow-hidden scroll-mt-24">
                    <div class="bg-blue-900 p-5 text-center">
                        <h3 class="text-xl font-extrabold text-white uppercase flex justify-center items-center gap-2">
                            <i class="fas fa-edit text-yellow-400"></i> Đăng Ký Ngay
                        </h3>
                        <p class="text-blue-100 text-sm mt-1">Nhận tư vấn miễn phí trong 24h</p>
                    </div>
                    
                    <div class="p-6 bg-white">
                        @if(session('success'))
                            <div class="mb-4 bg-green-50 border-l-4 border-green-500 text-green-800 p-3 rounded text-sm animate-pulse">
                                <p class="font-bold"><i class="fas fa-check mr-1"></i> Gửi thành công!</p>
                                <p>Chúng tôi sẽ liên hệ sớm nhất.</p>
                            </div>
                        @endif

                        <form action="{{ route('candidate.store') }}" method="POST" class="space-y-4">
                            @csrf 
                            <input type="hidden" name="form_anchor" value="sidebar-register">
                            <input type="hidden" name="note" value="Đăng ký từ bài viết: {{ $post->title }}">
                            
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Họ và tên</label>
                                <input type="text" name="name" required placeholder="Nhập họ tên..." 
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition bg-gray-50 text-gray-900 font-medium">
                            </div>
                            
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Số điện thoại</label>
                                <input type="tel" name="phone" required placeholder="Nhập số điện thoại..." 
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition bg-gray-50 text-gray-900 font-medium">
                            </div>
                            
                            <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-black py-3 rounded-lg transition shadow-md hover:shadow-lg uppercase tracking-wide flex justify-center items-center gap-2 text-sm mt-2">
                                <i class="fas fa-paper-plane"></i> Gửi Yêu Cầu
                            </button>
                            
                            <p class="text-xs text-center text-gray-400 flex justify-center items-center gap-1 mt-2">
                                <i class="fas fa-shield-alt"></i> Thông tin bảo mật tuyệt đối
                            </p>
                        </form>
                    </div>
                </div>

                {{-- TIN MỚI NHẤT --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                    <h3 class="font-bold text-gray-800 mb-5 pb-3 border-b border-gray-100 flex items-center text-lg">
                        <span class="w-1.5 h-6 bg-red-600 mr-3 rounded-full"></span> Tin tức mới nhất
                    </h3>
                    <div class="space-y-5">
                        @foreach($recentPosts as $recent)
                        <a href="{{ route('post.detail', $recent->slug) }}" class="flex gap-4 group items-start">
                            <div class="w-28 h-20 flex-shrink-0 overflow-hidden rounded-lg bg-gray-100 border border-gray-100">
                                <img src="{{ $recent->image ? asset('storage/' . $recent->image) : 'https://via.placeholder.com/150' }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-300" 
                                     alt="{{ $recent->title }}">
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-bold text-gray-800 group-hover:text-blue-600 line-clamp-2 leading-snug transition mb-1">
                                    {{ $recent->title }}
                                </h4>
                                <span class="text-xs text-gray-400 flex items-center">
                                    <i class="far fa-clock mr-1"></i> {{ $recent->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                {{-- BANNER QUẢNG CÁO --}}
                <div class="sticky-sidebar">
                    <a href="{{ route('page.register') }}" class="block rounded-2xl overflow-hidden shadow-lg group relative h-[350px] bg-blue-900 text-white">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-800 to-blue-950 z-0"></div>
                        <div class="absolute inset-0 opacity-20 z-0" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
                        
                        <div class="relative z-10 h-full flex flex-col items-center justify-center p-6 text-center">
                            <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mb-4 backdrop-blur-sm border border-white/20 group-hover:scale-110 transition-transform duration-500">
                                <i class="fas fa-graduation-cap text-3xl text-yellow-400"></i>
                            </div>
                            
                            <h3 class="text-2xl font-black uppercase mb-2 leading-tight tracking-wide">
                                Tuyển Sinh <br>
                                <span class="text-yellow-400 text-3xl mt-1 block">Năm 2026</span>
                            </h3>
                            
                            <p class="text-sm text-blue-100 mb-6 font-medium max-w-[200px]">
                                Đăng ký ngay hôm nay để nhận học bổng lên đến 50%
                            </p>
                            
                            <span class="px-8 py-3 bg-yellow-400 text-blue-900 rounded-full font-bold text-sm hover:bg-white hover:text-blue-800 transition shadow-lg transform group-hover:-translate-y-1">
                                Xem chi tiết
                            </span>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </main>
</div>

{{-- Lightbox Modal --}}
<div id="imageModal" class="fixed inset-0 z-[100] bg-black/95 hidden flex items-center justify-center p-4 backdrop-blur-sm transition-opacity duration-300 opacity-0" onclick="closeModal()">
    <span class="absolute top-5 right-5 text-white text-4xl cursor-pointer hover:text-red-500 transition">&times;</span>
    <img id="modalImg" class="max-w-full max-h-[90vh] rounded-lg shadow-2xl transform scale-95 transition-transform duration-300">
</div>

<script>
    function openModal(src) {
        const modal = document.getElementById('imageModal');
        const img = document.getElementById('modalImg');
        img.src = src;
        modal.classList.remove('hidden');
        requestAnimationFrame(() => {
            modal.classList.remove('opacity-0');
            img.classList.replace('scale-95', 'scale-100');
        });
        document.body.style.overflow = 'hidden';
    }
    function closeModal() {
        const modal = document.getElementById('imageModal');
        const img = document.getElementById('modalImg');
        modal.classList.add('opacity-0');
        img.classList.replace('scale-100', 'scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    }
    function copyToClipboard() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            const tooltip = document.getElementById('copy-success');
            const button = tooltip.closest('button');
            tooltip.classList.remove('opacity-0');
            tooltip.classList.add('opacity-100');
            setTimeout(() => {
                tooltip.classList.remove('opacity-100');
                tooltip.classList.add('opacity-0');
            }, 2000);
        });
    }

    let currentFontSize = 18; 
    function adjustFontSize(amount) {
        const content = document.querySelector('.post-content');
        currentFontSize += amount;
        if (currentFontSize < 14) currentFontSize = 14; 
        if (currentFontSize > 24) currentFontSize = 24; 
        content.style.fontSize = currentFontSize + 'px';
    }

    window.addEventListener('scroll', function() {
        const article = document.querySelector('.post-content');
        if (article) {
            const box = article.getBoundingClientRect();
            const totalHeight = box.height;
            const windowHeight = window.innerHeight;
            const scrollPos = -box.top + (windowHeight / 2); 
            
            let percent = (scrollPos / totalHeight) * 100;
            if (percent < 0) percent = 0;
            if (percent > 100) percent = 100;

            document.getElementById('reading-progress').style.height = percent + '%';
            document.getElementById('progress-text').innerText = Math.round(percent) + '%';
        }
    });
</script>

@include('components.footer')