@include('components.header')

<div class="bg-gray-50 min-h-screen pb-20 font-bevietnam">
    
    {{-- 1. HERO SECTION (ĐÃ SỬA: NỀN XANH ĐẬM + KHỐI LẬP PHƯƠNG) --}}
    <div class="relative bg-blue-900 py-16 overflow-hidden">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        
        {{-- Hiệu ứng trang trí --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full mix-blend-overlay filter blur-[100px] opacity-20 animate-blob"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-yellow-500 rounded-full mix-blend-overlay filter blur-[100px] opacity-10 animate-blob animation-delay-2000"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-5xl font-black text-white mb-4 uppercase tracking-wide drop-shadow-lg">
                Liên hệ với chúng tôi
            </h1>
            <p class="text-blue-100 text-lg md:text-xl max-w-2xl mx-auto font-light leading-relaxed">
                Chúng tôi luôn sẵn sàng lắng nghe và giải đáp mọi thắc mắc của bạn.
            </p>
        </div>
    </div>

    {{-- (ĐÃ XÓA BREADCRUMB TẠI ĐÂY) --}}

    <main class="max-w-7xl mx-auto px-4 py-12 -mt-8 relative z-20">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
            
            {{-- 2. CỘT TRÁI: THÔNG TIN & BẢN ĐỒ --}}
            <div class="lg:col-span-5 space-y-8">
                
                {{-- Info Card --}}
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="bg-blue-50 p-5 border-b border-blue-100">
                        <h2 class="text-lg font-bold text-blue-900 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-blue-600 text-white flex items-center justify-center text-sm"><i class="fas fa-info"></i></span>
                            Thông tin liên hệ
                        </h2>
                    </div>
                    
                    <div class="p-6 space-y-6">
                        {{-- Địa chỉ --}}
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wide">Trụ sở chính</h3>
                                <p class="text-sm text-gray-600 mt-1 leading-relaxed">Khu phố Phước Đức A, Phường Gia Lộc, Tỉnh Tây Ninh</p>
                            </div>
                        </div>

                        {{-- Hotline --}}
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-phone-volume"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wide">Hotline tư vấn</h3>
                                <a href="tel:0937404060" class="block text-lg font-black text-green-600 hover:text-green-700 transition mt-1">093 740 40 60</a>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-yellow-100 text-yellow-600 flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wide">Email hỗ trợ</h3>
                                <a href="mailto:trungcapachau@gmail.com" class="block text-sm text-gray-600 hover:text-blue-600 transition mt-1">trungcapachau@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Map Card --}}
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden p-2">
                    <div class="relative h-[300px] w-full rounded-xl overflow-hidden">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4766.154154406799!2d106.31606191136234!3d11.122824452661611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310b395e78d984a1%3A0x7761a97b5c450056!2zVHLGsOG7nW5nIFRydW5nIEPhuqVwIMOBIENow6J1!5e1!3m2!1sen!2sus!4v1769559679124!5m2!1sen!2sus" 
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>

            </div>

            {{-- 3. CỘT PHẢI: FORM LIÊN HỆ --}}
            <div class="lg:col-span-7">
                {{-- ID dùng để auto scroll --}}
                <div id="contact-form" class="bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden sticky top-24">
                    
                    {{-- HEADER FORM: ĐÃ SỬA MÀU NỀN XANH ĐẬM ĐỂ HIỆN CHỮ TRẮNG --}}
                    <div class="bg-blue-900 px-8 py-6">
                        <h2 class="text-xl font-bold text-white flex items-center gap-3">
                            <i class="fas fa-paper-plane text-yellow-400"></i> Gửi tin nhắn trực tuyến
                        </h2>
                        <p class="text-blue-200 text-sm mt-1 ml-8 font-medium">Điền thông tin bên dưới, chúng tôi sẽ phản hồi trong 24h.</p>
                    </div>

                    <div class="p-8">
                        {{-- Thông báo thành công --}}
                        @if(session('success'))
                            <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-md animate-fade-in flex items-start gap-3">
                                <i class="fas fa-check-circle text-green-600 text-lg mt-0.5"></i>
                                <div>
                                    <p class="font-bold text-green-800">Gửi thành công!</p>
                                    <p class="text-green-700 text-sm">{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('candidate.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <input type="hidden" name="form_anchor" value="contact-form">
                            <input type="hidden" name="note" value="Liên hệ từ trang Contact">

                            {{-- Họ tên --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Họ và tên <span class="text-red-500">*</span></label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-blue-600 transition">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Nhập họ tên của bạn" 
                                           class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-300 rounded-xl focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition font-medium text-gray-800 placeholder-gray-400">
                                </div>
                                @error('name') <p class="text-red-500 text-xs mt-1 italic">{{ $message }}</p> @enderror
                            </div>

                            {{-- Grid SĐT & Email --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Số điện thoại <span class="text-red-500">*</span></label>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-blue-600 transition">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="09xx xxx xxx" 
                                               class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-300 rounded-xl focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition font-medium text-gray-800 placeholder-gray-400">
                                    </div>
                                    @error('phone') <p class="text-red-500 text-xs mt-1 italic">{{ $message }}</p> @enderror
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-blue-600 transition">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="example@email.com" 
                                               class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-300 rounded-xl focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition font-medium text-gray-800 placeholder-gray-400">
                                    </div>
                                    @error('email') <p class="text-red-500 text-xs mt-1 italic">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{-- Nội dung --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Nội dung tin nhắn</label>
                                <div class="relative group">
                                    <div class="absolute top-4 left-4 text-gray-400 group-focus-within:text-blue-600 transition">
                                        <i class="fas fa-comment-alt"></i>
                                    </div>
                                    <textarea name="message" rows="5" placeholder="Bạn cần tư vấn về vấn đề gì?..." 
                                              class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-300 rounded-xl focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition font-medium text-gray-800 placeholder-gray-400 resize-none">{{ old('message') }}</textarea>
                                </div>
                            </div>

                            {{-- NÚT GỬI: ĐÃ SỬA MÀU NỀN XANH ĐẬM (KHÔNG DÙNG GRADIENT) ĐỂ CHẮC CHẮN HIỆN RÕ --}}
                            <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold text-lg py-4 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3 group">
                                <span>Gửi Thông Tin Ngay</span>
                                <i class="fas fa-paper-plane group-hover:translate-x-1 transition-transform"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </main>
</div>

{{-- Script tự động cuộn khi có lỗi/thành công --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if($errors->any() || session('success'))
            const formSection = document.getElementById('contact-form');
            if (formSection) {
                setTimeout(() => {
                    formSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 300);
            }
        @endif
    });
</script>

{{-- Animations --}}
<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

@include('components.footer')