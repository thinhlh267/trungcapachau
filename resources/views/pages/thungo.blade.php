@include('components.header')

{{-- 1. HERO BANNER: 10 NĂM HÀNH TRÌNH --}}
<div class="relative w-full h-[400px] md:h-[500px] overflow-hidden">
    {{-- Nền --}}
    <div class="absolute inset-0 bg-blue-900">
        <div class="absolute inset-0 opacity-20" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-blue-900 via-blue-900/60 to-transparent"></div>
    </div>

    {{-- Nội dung Banner --}}
    <div class="relative z-10 h-full max-w-7xl mx-auto px-4 flex flex-col justify-center items-center text-center text-white pb-10">
        <div class="animate-bounce mb-6">
            <div class="inline-flex items-center gap-2 bg-yellow-500/20 border border-yellow-400 px-6 py-2 rounded-full backdrop-blur-md">
                <i class="fas fa-crown text-yellow-400"></i>
                <span class="text-yellow-400 font-bold tracking-widest uppercase text-sm">Kỷ niệm 10 năm thành lập</span>
            </div>
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black font-bevietnam leading-tight mb-6">
            THƯ NGỎ <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-600">
                TỪ HỘI ĐỒNG QUẢN TRỊ
            </span>
        </h1>
        <div class="w-32 h-1.5 bg-yellow-500 rounded-full"></div>
    </div>
</div>

<main class="font-bevietnam bg-gray-50 relative">
    
    {{-- Decorative Background Elements --}}
    <div class="absolute top-0 left-0 w-full h-64 bg-blue-900 rounded-b-[50%] -z-0"></div>

    <div class="max-w-5xl mx-auto px-4 relative z-10 -mt-24 pb-24">
        
        {{-- 2. MAIN LETTER CARD --}}
        <div class="bg-white rounded-[2rem] shadow-2xl p-8 md:p-16 border-t-8 border-yellow-500 relative overflow-hidden">
            
            {{-- Watermark Logo --}}
            <i class="fas fa-university text-blue-50 absolute top-10 right-10 text-[15rem] -rotate-12 pointer-events-none opacity-50"></i>

            {{-- Nội dung thư --}}
            <div class="relative z-10 text-gray-700 leading-relaxed text-lg text-justify space-y-6">
                
                {{-- Kính gửi --}}
                <div class="mb-10 text-center md:text-left border-b border-gray-100 pb-6">
                    <p class="text-blue-900 font-bold uppercase tracking-wide text-sm mb-2">Trân trọng kính gửi:</p>
                    <h2 class="text-3xl font-black text-blue-900">Quý Phụ huynh và các em Học sinh thân mến!</h2>
                </div>

                {{-- Đoạn 1: Lời chào & Cảm ơn --}}
                <p>
                    Lời đầu tiên, thay mặt Hội đồng Quản trị, Ban Giám hiệu cùng toàn thể Cán bộ - Giảng viên - Nhân viên 
                    <strong>Trường Trung cấp Á Châu</strong>, tôi xin gửi đến Quý phụ huynh và các em học sinh lời chào trân trọng, 
                    lời chúc sức khỏe, hạnh phúc và thành đạt trong công việc.
                </p>
                <p>
                    Chúng tôi cũng xin chân thành cảm ơn sự quan tâm của cấp ủy, chính quyền, ban ngành đoàn thể ở địa phương đã tạo điều kiện thuận lợi cho hoạt động đào tạo của nhà trường. Đặc biệt, nhà trường xin gửi lời tri ân sâu sắc đến sự tin tưởng, hợp tác của các bậc phụ huynh đã và đang đưa con em đến học tập tại trường trong suốt thời gian qua.
                </p>

                {{-- Đoạn 2: Thành tựu 10 năm --}}
                <div class="bg-blue-50 p-8 rounded-2xl border-l-4 border-blue-600 my-8">
                    <h3 class="text-xl font-bold text-blue-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-chart-line text-yellow-500"></i>
                        Dấu ấn 10 năm phát triển
                    </h3>
                    <p class="mb-0">
                        Nhà trường luôn lấy mục tiêu phục vụ và chất lượng làm phương châm hàng đầu. Số lượng tuyển sinh qua các năm có chiều hướng tăng dần. Cụ thể: năm 2018 tuyển sinh 230 học sinh, năm 2019 tuyển sinh 350 học sinh (tăng 50%). Đến năm 2026, Trung cấp Á Châu tự hào đã đào tạo và cung ứng hơn 
                        <strong>3.000 nhân lực chất lượng cao</strong> cho thị trường lao động.
                    </p>
                </div>

                {{-- Đoạn 3: Giáo dục toàn diện --}}
                <p>
                    Trong bối cảnh mới, bên cạnh chương trình đào tạo kiến thức và kỹ năng nghề, nhà trường đặc biệt chú trọng rèn luyện <strong>"Thái độ và Kỹ năng mềm"</strong>.
                </p>
                <p>
                    Chúng tôi giáo dục các em thái độ hiếu thuận với ông bà cha mẹ, tôn sư trọng đạo; rèn luyện kỹ năng giao tiếp, ứng xử, xử lý tình huống và kỷ luật lao động. Mục tiêu là hình thành thái độ tích cực và phẩm chất tốt đẹp cho học sinh khi ra trường.
                </p>

                {{-- Đoạn 4: Kết --}}
                <p>
                    Nhà trường mong muốn và trân trọng đón nhận sự hợp tác chặt chẽ của quý phụ huynh và học sinh.
                </p>

                <div class="pt-8 mt-12 border-t border-gray-200 flex flex-col md:flex-row items-center justify-between gap-8">
                    <div class="text-center md:text-left">
                        <p class="italic text-gray-500 mb-2">Tây Ninh, năm 2026</p>
                        <p class="font-bold text-blue-900 uppercase">TM. HỘI ĐỒNG QUẢN TRỊ</p>
                        {{-- Chữ ký giả lập --}}
                        <div class="font-dancing text-4xl text-blue-700 my-4 transform -rotate-2">
                            Ho Duy Xuyen
                        </div>
                        <p class="font-black text-gray-800 uppercase">TS. HỒ DUY XUYÊN</p>
                        <p class="text-sm text-gray-500">Chủ tịch Hội đồng Quản trị</p>
                    </div>
                    
                    {{-- Huy hiệu 10 năm - Phiên bản nâng cấp --}}
<div class="relative group cursor-default">

    {{-- 1. Aura phát sáng đa lớp --}}
    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full blur-[40px] opacity-30 group-hover:opacity-50 transition duration-1000 animate-pulse"></div>
    <div class="absolute inset-4 bg-yellow-300 rounded-full blur-[20px] opacity-20"></div>

    {{-- 2. Khối Huy chương chính --}}
    <div class="relative w-40 h-40 md:w-48 md:h-48 rounded-full bg-gradient-to-br from-yellow-300 via-yellow-500 to-yellow-700 shadow-[0_10px_40px_rgba(202,138,4,0.6),inset_0_4px_20px_rgba(255,255,255,0.3)] border-4 border-white/80 ring-4 ring-yellow-400/50 flex items-center justify-center transform group-hover:scale-105 transition duration-500 group-hover:shadow-[0_15px_50px_rgba(202,138,4,0.8)]">
        
        {{-- Vòng tròn họa tiết giáo dục xoay --}}
        <div class="absolute inset-3 border-2 border-white/30 border-dashed rounded-full animate-[spin_15s_linear_infinite]">
            {{-- Biểu tượng giáo dục nhỏ --}}
            <i class="fas fa-book-open text-white/40 absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></i>
            <i class="fas fa-graduation-cap text-white/40 absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2"></i>
        </div>
        
        {{-- Nội dung chính --}}
        <div class="relative z-10 text-center text-white drop-shadow-md">
            {{-- Ngôi sao trang trí với hiệu ứng lấp lánh --}}
            <div class="flex justify-center gap-1 mb-1">
                <i class="fas fa-star text-[10px] text-yellow-100 animate-pulse" style="animation-delay: 0s"></i>
                <i class="fas fa-star text-xs text-white animate-bounce"></i>
                <i class="fas fa-star text-[10px] text-yellow-100 animate-pulse" style="animation-delay: 0.5s"></i>
            </div>
            
            {{-- Số 10 với hiệu ứng kim loại --}}
            <h2 class="text-6xl md:text-7xl font-black leading-none tracking-tighter bg-gradient-to-b from-white to-yellow-200 bg-clip-text text-transparent"
                style="text-shadow: 3px 3px 0px rgba(161, 98, 7, 0.5), 0px 0px 15px rgba(255,215,0,0.4);">
                10
            </h2>
            
            {{-- Chữ NĂM với viền ngoài --}}
            <p class="text-sm md:text-base font-bold uppercase tracking-[0.3em] text-yellow-100 mt-1 relative">
                <span class="relative z-10">Năm</span>
                <span class="absolute -inset-1 bg-yellow-900/20 blur-sm rounded-full -z-0"></span>
            </p>
            
            <p class="text-[10px] uppercase tracking-widest text-white/80 font-medium mt-0.5">Thành lập</p>
        </div>

        {{-- Hiệu ứng ánh sáng phản chiếu --}}
        <div class="absolute top-0 left-0 w-full h-1/2 bg-gradient-to-b from-white/40 via-white/20 to-transparent rounded-t-full pointer-events-none"></div>
        
        {{-- Điểm sáng lấp lánh --}}
        <div class="absolute top-3 right-3 w-2 h-2 bg-white rounded-full animate-ping"></div>
    </div>

    {{-- 3. Ruy băng với hiệu ứng nâng cấp --}}
    <div class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 z-20 group-hover:-bottom-3 transition-all duration-300">
        <div class="bg-gradient-to-r from-red-600 via-red-500 to-red-600 text-white text-sm md:text-base font-bold py-1.5 px-6 rounded-full shadow-lg border-2 border-white/90 whitespace-nowrap relative overflow-hidden">
            {{-- Hiệu ứng ánh sáng trên ruy-băng --}}
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-white/50 to-transparent"></div>
            2016 - 2026
            
            {{-- Cạnh ruy-băng --}}
            <div class="absolute top-0 -left-2 w-3 h-full bg-gradient-to-r from-red-700 to-red-600 -z-10 transform skew-x-12 rounded-l-md"></div>
            <div class="absolute top-0 -right-2 w-3 h-full bg-gradient-to-r from-red-600 to-red-700 -z-10 transform -skew-x-12 rounded-r-md"></div>
            
            {{-- Họa tiết nhỏ --}}
            <i class="fas fa-heart text-white/30 text-[8px] absolute -top-1 left-4"></i>
            <i class="fas fa-heart text-white/30 text-[8px] absolute -top-1 right-4"></i>
        </div>
    </div>
    
    {{-- Hạt lấp lánh bay xung quanh --}}
    <div class="absolute -top-2 -right-2 w-1 h-1 bg-yellow-300 rounded-full animate-ping"></div>
    <div class="absolute -bottom-2 -left-2 w-1 h-1 bg-yellow-200 rounded-full animate-ping" style="animation-delay: 0.2s"></div>
</div>
                    {{-- KẾT THÚC HUY HIỆU --}}
                </div>

            </div>
        </div>

        {{-- 3. CONTACT SECTION (ĐÃ CÂN ĐỐI NÚT & LÀM NỔI BẬT LIÊN HỆ CHUNG) --}}
        <div class="mt-20">
            <h3 class="text-center text-3xl font-black text-blue-900 mb-10 uppercase">Hệ thống Đào tạo & Liên hệ</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                {{-- 1. TRỤ SỞ CHÍNH (Full width) --}}
                <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-yellow-500 hover:-translate-y-1 transition duration-300 md:col-span-2 flex flex-col md:flex-row items-start md:items-center gap-6">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-600 flex-shrink-0">
                        <i class="fas fa-star text-2xl"></i>
                    </div>
                    <div class="flex-1 w-full">
                        <h4 class="font-bold text-blue-900 text-xl mb-2 uppercase">Trụ sở chính</h4>
                        <p class="text-gray-600 text-base mb-4 flex items-start gap-2">
                            <i class="fas fa-map-marker-alt text-yellow-500 mt-1"></i>
                            Khu phố Phước Đức A, phường Gia Lộc, tỉnh Tây Ninh
                        </p>
                        <a href="tel:02763533222" class="inline-flex items-center justify-center gap-2 bg-blue-50 text-blue-800 font-bold px-5 py-3 rounded-xl hover:bg-blue-100 transition w-full md:w-auto border border-blue-100">
                            <i class="fas fa-phone-alt animate-pulse text-yellow-600"></i>
                            <span class="text-lg">02763 533 222</span>
                        </a>
                    </div>
                </div>

                {{-- 2. CƠ SỞ 1 --}}
                <div class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-blue-500 hover:-translate-y-1 transition duration-300 flex flex-col h-full">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-700 flex-shrink-0">
                            <i class="fas fa-building text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-900 text-lg mb-1">Cơ sở 1</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                278 Hùng Vương, Khu phố Xóm Mới, phường Gò Dầu, tỉnh Tây Ninh
                            </p>
                        </div>
                    </div>
                    {{-- Nút SĐT đồng bộ style --}}
                    <div class="mt-auto pt-4 border-t border-gray-100">
                        <a href="tel:02763521521" class="flex items-center justify-center gap-2 bg-blue-50 text-blue-800 font-bold px-4 py-3 rounded-xl hover:bg-blue-100 transition w-full border border-blue-100">
                            <i class="fas fa-phone-alt animate-pulse text-yellow-600"></i>
                            <span class="text-lg">02763 521 521</span>
                        </a>
                    </div>
                </div>

                {{-- 3. CƠ SỞ 2 --}}
                <div class="bg-white p-6 rounded-2xl shadow-lg border-l-4 border-blue-500 hover:-translate-y-1 transition duration-300 flex flex-col h-full">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-700 flex-shrink-0">
                            <i class="fas fa-building text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-900 text-lg mb-1">Cơ sở 2</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Khu phố Tân Lộc, phường Gia Lộc, tỉnh Tây Ninh
                            </p>
                        </div>
                    </div>
                    {{-- Nút SĐT đồng bộ style --}}
                    <div class="mt-auto pt-4 border-t border-gray-100">
                        <a href="tel:02766526999" class="flex items-center justify-center gap-2 bg-blue-50 text-blue-800 font-bold px-4 py-3 rounded-xl hover:bg-blue-100 transition w-full border border-blue-100">
                            <i class="fas fa-phone-alt animate-pulse text-yellow-600"></i>
                            <span class="text-lg">02766 526 999</span>
                        </a>
                    </div>
                </div>

            </div>

            {{-- Thông tin liên hệ chung (SỬA LỖI: Dùng nền xanh đậm bg-blue-900 để tương phản) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                <a href="mailto:truongtrungcapachautayninh@gmail.com" class="group bg-blue-900 text-white p-5 rounded-2xl shadow-xl flex items-center justify-center gap-4 hover:bg-blue-800 hover:-translate-y-1 transition duration-300 border border-blue-800">
                    <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center group-hover:bg-white/20 transition">
                        <i class="fas fa-envelope text-yellow-400 text-xl"></i>
                    </div>
                    <span class="font-bold text-lg uppercase tracking-wide">Gửi Email hỗ trợ</span>
                </a>
                
                <a href="https://facebook.com/TrungCapAChau" target="_blank" class="group bg-blue-900 text-white p-5 rounded-2xl shadow-xl flex items-center justify-center gap-4 hover:bg-blue-800 hover:-translate-y-1 transition duration-300 border border-blue-800">
                    <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center group-hover:bg-white/20 transition">
                        <i class="fab fa-facebook-f text-yellow-400 text-xl"></i>
                    </div>
                    <span class="font-bold text-lg uppercase tracking-wide">Fanpage Nhà trường</span>
                </a>
            </div>
        </div>

    </div>
</main>

{{-- Font chữ viết tay cho chữ ký --}}
<style>
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');
    .font-dancing {
        font-family: 'Dancing Script', cursive;
    }
</style>

@include('components.footer')