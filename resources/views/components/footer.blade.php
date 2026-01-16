{{-- 1. NÚT NỔI (FLOATING BUTTONS) - PHIÊN BẢN MỚI (AlpineJS + Tailwind) --}}
<div class="fixed bottom-6 right-4 md:right-6 z-50 flex flex-col gap-3 items-center" 
     x-data="{ showTop: false }" 
     @scroll.window="showTop = (window.pageYOffset > 300)">

    {{-- Nút Gọi điện (Hiệu ứng rung) --}}
    <a href="tel:0937404060" class="group relative w-12 h-12 md:w-14 md:h-14 bg-white rounded-full shadow-xl flex items-center justify-center text-green-600 border-2 border-green-500 animate-bounce-slow z-50">
        {{-- Tooltip --}}
        <span class="absolute right-full mr-3 bg-gray-900 text-white text-xs font-bold px-3 py-1.5 rounded opacity-0 group-hover:opacity-100 transition whitespace-nowrap shadow-md">
            Hotline: 093.740.4060
        </span>
        {{-- Icon --}}
        <i class="fas fa-phone-alt text-xl md:text-2xl animate-tada"></i>
        {{-- Sóng lan tỏa --}}
        <span class="absolute inline-flex h-full w-full rounded-full bg-green-500 opacity-20 animate-ping"></span>
    </a>

    {{-- Nút Messenger --}}
    <a href="https://www.facebook.com/messages/t/61576418199795" target="_blank" class="group relative w-12 h-12 md:w-14 md:h-14 bg-blue-600 rounded-full shadow-xl flex items-center justify-center text-white hover:scale-110 transition duration-300 z-40">
        <span class="absolute right-full mr-3 bg-gray-900 text-white text-xs font-bold px-3 py-1.5 rounded opacity-0 group-hover:opacity-100 transition whitespace-nowrap shadow-md">
            Chat Messenger
        </span>
        <i class="fab fa-facebook-messenger text-2xl md:text-3xl"></i>
    </a>

    {{-- Nút Zalo --}}
    <a href="https://zalo.me/0937404060" target="_blank" class="group relative w-12 h-12 md:w-14 md:h-14 bg-blue-500 rounded-full shadow-xl flex items-center justify-center text-white font-bold text-xl md:text-2xl hover:scale-110 transition duration-300 border-2 border-white z-30">
        <span class="absolute right-full mr-3 bg-gray-900 text-white text-xs font-bold px-3 py-1.5 rounded opacity-0 group-hover:opacity-100 transition whitespace-nowrap shadow-md">
            Chat Zalo
        </span>
        Z
    </a>

    {{-- Nút Lên đầu trang (AlpineJS xử lý ẩn hiện) --}}
    <button @click="window.scrollTo({top: 0, behavior: 'smooth'})" 
            x-show="showTop" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-4"
            class="w-10 h-10 md:w-12 md:h-12 bg-yellow-400 hover:bg-yellow-500 text-white rounded-full shadow-lg flex items-center justify-center transition duration-300 mt-2 z-20">
        <i class="fas fa-arrow-up text-lg md:text-xl"></i>
    </button>

</div>

{{-- CSS Animation cho nút gọi --}}
<style>
    @keyframes tada {
        0% { transform: scale(1); }
        10%, 20% { transform: scale(0.9) rotate(-3deg); }
        30%, 50%, 70%, 90% { transform: scale(1.1) rotate(3deg); }
        40%, 60%, 80% { transform: scale(1.1) rotate(-3deg); }
        100% { transform: scale(1) rotate(0); }
    }
    .animate-tada { animation: tada 1.5s infinite; }
    .animate-bounce-slow { animation: bounce 3s infinite; }
</style>

{{-- 2. MAIN FOOTER (ĐỔI MÀU NỀN) --}}
<footer class="bg-gray-800 text-white mx-auto mt-12 relative z-10"> {{-- ĐỔI bg-blue-700 thành bg-gray-800 --}}
    <div class="footer-container grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12 max-w-[98%] xl:max-w-[95%] mx-auto px-4 py-8">
        
        <div class="footer-column">
            <h3 class="font-bold text-lg mb-4 text-yellow-400 uppercase border-b border-gray-700 pb-2 inline-block"> {{-- ĐỔI border-blue-500 thành border-gray-700 --}}
                Thông tin liên hệ
            </h3>
            
            <p class="mb-3 font-bold text-lg uppercase">Trường Trung cấp Á Châu</p>
            
            <ul class="space-y-3 text-sm mb-6">
                <li class="flex items-start">
                    <i class="fas fa-map-marker-alt mt-1 mr-2 text-yellow-400 w-5 flex-shrink-0"></i>
                    <span><strong>Trụ sở chính:</strong> Khu phố Phước Đức A, Phường Gia Lộc, Tỉnh Tây Ninh.</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-map-marker-alt mt-1 mr-2 text-yellow-400 w-5 flex-shrink-0"></i>
                    <span><strong>Cơ sở 2:</strong> 278 Hùng Vương, Khu phố Xóm Mới, Phường Gò Dầu, Tỉnh Tây Ninh.</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-map-marker-alt mt-1 mr-2 text-yellow-400 w-5 flex-shrink-0"></i>
                    <span><strong>Cơ sở 3:</strong> Khu phố Tân Lộc, Phường Gia Lộc, Tây Ninh.</span>
                </li>
            </ul>

            <div class="space-y-2 text-sm border-t border-blue-600 pt-4">
                <p><i class="fas fa-phone-alt mr-2 w-5 text-yellow-400"></i><a href="tel:+84937404060" class="hover:text-yellow-300 transition font-bold text-base">093 740 40 60</a></p>
                <p><i class="fas fa-envelope mr-2 w-5 text-yellow-400"></i><a href="mailto:gdtxachau@gmail.com" class="hover:text-yellow-300 transition">truongtrungcapachautayninh.edu.vn</a></p>
            </div>
        </div>

        <div class="footer-column lg:pl-10">
            <h3 class="font-bold text-lg mb-4 text-yellow-400 uppercase border-b border-blue-500 pb-2 inline-block">
                Hệ thống Giáo dục Á Châu
            </h3>
            <ul class="pl-0 list-none space-y-2 text-sm">
                <li><a href="#" class="hover:text-yellow-300 transition flex items-center group"><i class="fas fa-angle-right mr-2 transition-transform group-hover:translate-x-1"></i>Trường Trung cấp Á Châu</a></li>
                <li><a href="#" class="hover:text-yellow-300 transition flex items-center group"><i class="fas fa-angle-right mr-2 transition-transform group-hover:translate-x-1"></i>Trường Mầm non Á Châu - KCN Phước Đông</a></li>
                <li><a href="#" class="hover:text-yellow-300 transition flex items-center group"><i class="fas fa-angle-right mr-2 transition-transform group-hover:translate-x-1"></i>Trường Mầm non Á Châu - Thanh Phước</a></li>
                <li><a href="#" class="hover:text-yellow-300 transition flex items-center group"><i class="fas fa-angle-right mr-2 transition-transform group-hover:translate-x-1"></i>Trường Mầm non Sao Mai</a></li>
                <li><a href="#" class="hover:text-yellow-300 transition flex items-center group"><i class="fas fa-angle-right mr-2 transition-transform group-hover:translate-x-1"></i>Trung tâm ngoại ngữ tin học Tây Âu</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3 class="font-bold text-lg mb-4 text-yellow-400 uppercase border-b border-blue-500 pb-2 inline-block">
                Kết nối & Bản đồ
            </h3>
            
            <div class="flex space-x-4 mt-2 mb-4">
                <a href="#" target="_blank" class="bg-white/10 w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-blue-600 hover:scale-110 transition shadow-md"><i class="fab fa-facebook-f"></i></a>
                <a href="#" target="_blank" class="bg-white/10 w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-blue-600 hover:scale-110 transition shadow-md"><i class="fas fa-comment-dots"></i></a>
                <a href="#" target="_blank" class="bg-white/10 w-10 h-10 rounded-full flex items-center justify-center text-white hover:bg-red-600 hover:scale-110 transition shadow-md"><i class="fab fa-youtube"></i></a>
            </div>
            
            <div class="w-full h-48 rounded-lg overflow-hidden border-2 border-white/20 shadow-lg bg-gray-200 relative group">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d64131.05789329909!2d106.31321383119845!3d11.097405989665864!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310b395e78d984a1%3A0x7761a97b5c450056!2zVHLGsOG7nW5nIFRydW5nIEPhuqVwIMOBIENow6J1!5e1!3m2!1svi!2sus!4v1766716418049!5m2!1svi!2sus" 
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    class="group-hover:opacity-90 transition">
                </iframe>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom text-center text-sm mt-8 border-t border-gray-700 pt-4 pb-6 bg-gray-900"> {{-- ĐỔI border-blue-600/50 thành border-gray-700, bg-blue-800/40 thành bg-gray-900 --}}
        © 2025 Trường Trung Cấp Á Châu. All Rights Reserved.
    </div>
</footer>