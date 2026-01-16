@include('components.header')

<div class="bg-gray-50 min-h-screen pb-20 font-bevietnam">
    
    <div class="bg-blue-900 py-12 text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://img.freepik.com/free-photo/customer-service-agent-working_23-2148849479.jpg')] bg-cover bg-center opacity-20"></div>
        <div class="relative z-10">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white uppercase mb-4">Liên hệ với chúng tôi</h1>
            <p class="text-blue-200 text-lg">Chúng tôi luôn sẵn sàng lắng nghe và giải đáp mọi thắc mắc của bạn</p>
        </div>
    </div>

    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 py-3 text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-blue-600"><i class="fas fa-home mr-1"></i> Trang chủ</a>
            <span class="mx-2">/</span>
            <span class="text-blue-800 font-bold">Liên hệ</span>
        </div>
    </div>

    <main class="max-w-7xl mx-auto px-4 py-16">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <div class="space-y-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg border-l-4 border-yellow-500">
                    <h2 class="text-2xl font-bold text-blue-900 mb-6 uppercase">Thông tin liên hệ</h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center text-blue-600 flex-shrink-0 mt-1">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-bold text-gray-800">Địa chỉ trụ sở chính</h3>
                                <p class="text-gray-600">Khu phố Phước Đức A, Phường Gia Lộc, Thị xã Trảng Bàng, Tỉnh Tây Ninh</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center text-blue-600 flex-shrink-0 mt-1">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-bold text-gray-800">Hotline tư vấn</h3>
                                <p class="text-gray-600"><a href="tel:0937404060" class="hover:text-yellow-600 font-bold">093 740 40 60</a></p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center text-blue-600 flex-shrink-0 mt-1">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-bold text-gray-800">Email</h3>
                                <p class="text-gray-600"><a href="mailto:gdtxachau@gmail.com" class="hover:text-yellow-600">gdtxachau@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-200 rounded-2xl overflow-hidden shadow-lg h-[400px]">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3914.340656263833!2d106.3347523748882!3d11.162438889010465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310b471c2436034f%3A0x62953503f260340b!2zVHLGsOG7nW5nIFRydW5nIGPhuqVwIMOBIENow6J1!5e0!3m2!1svi!2s!4v1703576722881!5m2!1svi!2s" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <div class="bg-white p-8 md:p-10 rounded-2xl shadow-xl">
                <h2 class="text-2xl font-bold text-blue-900 mb-2 uppercase">Gửi tin nhắn cho chúng tôi</h2>
                <p class="text-gray-500 mb-8">Vui lòng điền thông tin bên dưới, bộ phận tư vấn sẽ liên hệ lại sớm nhất.</p>

                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Họ và tên <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="Nhập họ tên của bạn" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Số điện thoại <span class="text-red-500">*</span></label>
                            <input type="tel" placeholder="Nhập SĐT" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                            <input type="email" placeholder="Nhập Email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nội dung cần tư vấn</label>
                        <textarea rows="4" placeholder="Bạn cần tư vấn về chương trình học nào?" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition"></textarea>
                    </div>

                    <button type="button" class="w-full bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold py-4 rounded-lg shadow-lg hover:shadow-xl hover:scale-[1.02] transition duration-300 uppercase tracking-wide">
                        <i class="fas fa-paper-plane mr-2"></i> Gửi thông tin
                    </button>
                </form>
            </div>

        </div>

    </main>
</div>

@include('components.footer')