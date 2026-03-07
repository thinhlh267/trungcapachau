@include('components.header')

<div class="bg-gray-50 min-h-screen pb-20 font-bevietnam">

    {{-- HEADER BANNER --}}
    <div class="relative bg-blue-900 py-12 md:py-16 overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-blue-900 via-blue-900/80 to-transparent"></div>
        
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <span class="text-yellow-400 font-bold uppercase tracking-widest text-sm mb-3 border-b border-yellow-400/50 pb-1 inline-block">
                HỆ THỐNG ĐIỆN TỬ
            </span>
            <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight mb-4">
                Tra Cứu Văn Bằng - Chứng Chỉ
            </h1>
            <p class="text-blue-200 text-sm md:text-base max-w-2xl mx-auto">
                Cổng thông tin chính thức giúp học viên và doanh nghiệp xác minh tính xác thực của văn bằng, chứng chỉ do Trường Trung cấp Á Châu cấp phát.
            </p>
        </div>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="max-w-4xl mx-auto px-4 py-10 -mt-8 relative z-20">
        
        {{-- FORM TRA CỨU (CÓ CHIA TAB) --}}
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 md:p-10 mb-10 relative overflow-hidden" 
             x-data="{ activeTab: '{{ $searchType ?? 'don_vi' }}' }">
            
            <div class="absolute top-0 right-0 w-32 h-32 bg-yellow-50 rounded-full blur-3xl opacity-60 -z-10"></div>
            
            {{-- CHUYỂN TAB --}}
            <div class="flex flex-col md:flex-row border-b-2 border-gray-100 mb-8 relative z-10">
                <button @click="activeTab = 'don_vi'" 
                        :class="activeTab === 'don_vi' ? 'border-blue-600 text-blue-800 bg-blue-50/50' : 'border-transparent text-gray-500 hover:text-blue-600 hover:bg-gray-50'" 
                        class="w-full md:w-1/2 py-4 px-1 text-center border-b-[3px] font-bold text-base transition-all duration-300 -mb-[2px]">
                    <i class="fas fa-building mr-2"></i> Tra cứu theo Đơn vị cấp
                </button>
                <button @click="activeTab = 'ho_ten'" 
                        :class="activeTab === 'ho_ten' ? 'border-blue-600 text-blue-800 bg-blue-50/50' : 'border-transparent text-gray-500 hover:text-blue-600 hover:bg-gray-50'" 
                        class="w-full md:w-1/2 py-4 px-1 text-center border-b-[3px] font-bold text-base transition-all duration-300 -mb-[2px]">
                    <i class="fas fa-user-graduate mr-2"></i> Tra cứu theo Họ tên
                </button>
            </div>

            {{-- NỘI DUNG TAB 1: THEO ĐƠN VỊ CẤP --}}
            <form action="{{ route('page.tracuu.vanbang') }}" method="GET" x-show="activeTab === 'don_vi'" 
                  x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100"
                  class="space-y-6 relative z-10">
                <input type="hidden" name="search_type" value="don_vi">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Input: Đơn vị cấp --}}
                    <div>
                        <label for="issuing_body" class="block text-sm font-bold text-gray-700 mb-2">Đơn vị cấp <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><i class="fas fa-university text-gray-400"></i></div>
                            <select id="issuing_body" name="issuing_body" required class="block w-full pl-11 pr-4 py-3 border-2 border-gray-200 rounded-xl text-gray-900 focus:ring-0 focus:border-blue-600 transition outline-none bg-white appearance-none">
                                <option value="Trường Trung cấp Á Châu" {{ request('issuing_body') == 'Trường Trung cấp Á Châu' ? 'selected' : '' }}>Trường Trung cấp Á Châu</option>
                                <option value="Sở Lao động" {{ request('issuing_body') == 'Sở Lao động' ? 'selected' : '' }}>Sở LĐ-TB&XH (Chứng chỉ nghề)</option>
                                <option value="Khác" {{ request('issuing_body') == 'Khác' ? 'selected' : '' }}>Khác</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none"><i class="fas fa-chevron-down text-gray-400 text-sm"></i></div>
                        </div>
                    </div>

                    {{-- Input: Số hiệu --}}
                    <div>
                        <label for="degree_code_1" class="block text-sm font-bold text-gray-700 mb-2">Số hiệu / Mã văn bằng <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><i class="fas fa-barcode text-gray-400"></i></div>
                            <input type="text" id="degree_code_1" name="degree_code" value="{{ request('degree_code') }}" required class="block w-full pl-11 pr-4 py-3 border-2 border-gray-200 rounded-xl text-gray-900 focus:ring-0 focus:border-blue-600 transition outline-none" placeholder="VD: ACV-2026-001">
                        </div>
                    </div>
                </div>

                <div class="flex justify-center pt-2">
                    <button type="submit" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-xl hover:bg-blue-700 hover:shadow-lg transform hover:-translate-y-0.5 transition duration-300 flex items-center gap-2">
                        <i class="fas fa-search"></i> TRA CỨU VĂN BẰNG
                    </button>
                </div>
            </form>

            {{-- NỘI DUNG TAB 2: THEO HỌ TÊN --}}
            <form action="{{ route('page.tracuu.vanbang') }}" method="GET" x-show="activeTab === 'ho_ten'" style="display: none;"
                  x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100"
                  class="space-y-6 relative z-10">
                <input type="hidden" name="search_type" value="ho_ten">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Input: Họ tên --}}
                    <div>
                        <label for="student_name" class="block text-sm font-bold text-gray-700 mb-2">Họ tên người nhận bằng <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><i class="fas fa-user text-gray-400"></i></div>
                            <input type="text" id="student_name" name="student_name" value="{{ request('student_name') }}" required class="block w-full pl-11 pr-4 py-3 border-2 border-gray-200 rounded-xl text-gray-900 focus:ring-0 focus:border-blue-600 transition outline-none" placeholder="VD: Nguyễn Văn A">
                        </div>
                    </div>

                    {{-- Input: Số hiệu --}}
                    <div>
                        <label for="degree_code_2" class="block text-sm font-bold text-gray-700 mb-2">Số hiệu / Mã văn bằng <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"><i class="fas fa-barcode text-gray-400"></i></div>
                            <input type="text" id="degree_code_2" name="degree_code" value="{{ request('degree_code') }}" required class="block w-full pl-11 pr-4 py-3 border-2 border-gray-200 rounded-xl text-gray-900 focus:ring-0 focus:border-blue-600 transition outline-none" placeholder="VD: ACV-2026-001">
                        </div>
                    </div>
                </div>

                <div class="flex justify-center pt-2">
                    <button type="submit" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-xl hover:bg-blue-700 hover:shadow-lg transform hover:-translate-y-0.5 transition duration-300 flex items-center gap-2">
                        <i class="fas fa-search"></i> TRA CỨU HỒ SƠ
                    </button>
                </div>
            </form>
        </div>

        {{-- KHU VỰC HIỂN THỊ KẾT QUẢ --}}
        @if($searched)
            @if($results->count() > 0)
                {{-- Đã tìm thấy: Lặp qua từng kết quả (Lỡ 1 người có nhiều bằng) --}}
                <div class="bg-green-50 border-b border-green-200 p-4 mb-6 rounded-xl flex items-center gap-3 shadow-sm border border-green-100">
                    <i class="fas fa-check-circle text-green-600 text-2xl"></i>
                    <h3 class="text-green-800 font-bold text-lg">Tìm thấy {{ $results->count() }} kết quả hợp lệ trên hệ thống.</h3>
                </div>

                <div class="space-y-8">
                    @foreach($results as $result)
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-2 border-green-400 relative transform transition-all animate-fade-in-up">
                        <div class="p-8 relative">
                            {{-- Watermark mờ --}}
                            <div class="absolute inset-0 flex items-center justify-center opacity-5 pointer-events-none">
                                <i class="fas fa-award text-[200px] text-blue-900"></i>
                            </div>

                            <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-12">
                                <div>
                                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Họ và tên thí sinh</p>
                                    <p class="text-xl font-extrabold text-blue-900 uppercase">{{ $result->student_name }}</p>
                                </div>
                                
                                <div>
                                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Ngày sinh</p>
                                    <p class="text-lg font-bold text-gray-800">{{ $result->date_of_birth->format('d/m/Y') }}</p>
                                </div>

                                <div class="md:col-span-2 border-t border-dashed border-gray-200 pt-6"></div>

                                <div>
                                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Ngành đào tạo</p>
                                    <p class="text-lg font-bold text-gray-800">{{ $result->major }}</p>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Khóa học</p>
                                    <p class="text-lg font-bold text-gray-800">{{ $result->cohort }}</p>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Xếp loại tốt nghiệp</p>
                                    <span class="inline-block px-3 py-1 rounded bg-yellow-100 text-yellow-800 font-bold text-sm">
                                        {{ $result->classification ?? 'Không xếp loại' }}
                                    </span>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Số hiệu văn bằng</p>
                                    <p class="text-lg font-bold text-red-600 tracking-wider">{{ $result->degree_code }}</p>
                                </div>

                                <div class="md:col-span-2 border-t border-dashed border-gray-200 pt-6"></div>

                                <div class="md:col-span-2 flex flex-col items-center text-center bg-gray-50 rounded-xl p-4">
                                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Đơn vị cấp bằng</p>
                                    <p class="text-lg font-bold text-blue-900 uppercase">{{ $result->issuing_body }}</p>
                                    @if($result->issue_date)
                                        <p class="text-sm text-gray-600 mt-1">Ngày ký: {{ $result->issue_date->format('d/m/Y') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            @else
                {{-- KHÔNG TÌM THẤY --}}
                <div class="bg-red-50 border border-red-200 rounded-2xl p-8 text-center animate-fade-in-up shadow-sm">
                    <div class="w-16 h-16 bg-red-100 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-exclamation-triangle text-2xl"></i>
                    </div>
                    <h3 class="text-red-700 font-bold text-xl mb-2">Không tìm thấy dữ liệu!</h3>
                    <p class="text-red-600/80 mb-4">Hệ thống không tìm thấy văn bằng nào khớp với thông tin bạn vừa nhập.</p>
                    <ul class="text-sm text-gray-600 text-left max-w-md mx-auto space-y-2 bg-white p-4 rounded-xl border border-red-100">
                        <li><i class="fas fa-info-circle text-blue-500 mr-2"></i> Kiểm tra lại chính tả (Họ tên, Số hiệu).</li>
                        <li><i class="fas fa-info-circle text-blue-500 mr-2"></i> Đảm bảo Ngày sinh nhập đúng định dạng.</li>
                        <li><i class="fas fa-info-circle text-blue-500 mr-2"></i> Nếu vẫn gặp lỗi, vui lòng liên hệ Phòng Đào tạo.</li>
                    </ul>
                </div>
            @endif
        @endif
        
    </div>
</div>

<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.5s ease-out forwards;
    }
    /* Ẩn mũi tên mặc định của input date trên một số trình duyệt để đỡ xấu */
    input[type="date"]::-webkit-calendar-picker-indicator {
        cursor: pointer;
        opacity: 0.6;
        transition: 0.2s;
    }
    input[type="date"]::-webkit-calendar-picker-indicator:hover {
        opacity: 1;
    }
</style>

@include('components.footer')