@include('components.header')

<style>
    /* Typography & Core Styles */
    .post-content { font-size: 1.125rem; color: #374151; line-height: 1.8; }
    .post-content h2 { font-size: 1.6rem; font-weight: 800; color: #1e3a8a; margin-top: 2rem; margin-bottom: 1rem; }
    .post-content h3 { font-size: 1.3rem; font-weight: 700; color: #1f2937; margin-top: 1.5rem; margin-bottom: 0.75rem; border-left: 4px solid #f59e0b; padding-left: 12px; }
    .post-content p { margin-bottom: 1.25rem; text-align: justify; }
    .post-content ul, .post-content ol { margin-bottom: 1.25rem; padding-left: 1.5rem; }
    .post-content li { margin-bottom: 0.5rem; }
    .post-content img { border-radius: 0.75rem; margin: 1.5rem auto; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); width: 100%; height: auto; }
    
    /* Thiết lập vị trí ghim cách mép trên 90px */
    .sticky-wrapper { position: sticky; top: 90px; }
    .vertical-text { writing-mode: vertical-rl; text-orientation: mixed; transform: rotate(180deg); }
    
    /* Hiệu ứng tab active */
    .tab-btn.active { border-bottom-color: #1e3a8a; color: #1e3a8a; font-weight: 700; }
</style>

{{-- TỐI ƯU: Sử dụng bg trắng/xám đồng bộ để giảm cảm giác bị phân vách hai bên --}}
<div class="bg-[#f8fafc] min-h-screen pb-20 font-bevietnam">
    
    {{-- 1. COMPACT HERO HEADER --}}
    <div class="relative bg-blue-900 py-12">
        <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        {{-- TỐI ƯU: Tăng chiều rộng header đồng bộ lên max-w-[1440px] --}}
        <div class="max-w-[1440px] mx-auto px-6 relative z-10">
            <div class="text-sm text-blue-200 mb-3 flex items-center gap-2">
                <a href="/" class="hover:text-white transition">Trang chủ</a> / 
                <a href="/tin-tuc" class="hover:text-white transition">Tin tức</a> /
                <span class="text-white font-medium">{{ $post->category }}</span>
            </div>
            <h1 class="text-2xl md:text-4xl font-extrabold text-white leading-tight mb-4">
                {{ $post->title }}
            </h1>
            <div class="flex flex-wrap items-center gap-6 text-blue-200 text-sm">
                <span class="flex items-center"><i class="far fa-calendar-alt mr-2 text-yellow-400"></i> {{ $post->created_at->format('d/m/Y') }}</span>
                <span class="flex items-center"><i class="fas fa-user-edit mr-2 text-yellow-400"></i> {{ $post->department ?? 'Ban Truyền Thông' }}</span>
            </div>
        </div>
    </div>

    {{-- 2. MAIN LAYOUT (Tăng max-w lên 1440px giúp nới rộng 2 bên viền trống) --}}
    <main class="max-w-[1440px] mx-auto px-6 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            {{-- CỘT TRÁI: THANH CÔNG CỤ SHARING (Sticky) --}}
            <div class="hidden lg:block lg:col-span-1">
                <div class="sticky-wrapper flex flex-col gap-6 items-center">
                    <div class="flex flex-col gap-2">
                        <button onclick="adjustFontSize(1)" class="w-10 h-10 rounded-full bg-white text-gray-600 hover:bg-blue-100 hover:text-blue-600 transition flex items-center justify-center font-bold shadow-sm" title="Tăng cỡ chữ">A+</button>
                        <button onclick="adjustFontSize(-1)" class="w-10 h-10 rounded-full bg-white text-gray-600 hover:bg-blue-100 hover:text-blue-600 transition flex items-center justify-center font-bold text-xs shadow-sm" title="Giảm cỡ chữ">A-</button>
                    </div>
                    <div class="w-8 h-[1px] bg-gray-200"></div>
                    <div class="flex flex-col gap-3">
                        <span class="text-[10px] font-bold text-gray-400 uppercase vertical-text mb-1">Chia sẻ</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="w-10 h-10 rounded-full bg-white border border-gray-200 text-blue-600 hover:bg-blue-600 hover:text-white transition flex items-center justify-center shadow-sm"><i class="fab fa-facebook-f"></i></a>
                        <button onclick="copyToClipboard()" class="w-10 h-10 rounded-full bg-white border border-gray-200 text-gray-600 hover:bg-gray-800 hover:text-white transition flex items-center justify-center shadow-sm relative group"><i class="fas fa-link"></i>
                            <span id="copy-success" class="absolute left-full ml-2 bg-black text-white text-xs px-2 py-1 rounded opacity-0 transition pointer-events-none whitespace-nowrap">Đã chép!</span>
                        </button>
                    </div>
                    <div class="h-24 w-1 bg-gray-200 rounded-full mt-4 relative overflow-hidden">
                        <div id="reading-progress" class="absolute top-0 left-0 w-full bg-blue-600 rounded-full transition-all duration-100" style="height: 0%"></div>
                    </div>
                    <span class="text-[10px] text-gray-400 font-bold" id="progress-text">0%</span>
                </div>
            </div>

            {{-- CỘT GIỮA: NỘI DUNG CHÍNH (Chiếm 8/12 phần - Cực kỳ rộng rãi) --}}
            <div class="lg:col-span-8">
                <div class="bg-white p-6 md:p-10 rounded-2xl shadow-sm border border-gray-100 mb-8">
                    @if($post->image)
                        <figure class="mb-8">
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-auto rounded-xl shadow-md object-cover max-h-[550px]" alt="{{ $post->title }}">
                            @if($post->image_caption)
                                <figcaption class="text-center text-sm text-gray-500 italic mt-2 bg-gray-50 py-1 rounded">
                                    <i class="fas fa-camera mr-1"></i> {{ $post->image_caption }}
                                </figcaption>
                            @endif
                        </figure>
                    @endif

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

                    @if(!empty($post->gallery))
                        <div class="mt-10 border-t border-gray-100 pt-8">
                            <h3 class="text-xl font-bold text-blue-900 mb-4 flex items-center">
                                <i class="fas fa-images mr-2 text-yellow-500"></i> Thư viện ảnh hoạt động
                            </h3>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                @foreach($post->gallery as $img)
                                    <div class="relative group overflow-hidden rounded-lg cursor-pointer" onclick="openModal('{{ asset('storage/' . $img) }}')">
                                        <img src="{{ asset('storage/' . $img) }}" class="w-full h-24 md:h-32 object-cover transition duration-500 group-hover:scale-110">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                {{-- BÀI VIẾT LIÊN QUAN --}}
                @if($relatedPosts->count() > 0)
                <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center border-b border-gray-100 pb-4">
                        <span class="w-1.5 h-6 bg-blue-600 mr-3 rounded-full"></span> Bài viết cùng chuyên mục
                    </h3>
                    <div class="flex flex-col space-y-6">
                        @foreach($relatedPosts as $related)
                            <a href="{{ route('post.detail', $related->slug) }}" class="group flex flex-col sm:flex-row gap-5 items-start p-4 rounded-xl hover:bg-blue-50/50 transition border border-transparent hover:border-blue-100">
                                <div class="w-full sm:w-40 h-28 flex-shrink-0 overflow-hidden rounded-lg border border-gray-100 relative shadow-sm">
                                    <img src="{{ $related->image ? asset('storage/' . $related->image) : 'https://via.placeholder.com/300x200' }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="{{ $related->title }}">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-lg font-bold text-gray-800 group-hover:text-blue-700 line-clamp-2 mb-2 transition leading-snug">{{ $related->title }}</h4>
                                    <div class="flex items-center text-sm text-gray-500 gap-4">
                                        <span class="flex items-center"><i class="far fa-calendar-alt mr-1.5 text-blue-400"></i> {{ $related->created_at->format('d/m/Y') }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- CỘT PHẢI (SIDEBAR): Chiếm 3/12 phần - ĐÃ FIX HOÀN TOÀN STICKY KHÔNG BỊ MẤT --}}
            <div class="lg:col-span-3 space-y-6 lg:h-full">
                
                {{-- Toàn bộ các khối bên phải được gom vào Wrapper này để trượt cùng nhau --}}
                <div class="sticky-wrapper space-y-6">
                    
                    {{-- Khối 1: Banner Tuyển Sinh cố định ở trên --}}
                    <div class="bg-gradient-to-br from-blue-800 to-indigo-950 rounded-2xl p-5 text-center text-white shadow-lg relative overflow-hidden group">
                        <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
                        <div class="relative z-10">
                            <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center mb-3 mx-auto"><i class="fas fa-graduation-cap text-xl text-yellow-400"></i></div>
                            <h3 class="text-lg font-black uppercase leading-tight">Tuyển Sinh <span class="text-yellow-400 block mt-0.5">Năm 2026</span></h3>
                            <p class="text-xs text-blue-200 my-3">Đăng ký ngay nhận học bổng đến 50%</p>
                            <a href="{{ route('page.register') }}" class="inline-block w-full bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-bold py-2 rounded-xl text-xs uppercase shadow transition">Xem chi tiết</a>
                        </div>
                    </div>

                    {{-- Khối 2: KHỐI CHUYỂN TAB THÔNG MINH (Hiện đại, tối ưu không gian cuộn) --}}
                    <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                        {{-- Thanh Điều Hướng Tab --}}
                        <div class="flex border-b border-gray-100 bg-gray-50/50">
                            <button onclick="switchTab('tab-reg')" id="btn-reg" class="tab-btn active w-1/2 py-3 text-xs uppercase tracking-wider font-bold text-center border-b-2 border-transparent text-gray-500 hover:text-blue-900 transition flex items-center justify-center gap-1.5">
                                <i class="fas fa-edit"></i> Đăng ký
                            </button>
                            <button onclick="switchTab('tab-news')" id="btn-news" class="tab-btn w-1/2 py-3 text-xs uppercase tracking-wider font-bold text-center border-b-2 border-transparent text-gray-500 hover:text-blue-900 transition flex items-center justify-center gap-1.5">
                                <i class="fas fa-bolt"></i> Tin mới
                            </button>
                        </div>

                        <div class="p-4">
                            {{-- TAB NỘI DUNG 1: FORM ĐĂNG KÝ --}}
                            <div id="tab-reg" class="tab-content">
                                <form action="{{ route('candidate.store') }}" method="POST" class="space-y-3">
                                    @csrf 
                                    <input type="hidden" name="form_anchor" value="sidebar-register">
                                    <input type="hidden" name="note" value="Đăng ký từ bài viết: {{ $post->title }}">
                                    <div>
                                        <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Họ và tên</label>
                                        <input type="text" name="name" required placeholder="Nhập họ tên..." class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 outline-none bg-gray-50 text-gray-800 focus:border-blue-500 transition">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">Số điện thoại</label>
                                        <input type="tel" name="phone" required placeholder="Nhập số điện thoại..." class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 outline-none bg-gray-50 text-gray-800 focus:border-blue-500 transition">
                                    </div>
                                    <button type="submit" class="w-full bg-blue-900 hover:bg-blue-950 text-white font-bold py-2 rounded-lg text-xs uppercase tracking-wide mt-2 shadow transition">Gửi thông tin</button>
                                </form>
                            </div>

                            {{-- TAB NỘI DUNG 2: TIN TỨC MỚI NHẤT --}}
                            <div id="tab-news" class="tab-content hidden">
                                <div class="space-y-3 max-h-[260px] overflow-y-auto pr-1">
                                    @foreach($recentPosts as $recent)
                                    <a href="{{ route('post.detail', $recent->slug) }}" class="flex gap-3 group items-center pb-2 border-b border-gray-50 last:border-none">
                                        <div class="w-14 h-11 flex-shrink-0 overflow-hidden rounded bg-gray-100">
                                            <img src="{{ $recent->image ? asset('storage/' . $recent->image) : 'https://via.placeholder.com/150' }}" class="w-full h-full object-cover group-hover:scale-105 transition" alt="{{ $recent->title }}">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-xs font-bold text-gray-700 group-hover:text-blue-600 line-clamp-2 leading-tight transition">{{ $recent->title }}</h4>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </main>
</div>

{{-- Modal Xem Ảnh Lớn --}}
<div id="imageModal" class="fixed inset-0 z-[100] bg-black/95 hidden flex items-center justify-center p-4 backdrop-blur-sm" onclick="closeModal()">
    <img id="modalImg" class="max-w-full max-h-[90vh] rounded-lg shadow-2xl">
</div>

<script>
    /* Logic chuyển đổi Tab mượt mà không load lại trang */
    function switchTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
        
        document.getElementById(tabId).classList.remove('hidden');
        if(tabId === 'tab-reg') document.getElementById('btn-reg').classList.add('active');
        if(tabId === 'tab-news') document.getElementById('btn-news').classList.add('active');
    }

    function openModal(src) {
        const modal = document.getElementById('imageModal');
        document.getElementById('modalImg').src = src;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function closeModal() {
        document.getElementById('imageModal').add('hidden');
        document.body.style.overflow = '';
    }
    
    function copyToClipboard() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            const tooltip = document.getElementById('copy-success');
            tooltip.classList.replace('opacity-0', 'opacity-100');
            setTimeout(() => tooltip.classList.replace('opacity-100', 'opacity-0'), 2000);
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
            let percent = (-box.top + (window.innerHeight / 2)) / box.height * 100;
            if (percent < 0) percent = 0; if (percent > 100) percent = 100;
            document.getElementById('reading-progress').style.height = percent + '%';
            document.getElementById('progress-text').innerText = Math.round(percent) + '%';
        }
    });
</script>

@include('components.footer')