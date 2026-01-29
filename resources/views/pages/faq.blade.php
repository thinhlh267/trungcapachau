@include('components.header')

<div class="bg-gray-50 min-h-screen pb-20 font-bevietnam">
    
    {{-- 1. HEADER BANNER (ĐÃ SỬA: NỀN XANH BÌNH THƯỜNG, KHÔNG GRADIENT) --}}
    <div class="relative bg-blue-900 pt-20 pb-24 overflow-hidden">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        
        {{-- Các khối trang trí mờ (Giữ lại để tạo chiều sâu nhẹ, nếu không thích có thể xóa) --}}
        <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full mix-blend-overlay filter blur-3xl opacity-5 animate-blob"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-white rounded-full mix-blend-overlay filter blur-3xl opacity-5 animate-blob animation-delay-2000"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 text-center">
            <span class="text-yellow-400 font-bold tracking-widest uppercase text-sm bg-blue-800/50 px-4 py-1.5 rounded-full border border-blue-700 mb-4 inline-block">
                <i class="fas fa-life-ring mr-2"></i>Hỗ trợ tuyển sinh
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4 leading-tight drop-shadow-md">
                Bạn thắc mắc? <br> <span class="text-yellow-400">Á Châu sẵn sàng giải đáp</span>
            </h1>
            <p class="text-blue-100 text-lg max-w-2xl mx-auto">
                Tổng hợp những câu hỏi thường gặp nhất giúp bạn hiểu rõ hơn về quy trình tuyển sinh và đào tạo tại trường.
            </p>
        </div>
    </div>

    {{-- 2. MAIN CONTENT --}}
    <div class="max-w-4xl mx-auto px-4 -mt-10 relative z-20">
        
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6 md:p-10" x-data="{ active: 1 }">
            
            <h2 class="text-2xl font-bold text-blue-900 mb-8 flex items-center gap-3 border-b border-gray-100 pb-4">
                <i class="fas fa-comments text-yellow-500"></i> Câu hỏi phổ biến nhất
            </h2>

            <div class="space-y-4">

                {{-- ITEM 1 --}}
                <div class="group border border-gray-200 rounded-2xl transition-all duration-300 hover:border-blue-300 hover:shadow-md" :class="active === 1 ? 'bg-blue-50/30 border-blue-200 ring-1 ring-blue-200' : 'bg-white'">
                    <button @click="active = (active === 1 ? null : 1)" class="w-full flex justify-between items-center p-5 text-left focus:outline-none">
                        <span class="font-bold text-lg text-gray-800 group-hover:text-blue-800 transition">Hồ sơ xét tuyển gồm những gì?</span>
                        <span class="flex-shrink-0 ml-4 w-8 h-8 flex items-center justify-center rounded-full border transition-all duration-300"
                              :class="active === 1 ? 'bg-blue-600 border-blue-600 text-white rotate-180' : 'bg-white border-gray-300 text-gray-400 group-hover:border-blue-400 group-hover:text-blue-500'">
                            <i class="fas" :class="active === 1 ? 'fa-minus' : 'fa-plus'"></i>
                        </span>
                    </button>
                    <div x-show="active === 1" x-collapse>
                        <div class="px-5 pb-6 pt-0 text-gray-600 leading-relaxed pl-5">
                            <div class="w-full h-px bg-gray-200 mb-4 opacity-50"></div>
                            <p class="mb-3">Để hoàn tất thủ tục nhập học nhanh chóng, bạn cần chuẩn bị đầy đủ các giấy tờ sau:</p>
                            <ul class="space-y-2">
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span><strong>01 Phiếu đăng ký xét tuyển:</strong> Theo mẫu của trường.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span><strong>01 Bản sao Học bạ:</strong> Có công chứng.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span><strong>01 Bản sao Bằng tốt nghiệp:</strong> THCS/THPT.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                    <span><strong>Giấy tờ cá nhân:</strong> CCCD/CMND và 04 ảnh 3x4.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- ITEM 2 --}}
                <div class="group border border-gray-200 rounded-2xl transition-all duration-300 hover:border-blue-300 hover:shadow-md" :class="active === 2 ? 'bg-blue-50/30 border-blue-200 ring-1 ring-blue-200' : 'bg-white'">
                    <button @click="active = (active === 2 ? null : 2)" class="w-full flex justify-between items-center p-5 text-left focus:outline-none">
                        <span class="font-bold text-lg text-gray-800 group-hover:text-blue-800 transition">Thời gian đào tạo là bao lâu?</span>
                        <span class="flex-shrink-0 ml-4 w-8 h-8 flex items-center justify-center rounded-full border transition-all duration-300"
                              :class="active === 2 ? 'bg-blue-600 border-blue-600 text-white rotate-180' : 'bg-white border-gray-300 text-gray-400 group-hover:border-blue-400 group-hover:text-blue-500'">
                            <i class="fas" :class="active === 2 ? 'fa-minus' : 'fa-plus'"></i>
                        </span>
                    </button>
                    <div x-show="active === 2" x-collapse>
                        <div class="px-5 pb-6 pt-0 text-gray-600 leading-relaxed">
                            <div class="w-full h-px bg-gray-200 mb-4 opacity-50"></div>
                            <p>Thời gian đào tạo được thiết kế linh hoạt tùy theo đối tượng đầu vào:</p>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-3">
                                <div class="bg-white p-3 rounded-lg border border-gray-100 text-center shadow-sm">
                                    <div class="font-bold text-blue-800">Tốt nghiệp THCS</div>
                                    <div class="text-sm text-gray-500 mt-1">Học song song văn hóa</div>
                                    <div class="font-black text-2xl text-yellow-500 mt-2">2 - 2.5 <span class="text-xs text-gray-400">năm</span></div>
                                </div>
                                <div class="bg-white p-3 rounded-lg border border-gray-100 text-center shadow-sm">
                                    <div class="font-bold text-blue-800">Tốt nghiệp THPT</div>
                                    <div class="text-sm text-gray-500 mt-1">Chỉ học chuyên ngành</div>
                                    <div class="font-black text-2xl text-yellow-500 mt-2">1.5 - 2 <span class="text-xs text-gray-400">năm</span></div>
                                </div>
                                <div class="bg-white p-3 rounded-lg border border-gray-100 text-center shadow-sm">
                                    <div class="font-bold text-blue-800">Liên thông</div>
                                    <div class="text-sm text-gray-500 mt-1">Cao đẳng / Đại học</div>
                                    <div class="font-black text-2xl text-yellow-500 mt-2">1 - 1.5 <span class="text-xs text-gray-400">năm</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ITEM 3 --}}
                <div class="group border border-gray-200 rounded-2xl transition-all duration-300 hover:border-blue-300 hover:shadow-md" :class="active === 3 ? 'bg-blue-50/30 border-blue-200 ring-1 ring-blue-200' : 'bg-white'">
                    <button @click="active = (active === 3 ? null : 3)" class="w-full flex justify-between items-center p-5 text-left focus:outline-none">
                        <span class="font-bold text-lg text-gray-800 group-hover:text-blue-800 transition">Học phí của trường như thế nào? Có ưu đãi không?</span>
                        <span class="flex-shrink-0 ml-4 w-8 h-8 flex items-center justify-center rounded-full border transition-all duration-300"
                              :class="active === 3 ? 'bg-blue-600 border-blue-600 text-white rotate-180' : 'bg-white border-gray-300 text-gray-400 group-hover:border-blue-400 group-hover:text-blue-500'">
                            <i class="fas" :class="active === 3 ? 'fa-minus' : 'fa-plus'"></i>
                        </span>
                    </button>
                    <div x-show="active === 3" x-collapse>
                        <div class="px-5 pb-6 pt-0 text-gray-600 leading-relaxed">
                            <div class="w-full h-px bg-gray-200 mb-4 opacity-50"></div>
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r-lg my-3">
                                <p class="font-bold text-blue-900">🔥 ĐẶC BIỆT: Miễn 100% học phí</p>
                                <p class="text-sm mt-1">Dành cho học sinh tốt nghiệp THCS học tiếp lên Trung cấp (Theo Nghị định 81 của Chính phủ).</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ITEM 4 --}}
                <div class="group border border-gray-200 rounded-2xl transition-all duration-300 hover:border-blue-300 hover:shadow-md" :class="active === 4 ? 'bg-blue-50/30 border-blue-200 ring-1 ring-blue-200' : 'bg-white'">
                    <button @click="active = (active === 4 ? null : 4)" class="w-full flex justify-between items-center p-5 text-left focus:outline-none">
                        <span class="font-bold text-lg text-gray-800 group-hover:text-blue-800 transition">Cơ hội việc làm sau khi tốt nghiệp ra sao?</span>
                        <span class="flex-shrink-0 ml-4 w-8 h-8 flex items-center justify-center rounded-full border transition-all duration-300"
                              :class="active === 4 ? 'bg-blue-600 border-blue-600 text-white rotate-180' : 'bg-white border-gray-300 text-gray-400 group-hover:border-blue-400 group-hover:text-blue-500'">
                            <i class="fas" :class="active === 4 ? 'fa-minus' : 'fa-plus'"></i>
                        </span>
                    </button>
                    <div x-show="active === 4" x-collapse>
                        <div class="px-5 pb-6 pt-0 text-gray-600 leading-relaxed">
                            <div class="w-full h-px bg-gray-200 mb-4 opacity-50"></div>
                            <p class="mb-3">Cam kết việc làm là ưu tiên hàng đầu tại Trung cấp Á Châu. 100% sinh viên được giới thiệu việc làm đúng chuyên ngành.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- 3. CTA FOOTER --}}
        <div class="mt-16 text-center">
            <h3 class="text-2xl font-black text-blue-900 mb-3">Bạn vẫn chưa tìm thấy câu trả lời?</h3>
            <p class="text-gray-600 mb-8 max-w-lg mx-auto">Đội ngũ tư vấn viên chuyên nghiệp của chúng tôi luôn sẵn sàng hỗ trợ bạn 24/7. Đừng ngần ngại liên hệ!</p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="tel:0937404060" class="group bg-white border-2 border-gray-200 px-8 py-4 rounded-xl font-bold text-gray-700 hover:border-green-500 hover:text-green-600 transition duration-300 flex items-center justify-center gap-3 shadow-sm hover:shadow-md">
                    <i class="fas fa-phone-alt group-hover:animate-tada text-green-500"></i> 
                    <span>Gọi Hotline 093 740 40 60</span>
                </a>
                
                {{-- ĐÃ SỬA NÚT NÀY THÀNH MÀU XANH ĐẬM --}}
                <a href="{{ route('page.register') }}" class="group bg-blue-700 hover:bg-blue-800 text-white px-8 py-4 rounded-xl font-bold shadow-lg shadow-blue-500/30 hover:-translate-y-1 transition duration-300 flex items-center justify-center gap-3">
                    <span>Gửi câu hỏi tư vấn</span>
                    <i class="fas fa-paper-plane group-hover:translate-x-1 transition"></i>
                </a>
            </div>
        </div>

    </div>
</div>

{{-- Animation Styles --}}
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
</style>

@include('components.footer')