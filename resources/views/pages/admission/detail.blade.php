@include('components.header')

{{-- 1. HEADER BANNER --}}
<div class="relative w-full h-[300px] md:h-[400px] overflow-hidden bg-blue-900 group">
    <div class="absolute inset-0 bg-black/40 z-10"></div>
    
    {{-- Ảnh nền (Lấy ảnh bài viết hoặc mặc định) --}}
    @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="absolute inset-0 w-full h-full object-cover blur-[2px] scale-105 group-hover:scale-100 transition duration-1000 opacity-60">
    @else
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900 to-blue-800">
            <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        </div>
    @endif

    <div class="absolute inset-0 z-20 flex flex-col justify-center items-center text-center px-4 max-w-5xl mx-auto">
        <a href="{{ route('admission.index', ['category' => $post->category->slug]) }}" 
           class="bg-yellow-500 hover:bg-yellow-400 text-blue-900 text-xs md:text-sm font-extrabold px-4 py-1.5 rounded-full uppercase tracking-wider mb-4 shadow-lg transition transform hover:-translate-y-1">
            {{ $post->category->name }}
        </a>
        
        <h1 class="text-2xl md:text-4xl lg:text-5xl font-extrabold text-white leading-tight font-bevietnam drop-shadow-md mb-6">
            {{ $post->title }}
        </h1>
        
        <div class="flex items-center text-blue-100 text-sm gap-6 font-medium bg-white/10 px-6 py-2 rounded-full backdrop-blur-md">
            <span class="flex items-center"><i class="far fa-calendar-alt mr-2"></i> {{ $post->created_at->format('d/m/Y') }}</span>
            <span class="flex items-center"><i class="far fa-eye mr-2"></i> {{ $post->view_count }} lượt xem</span>
        </div>
    </div>
</div>

{{-- 2. MAIN CONTENT --}}
<div class="bg-gray-50 py-12 font-bevietnam">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            {{-- CỘT TRÁI: NỘI DUNG BÀI VIẾT (8/12) --}}
            <div class="lg:col-span-8">
                <article class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-10 overflow-hidden">
                    
                    {{-- Mô tả ngắn (Sapo) --}}
                    @if($post->description)
                        <div class="bg-blue-50/50 border-l-4 border-blue-600 p-6 mb-8 rounded-r-lg">
                            <p class="text-blue-900 font-bold italic text-lg leading-relaxed">
                                {{ $post->description }}
                            </p>
                        </div>
                    @endif

                    {{-- Nội dung chi tiết (Sử dụng Helper để lọc HTML) --}}
                    <div class="prose prose-lg prose-blue max-w-none text-justify text-gray-700 leading-loose">
                        {!! \App\Helpers\HtmlHelper::clean($post->content) !!}
                    </div>

                    {{-- Chia sẻ & Tags --}}
                    <div class="mt-12 pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
                        <div class="text-sm text-gray-500">
                            <strong>Từ khóa:</strong> <span class="text-blue-600">{{ $post->category->name }}</span>, Tuyển sinh 2026, Á Châu
                        </div>
                        <div class="flex gap-3">
                            <span class="text-sm text-gray-500 self-center mr-2">Chia sẻ:</span>
                            <a href="#" class="bg-blue-600 text-white w-9 h-9 rounded-full flex items-center justify-center hover:bg-blue-700 transition shadow-sm" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="bg-blue-400 text-white w-9 h-9 rounded-full flex items-center justify-center hover:bg-blue-500 transition shadow-sm" title="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="bg-red-500 text-white w-9 h-9 rounded-full flex items-center justify-center hover:bg-red-600 transition shadow-sm" title="Email"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </article>

                {{-- BÀI VIẾT LIÊN QUAN --}}
                @if($relatedPosts->count() > 0)
                <div class="mt-12">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-blue-900 border-l-4 border-yellow-500 pl-4">Tin tuyển sinh cùng hệ</h3>
                        <a href="{{ route('admission.index', ['category' => $post->category->slug]) }}" class="text-sm text-blue-600 font-bold hover:underline hidden md:inline-block">Xem tất cả &rarr;</a>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($relatedPosts as $rel)
                        <a href="{{ route('admission.detail', $rel->slug) }}" class="group bg-white rounded-xl shadow-sm hover:shadow-lg transition border border-gray-100 overflow-hidden flex flex-col h-full hover:-translate-y-1 duration-300">
                            <div class="h-48 overflow-hidden relative">
                                @if($rel->image)
                                    <img src="{{ asset('storage/' . $rel->image) }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center text-gray-400"><i class="fas fa-graduation-cap text-4xl"></i></div>
                                @endif
                                <div class="absolute top-2 right-2 bg-white/90 backdrop-blur px-2 py-1 rounded text-[10px] font-bold text-blue-800 shadow-sm">
                                    {{ $rel->created_at->format('d/m') }}
                                </div>
                            </div>
                            <div class="p-5 flex-1 flex flex-col">
                                <h4 class="font-bold text-gray-800 mb-2 line-clamp-2 group-hover:text-blue-700 transition text-lg leading-snug">{{ $rel->title }}</h4>
                                <div class="mt-auto pt-3 flex items-center text-sm font-semibold text-blue-600 group-hover:text-yellow-600 transition">
                                    Xem chi tiết <i class="fas fa-arrow-right ml-2 text-xs"></i>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- CỘT PHẢI: SIDEBAR (4/12) --}}
            <div class="lg:col-span-4 space-y-8">
                
                {{-- Form Đăng ký nhanh (Sticky) --}}
                <div class="bg-white rounded-2xl shadow-xl border-t-4 border-yellow-500 p-6 sticky top-24 z-30">
                    <div class="text-center mb-6">
                        <h3 class="text-xl font-black text-blue-900 uppercase mb-1">Đăng ký xét tuyển</h3>
                        <p class="text-xs text-gray-500">Để lại thông tin, nhà trường sẽ gọi lại ngay!</p>
                    </div>

                    <form action="{{ route('candidate.store') }}" method="POST" class="space-y-4">
                        @csrf
                        {{-- Gửi kèm ID bài viết để Marketing biết khách đến từ bài nào --}}
                        <input type="hidden" name="note" value="Đăng ký từ bài: {{ $post->title }}">

                        <div>
                            <label class="text-xs font-bold text-gray-700 uppercase ml-1 mb-1 block">Họ và tên *</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400"><i class="fas fa-user"></i></span>
                                <input type="text" name="name" required placeholder="Nhập họ tên thí sinh..." 
                                       class="w-full pl-10 p-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition text-sm font-medium">
                            </div>
                        </div>
                        
                        <div>
                            <label class="text-xs font-bold text-gray-700 uppercase ml-1 mb-1 block">Số điện thoại *</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400"><i class="fas fa-phone"></i></span>
                                <input type="tel" name="phone" required placeholder="Nhập số điện thoại..." 
                                       class="w-full pl-10 p-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition text-sm font-medium">
                            </div>
                        </div>

                        <div>
                            <label class="text-xs font-bold text-gray-700 uppercase ml-1 mb-1 block">Ngành quan tâm</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400"><i class="fas fa-graduation-cap"></i></span>
                                <select name="major_id" class="w-full pl-10 p-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-blue-500 outline-none transition text-sm font-medium appearance-none">
                                    <option value="">-- Chọn ngành học --</option>
                                    {{-- Lấy danh sách ngành từ AppServiceProvider --}}
                                    @if(isset($headerMajors))
                                        @foreach($headerMajors as $m)
                                            <option value="{{ $m->id }}">{{ $m->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400"><i class="fas fa-chevron-down text-xs"></i></span>
                            </div>
                        </div>
                        
                        <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-bold rounded-lg shadow-lg transform transition active:scale-95 flex items-center justify-center gap-2 uppercase tracking-wide text-sm mt-2">
                            <span>Gửi hồ sơ ngay</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                        
                        <div class="flex items-center justify-center gap-2 text-[10px] text-gray-400 mt-2">
                            <i class="fas fa-shield-alt text-green-500"></i>
                            <span>Thông tin được bảo mật tuyệt đối 100%</span>
                        </div>
                    </form>
                </div>

                {{-- Banner Hỗ trợ trực tuyến --}}
                <div class="bg-blue-50 rounded-xl p-6 border border-blue-100 text-center">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-blue-600 text-3xl shadow-sm mx-auto mb-4">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4 class="font-bold text-blue-900 mb-2">Bạn cần tư vấn thêm?</h4>
                    <p class="text-sm text-gray-600 mb-4">Đội ngũ tuyển sinh luôn sẵn sàng hỗ trợ bạn 24/7</p>
                    <div class="space-y-2">
                        <a href="tel:02763533222" class="block w-full py-2 bg-white border border-gray-200 text-blue-700 font-bold rounded-lg hover:bg-blue-50 transition text-sm">
                            <i class="fas fa-phone-alt mr-2"></i> 02763 533 222
                        </a>
                        <a href="#" class="block w-full py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition text-sm">
                            <i class="fab fa-facebook-messenger mr-2"></i> Chat Facebook
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@include('components.footer')