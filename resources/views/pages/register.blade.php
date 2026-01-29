@include('components.header')

<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50/30 font-bevietnam">
    
    {{-- Hero Section với ảnh background --}}
    <div class="relative bg-gradient-to-r from-blue-900 via-blue-800 to-blue-900 py-12 lg:py-16 overflow-hidden">
        {{-- Background Pattern với overlay --}}
        <div class="absolute inset-0 bg-blue-900/90">
            <div class="absolute inset-0 opacity-20" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        </div>
        
        {{-- Blob Effects --}}
        <div class="absolute top-10 right-10 w-64 h-64 bg-yellow-400/20 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute bottom-10 left-10 w-72 h-72 bg-blue-400/20 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <span class="inline-flex items-center px-4 py-2.5 bg-white/20 backdrop-blur-sm text-yellow-300 rounded-full text-sm font-bold uppercase tracking-wider border border-white/30 mb-6 shadow-lg">
                    <i class="fas fa-graduation-cap mr-2"></i> Đăng Ký Nhận Tư Vấn Miễn Phí
                </span>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-white mb-6 leading-tight tracking-tight">
                    Cùng Trung Cấp Á Châu
                    <br>
                    <span class="text-yellow-400 mt-2 block">
                        Khởi Đầu Tương Lai Vững Chắc
                    </span>
                </h1>
                <p class="text-lg md:text-xl text-blue-100 max-w-3xl mx-auto mb-8 font-medium leading-relaxed">
                    Để lại thông tin – Chúng tôi sẽ liên hệ tư vấn chi tiết về ngành học, học phí và cơ hội việc làm
                </p>
                
                {{-- Quick Stats --}}
                <div class="flex flex-wrap justify-center gap-4 md:gap-6 mt-10">
                    <div class="text-center px-4 py-3 bg-white/10 rounded-xl backdrop-blur-sm border border-white/20">
                        <div class="text-2xl md:text-3xl font-black text-white">15+</div>
                        <div class="text-blue-200 text-xs md:text-sm">Năm kinh nghiệm</div>
                    </div>
                    <div class="text-center px-4 py-3 bg-white/10 rounded-xl backdrop-blur-sm border border-white/20">
                        <div class="text-2xl md:text-3xl font-black text-white">5.000+</div>
                        <div class="text-blue-200 text-xs md:text-sm">Sinh viên tốt nghiệp</div>
                    </div>
                    <div class="text-center px-4 py-3 bg-white/10 rounded-xl backdrop-blur-sm border border-white/20">
                        <div class="text-2xl md:text-3xl font-black text-white">100%</div>
                        <div class="text-blue-200 text-xs md:text-sm">Có việc làm</div>
                    </div>
                    <div class="text-center px-4 py-3 bg-white/10 rounded-xl backdrop-blur-sm border border-white/20">
                        <div class="text-2xl md:text-3xl font-black text-white">50+</div>
                        <div class="text-blue-200 text-xs md:text-sm">Đối tác doanh nghiệp</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12 -mt-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 md:gap-8">
            
            {{-- Left Column: Benefits & Info --}}
            <div class="lg:col-span-4 space-y-6">
                {{-- Benefits Card --}}
                <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 lg:p-7">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-200">
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center shadow-md">
                            <i class="fas fa-award text-white text-lg"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Lợi ích khi đăng ký</h2>
                            <p class="text-xs text-gray-500 mt-1">Những ưu đãi đặc biệt dành riêng cho bạn</p>
                        </div>
                    </div>
                    
                    <div class="space-y-5">
                        <div class="flex items-start gap-4 p-4 hover:bg-blue-50/80 rounded-xl transition-all duration-300 group border border-gray-100 hover:border-blue-200">
                            <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-handshake text-blue-700 text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 group-hover:text-blue-800 text-base">Tư vấn 1:1 miễn phí</h3>
                                <p class="text-sm text-gray-600 mt-1.5 leading-relaxed">Được tư vấn trực tiếp bởi chuyên viên tuyển sinh</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4 p-4 hover:bg-blue-50/80 rounded-xl transition-all duration-300 group border border-gray-100 hover:border-green-200">
                            <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-calendar-alt text-green-700 text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 group-hover:text-green-800 text-base">Lịch học linh hoạt</h3>
                                <p class="text-sm text-gray-600 mt-1.5 leading-relaxed">Ca sáng/chiều/tối phù hợp với mọi đối tượng</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4 p-4 hover:bg-blue-50/80 rounded-xl transition-all duration-300 group border border-gray-100 hover:border-orange-200">
                            <div class="flex-shrink-0 w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-briefcase text-orange-700 text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 group-hover:text-orange-800 text-base">Cam kết việc làm</h3>
                                <p class="text-sm text-gray-600 mt-1.5 leading-relaxed">100% sinh viên được giới thiệu việc làm sau tốt nghiệp</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4 p-4 hover:bg-blue-50/80 rounded-xl transition-all duration-300 group border border-gray-100 hover:border-purple-200">
                            <div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-university text-purple-700 text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 group-hover:text-purple-800 text-base">Liên thông đại học</h3>
                                <p class="text-sm text-gray-600 mt-1.5 leading-relaxed">Cơ hội liên thông lên các trường đại học uy tín</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Quick Contact Card --}}
                <div class="bg-gradient-to-br from-blue-50 to-blue-100/80 rounded-2xl border border-blue-200 p-6 lg:p-7 shadow-lg">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 bg-blue-700 rounded-lg flex items-center justify-center shadow-sm">
                            <i class="fas fa-headset text-white text-base"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Cần hỗ trợ nhanh?</h3>
                            <p class="text-xs text-gray-600 mt-0.5">Chúng tôi luôn sẵn sàng hỗ trợ bạn</p>
                        </div>
                    </div>
                    
                    <a href="tel:0937404060" class="block group">
                        <div class="bg-white rounded-xl p-4 border border-blue-300 hover:border-blue-500 hover:shadow-xl transition-all duration-300 shadow-md">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 bg-gradient-to-r from-green-600 to-emerald-700 rounded-full flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform">
                                    <i class="fas fa-phone-alt text-white text-xl"></i>
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900 text-xl tracking-tight">093 740 40 60</div>
                                    <div class="text-sm text-gray-600 mt-1 flex items-center gap-2">
                                        <span class="flex items-center gap-1">
                                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                            <span>Hotline 24/7</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                    <p class="text-sm text-gray-700 mt-4 text-center font-medium">
                        <i class="fas fa-bolt text-yellow-500 mr-1"></i> Phản hồi ngay lập tức
                    </p>
                </div>
            </div>
            
            {{-- Right Column: Form --}}
            <div class="lg:col-span-8">
                {{-- THÊM ID="form-dang-ky" ĐỂ CONTROLLER CUỘN VỀ ĐÂY SAU KHI GỬI --}}
                <div id="form-dang-ky" class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
                    
                    {{-- Form Header --}}
                    <div class="bg-blue-900 px-6 py-5 shadow-md">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-3">
                            <div>
                                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                                    <i class="fas fa-edit text-yellow-300"></i>
                                    Hoàn thành form để nhận tư vấn miễn phí
                                </h2>
                                <p class="text-blue-100 text-sm mt-1 font-medium">Điền thông tin chính xác để được hỗ trợ tốt nhất</p>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Progress Steps --}}
                    <div class="px-6 py-8 bg-gradient-to-r from-blue-50 to-gray-50 border-b border-gray-200">
                        <div class="flex items-center justify-center">
                            <div class="flex items-center w-full max-w-lg relative">
                                {{-- Bước 1 --}}
                                <div class="relative z-10 flex flex-col items-center">
                                    <div class="w-14 h-14 rounded-full flex items-center justify-center font-black text-xl text-white bg-blue-700 shadow-xl border-[4px] border-white ring-1 ring-blue-300">1</div>
                                    <span class="text-xs font-bold text-blue-800 mt-3 uppercase tracking-wide">Điền thông tin</span>
                                </div>
                                {{-- Line 1-2 --}}
                                <div class="flex-1 h-1 bg-gray-200 mx-2 relative -top-4">
                                    <div class="absolute inset-y-0 left-0 bg-blue-500 w-1/2 rounded-full"></div>
                                </div>
                                {{-- Bước 2 --}}
                                <div class="relative z-10 flex flex-col items-center">
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center font-bold text-lg bg-white text-gray-400 border-2 border-gray-200 shadow-sm">2</div>
                                    <span class="text-xs font-medium text-gray-500 mt-3">Nhận tư vấn</span>
                                </div>
                                {{-- Line 2-3 --}}
                                <div class="flex-1 h-1 bg-gray-200 mx-2 relative -top-4"></div>
                                {{-- Bước 3 --}}
                                <div class="relative z-10 flex flex-col items-center">
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center font-bold text-lg bg-white text-gray-400 border-2 border-gray-200 shadow-sm">3</div>
                                    <span class="text-xs font-medium text-gray-500 mt-3">Nhập học</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 md:p-7">
                        {{-- HIỂN THỊ THÔNG BÁO THÀNH CÔNG TỪ CONTROLLER --}}
                        @if(session('success'))
                        <div class="mb-6 animate-fade-in scroll-mt-20">
                            <div class="bg-green-50 border border-green-200 rounded-xl p-4 flex items-start gap-4 shadow-sm">
                                <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-green-800 text-lg">Đăng ký thành công! 🎉</h4>
                                    <p class="text-green-700 mt-1 font-medium">{{ session('success') }}</p>
                                    <p class="text-sm text-green-600 mt-2 flex items-center gap-1 font-medium">
                                        <i class="fas fa-clock"></i> Chúng tôi sẽ liên hệ với bạn trong vòng 24 giờ
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- FORM BẮT ĐẦU --}}
                        <form action="{{ route('candidate.store') }}" method="POST" class="space-y-6">
                            @csrf
                            {{-- Input ẩn để Controller nhận biết đây là form có chọn ngành --}}
                            <input type="hidden" name="note" value="Đăng ký tại trang Register chuyên biệt">
                            
                            {{-- Personal Info Section --}}
                            <div class="border border-gray-300 rounded-xl p-6 bg-gradient-to-br from-gray-50 to-white shadow-sm">
                                <div class="flex items-center gap-3 mb-6">
                                    <div class="w-10 h-10 bg-blue-200 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-user text-blue-800"></i>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900">Thông tin cá nhân</h3>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    {{-- HỌ TÊN --}}
                                    <div>
                                        <label class="block text-sm font-bold text-gray-800 mb-2.5">
                                            Họ và tên <span class="text-red-600">*</span>
                                        </label>
                                        <div class="relative group">
                                            <div class="absolute left-4 top-3.5 text-gray-500 group-focus-within:text-blue-600">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <input type="text" name="name" value="{{ old('name') }}" required 
                                                   placeholder="Nguyễn Văn A" 
                                                   class="w-full pl-12 pr-4 py-3.5 rounded-lg border-2 @error('name') border-red-500 @else border-gray-300 @enderror focus:border-blue-500 focus:ring-3 focus:ring-blue-200/50 outline-none transition placeholder-gray-500 bg-white shadow-sm hover:border-blue-400 text-gray-800 font-medium">
                                        </div>
                                        {{-- Hiển thị lỗi Họ tên --}}
                                        @error('name')
                                            <p class="text-red-500 text-xs mt-1 font-medium italic"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    {{-- SỐ ĐIỆN THOẠI --}}
                                    <div>
                                        <label class="block text-sm font-bold text-gray-800 mb-2.5">
                                            Số điện thoại <span class="text-red-600">*</span>
                                        </label>
                                        <div class="relative group">
                                            <div class="absolute left-4 top-3.5 text-gray-500 group-focus-within:text-blue-600">
                                                <i class="fas fa-mobile-alt"></i>
                                            </div>
                                            <input type="tel" name="phone" value="{{ old('phone') }}" required 
                                                   placeholder="0912 345 678" 
                                                   class="w-full pl-12 pr-4 py-3.5 rounded-lg border-2 @error('phone') border-red-500 @else border-gray-300 @enderror focus:border-blue-500 focus:ring-3 focus:ring-blue-200/50 outline-none transition placeholder-gray-500 bg-white shadow-sm hover:border-blue-400 text-gray-800 font-medium">
                                        </div>
                                        {{-- Hiển thị lỗi SĐT --}}
                                        @error('phone')
                                            <p class="text-red-500 text-xs mt-1 font-medium italic"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                        @enderror
                                        <p class="text-xs text-gray-600 mt-2.5 font-medium">
                                            <i class="fas fa-info-circle text-blue-600 mr-1"></i> Số điện thoại chính xác để chúng tôi liên hệ
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Education Info Section --}}
                            <div class="border border-gray-300 rounded-xl p-6 bg-gradient-to-br from-gray-50 to-white shadow-sm">
                                <div class="flex items-center gap-3 mb-6">
                                    <div class="w-10 h-10 bg-green-200 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-graduation-cap text-green-800"></i>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900">Thông tin học tập</h3>
                                </div>
                                
                                <div class="space-y-5">
                                    {{-- CHỌN NGÀNH --}}
                                    <div>
                                        <label class="block text-sm font-bold text-gray-800 mb-2.5">
                                            Ngành học quan tâm <span class="text-red-600">*</span>
                                        </label>
                                        <div class="relative group">
                                            <div class="absolute left-4 top-3.5 text-gray-500 group-focus-within:text-blue-600">
                                                <i class="fas fa-book-open"></i>
                                            </div>
                                            <select name="major_id" 
                                                    class="w-full pl-12 pr-10 py-3.5 rounded-lg border-2 @error('major_id') border-red-500 @else border-gray-300 @enderror focus:border-blue-500 focus:ring-3 focus:ring-blue-200/50 outline-none transition appearance-none bg-white shadow-sm hover:border-blue-400 cursor-pointer text-gray-800 font-medium">
                                                <option value="" class="text-gray-500">-- Chọn ngành học --</option>
                                                @foreach($majors as $major)
                                                    <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }} class="py-2 text-gray-800">
                                                        {{ $major->name }}
                                                        @if($major->is_hot) (HOT) @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="absolute right-4 top-3.5 pointer-events-none text-gray-500">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        {{-- Hiển thị lỗi Ngành --}}
                                        @error('major_id')
                                            <p class="text-red-500 text-xs mt-1 font-medium italic"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                        @enderror
                                        <p class="text-xs text-gray-600 mt-2.5 font-medium flex items-start gap-1.5">
                                            <i class="fas fa-lightbulb text-yellow-500 mt-0.5"></i>
                                            Chọn ngành phù hợp với sở thích và năng lực
                                        </p>
                                    </div>
                                    
                                    {{-- GHI CHÚ --}}
                                    <div>
                                        <label class="block text-sm font-bold text-gray-800 mb-2.5">
                                            Nội dung cần tư vấn
                                        </label>
                                        <div class="relative group">
                                            <div class="absolute left-4 top-3.5 text-gray-500 group-focus-within:text-blue-600">
                                                <i class="fas fa-comment-dots"></i>
                                            </div>
                                            <textarea name="note" rows="3" 
                                                      placeholder="Ví dụ: Em muốn tư vấn về học phí, thời gian học..."
                                                      class="w-full pl-12 pr-4 py-3.5 rounded-lg border-2 border-gray-300 focus:border-blue-500 focus:ring-3 focus:ring-blue-200/50 outline-none transition placeholder-gray-500 bg-white shadow-sm hover:border-blue-400 text-gray-800 font-medium resize-none">{{ old('note') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Submit Section --}}
                            <div class="bg-gradient-to-r from-blue-50 to-blue-100/80 rounded-2xl border border-blue-300 p-6 shadow-lg">
                                <div class="text-center mb-6">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Sẵn sàng bắt đầu?</h3>
                                    <p class="text-gray-700 font-medium">Nhấn nút bên dưới để gửi thông tin đăng ký</p>
                                </div>
                                
                                <div class="flex flex-col md:flex-row items-center justify-between gap-5">
                                    <div class="flex items-center gap-3 text-sm text-gray-700">
                                        <div class="w-10 h-10 bg-green-200 rounded-full flex items-center justify-center">
                                            <i class="fas fa-shield-alt text-green-700"></i>
                                        </div>
                                        <span class="max-w-xs font-medium">Thông tin của bạn được bảo mật tuyệt đối</span>
                                    </div>
                                    
                                    <button type="submit" 
                                            class="group bg-gradient-to-r from-blue-700 via-blue-800 to-blue-900 hover:from-blue-800 hover:via-blue-900 hover:to-blue-950 text-white font-bold px-10 py-4 rounded-xl shadow-xl hover:shadow-2xl transform transition-all duration-300 hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3 min-w-[200px]">
                                        <span class="text-lg tracking-wide">Gửi đăng ký ngay</span>
                                        <i class="fas fa-paper-plane text-white text-lg group-hover:translate-x-2 transition-transform duration-300"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    
    .animate-fade-in {
        animation: fade-in 0.5s ease-out;
    }
    
    .animate-blob {
        animation: blob 7s infinite ease-in-out;
    }
    
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    
    /* Tăng độ đậm của text */
    input, select, textarea {
        font-weight: 500 !important;
        color: #1f2937 !important;
    }
    
    .placeholder-gray-500::placeholder {
        color: #6b7280 !important;
        font-weight: 400;
    }
    
    /* Làm đậm border và text */
    .border-2 {
        border-width: 2px !important;
    }
    
    /* Tăng độ tương phản cho text */
    .text-gray-900 {
        color: #111827 !important;
    }
    
    .text-gray-800 {
        color: #1f2937 !important;
    }
    
    .text-gray-700 {
        color: #374151 !important;
    }
    
    .text-gray-600 {
        color: #4b5563 !important;
    }
    
    /* Tăng shadow cho nổi bật */
    .shadow-lg {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1) !important;
    }
    
    .shadow-xl {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
    }
    
    /* Làm đậm icon */
    i.fas, i.fab {
        filter: brightness(1.1) contrast(1.1);
    }
    
    /* Đảm bảo số progress steps hiển thị rõ */
    .step-number {
        position: relative;
        z-index: 10;
        text-shadow: 0 1px 2px rgba(0,0,0,0.3);
    }
</style>

@include('components.footer')