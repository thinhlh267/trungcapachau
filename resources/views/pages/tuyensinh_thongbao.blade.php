@include('components.header')

{{-- 1. HERO BANNER: THÔNG BÁO TUYỂN SINH --}}
<div class="relative w-full h-[300px] md:h-[400px] overflow-hidden">
    <div class="absolute inset-0 bg-blue-900">
        <div class="absolute inset-0 opacity-20" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-blue-900 via-blue-900/60 to-transparent"></div>
    </div>
    <div class="relative z-10 h-full max-w-7xl mx-auto px-4 flex flex-col justify-center items-center text-center text-white">
        
        <span class="inline-block py-1 px-3 rounded-full bg-yellow-500/20 border border-yellow-400 text-yellow-300 text-xs font-bold tracking-widest uppercase mb-4 animate-pulse">
            Năm học 2026 - 2027
        </span>

        <h1 class="text-3xl md:text-5xl lg:text-6xl font-black font-bevietnam leading-tight mb-4 text-shadow-lg">
            THÔNG BÁO TUYỂN SINH
        </h1>
        
        <div class="text-xl md:text-2xl font-light text-blue-100 max-w-3xl">
            Hệ Trung cấp Chính quy - <span class="font-bold text-yellow-400">Xét tuyển không thi</span>
        </div>
        
        <div class="mt-8 w-24 h-1.5 bg-yellow-500 rounded-full"></div>
    </div>
</div>

{{-- 2. BREADCRUMB --}}
<div class="bg-blue-50 border-b border-blue-100 sticky top-0 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-3">
        <nav class="flex items-center text-sm font-medium">
            <a href="/" class="text-blue-600 hover:text-blue-800 transition"><i class="fas fa-home"></i></a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-gray-500">Tuyển sinh</span>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-blue-900">Thông báo tuyển sinh 2026</span>
        </nav>
    </div>
</div>

<main class="font-bevietnam bg-white relative">

    <div class="max-w-7xl mx-auto px-4 py-16">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            {{-- CỘT TRÁI: NỘI DUNG CHÍNH (8 phần) --}}
            <div class="lg:col-span-8 space-y-12">
                
                {{-- 1. LỜI MỞ ĐẦU --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-2 h-full bg-blue-600"></div>
                    <h2 class="text-2xl font-bold text-blue-900 mb-4 flex items-center gap-3">
                        <i class="fas fa-bullhorn text-yellow-500 text-3xl"></i>
                        Về việc tuyển sinh Hệ Trung cấp năm 2026
                    </h2>
                    <div class="prose prose-blue text-gray-600 text-justify leading-relaxed">
                        <p>
                            Căn cứ vào kế hoạch đào tạo năm 2026, <strong>Trường Trung cấp Á Châu</strong> trân trọng thông báo tuyển sinh hệ Trung cấp chính quy. Nhà trường cam kết mang đến môi trường học tập hiện đại, chương trình đào tạo gắn liền thực tiễn doanh nghiệp và chính sách hỗ trợ việc làm trọn đời cho sinh viên.
                        </p>
                    </div>
                </div>

                {{-- 2. ĐỐI TƯỢNG & HÌNH THỨC --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-blue-50/50 p-6 rounded-2xl border border-blue-100">
                        <h3 class="font-bold text-blue-900 mb-3 flex items-center gap-2">
                            <i class="fas fa-user-graduate text-blue-600"></i> Đối tượng tuyển sinh
                        </h3>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-2 text-gray-700 text-sm">
                                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                <span>Tốt nghiệp THCS (Lớp 9)</span>
                            </li>
                            <li class="flex items-start gap-2 text-gray-700 text-sm">
                                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                <span>Tốt nghiệp THPT (Lớp 12) hoặc dang dở THPT</span>
                            </li>
                            <li class="flex items-start gap-2 text-gray-700 text-sm">
                                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                <span>Người đi làm muốn học văn bằng 2</span>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-yellow-50/50 p-6 rounded-2xl border border-yellow-100">
                        <h3 class="font-bold text-blue-900 mb-3 flex items-center gap-2">
                            <i class="fas fa-tasks text-yellow-600"></i> Hình thức tuyển sinh
                        </h3>
                        <div class="text-center py-4">
                            <span class="block text-4xl font-black text-blue-900 mb-2">XÉT TUYỂN</span>
                            <span class="inline-block bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase">
                                Không thi đầu vào
                            </span>
                            <p class="text-gray-600 text-sm mt-3">Chỉ cần xét học bạ THCS hoặc THPT</p>
                        </div>
                    </div>
                </div>

                {{-- 3. CÁC NGÀNH ĐÀO TẠO (TABLE) --}}
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-blue-900 rounded-lg flex items-center justify-center text-white">
                            <span class="font-bold text-lg">01</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Các ngành đào tạo mũi nhọn</h3>
                    </div>

                    <div class="overflow-hidden rounded-xl border border-gray-200 shadow-lg">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-blue-900 text-white text-sm uppercase">
                                    <th class="p-4 border-b border-blue-800">STT</th>
                                    <th class="p-4 border-b border-blue-800">Tên ngành nghề</th>
                                    <th class="p-4 border-b border-blue-800 hidden md:table-cell">Mã ngành</th>
                                    <th class="p-4 border-b border-blue-800 hidden md:table-cell">Thời gian</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 bg-white">
                                {{-- KỸ THUẬT --}}
                                <tr class="bg-gray-50"><td colspan="4" class="p-2 pl-4 font-bold text-blue-800 text-xs uppercase tracking-wider">Khối Kỹ thuật & Công nghệ</td></tr>
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="p-4 border-b font-medium text-center">1</td>
                                    <td class="p-4 border-b font-bold text-blue-900">Công nghệ thông tin (ƯDPM) <span class="bg-red-100 text-red-600 text-[10px] px-2 py-0.5 rounded ml-2">HOT</span></td>
                                    <td class="p-4 border-b hidden md:table-cell">5480202</td>
                                    <td class="p-4 border-b hidden md:table-cell">1.5 - 2 năm</td>
                                </tr>
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="p-4 border-b font-medium text-center">2</td>
                                    <td class="p-4 border-b">Kỹ thuật máy lạnh & ĐHKK</td>
                                    <td class="p-4 border-b hidden md:table-cell">5520205</td>
                                    <td class="p-4 border-b hidden md:table-cell">1.5 - 2 năm</td>
                                </tr>
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="p-4 border-b font-medium text-center">3</td>
                                    <td class="p-4 border-b">Điện công nghiệp</td>
                                    <td class="p-4 border-b hidden md:table-cell">5520227</td>
                                    <td class="p-4 border-b hidden md:table-cell">1.5 - 2 năm</td>
                                </tr>

                                {{-- KINH TẾ --}}
                                <tr class="bg-gray-50"><td colspan="4" class="p-2 pl-4 font-bold text-blue-800 text-xs uppercase tracking-wider">Khối Kinh tế & Dịch vụ</td></tr>
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="p-4 border-b font-medium text-center">4</td>
                                    <td class="p-4 border-b">Hướng dẫn du lịch</td>
                                    <td class="p-4 border-b hidden md:table-cell">5810103</td>
                                    <td class="p-4 border-b hidden md:table-cell">1.5 - 2 năm</td>
                                </tr>
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="p-4 border-b font-medium text-center">5</td>
                                    <td class="p-4 border-b">Kế toán doanh nghiệp</td>
                                    <td class="p-4 border-b hidden md:table-cell">5340302</td>
                                    <td class="p-4 border-b hidden md:table-cell">1.5 - 2 năm</td>
                                </tr>

                                {{-- SỨC KHỎE --}}
                                <tr class="bg-gray-50"><td colspan="4" class="p-2 pl-4 font-bold text-blue-800 text-xs uppercase tracking-wider">Khối Sức khỏe</td></tr>
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="p-4 border-b font-medium text-center">6</td>
                                    <td class="p-4 border-b font-bold text-blue-900">Dược sĩ trung cấp</td>
                                    <td class="p-4 border-b hidden md:table-cell">5720201</td>
                                    <td class="p-4 border-b hidden md:table-cell">2 năm</td>
                                </tr>
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="p-4 border-b font-medium text-center">7</td>
                                    <td class="p-4 border-b">Y sĩ đa khoa</td>
                                    <td class="p-4 border-b hidden md:table-cell">5720101</td>
                                    <td class="p-4 border-b hidden md:table-cell">2 năm</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- 4. QUYỀN LỢI (BOXES) --}}
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center text-white">
                            <span class="font-bold text-lg">02</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Quyền lợi đặc biệt</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gradient-to-br from-green-50 to-green-100 p-5 rounded-xl border border-green-200">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-hand-holding-usd text-green-600 text-xl mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-green-800">Miễn giảm học phí</h4>
                                    <p class="text-sm text-gray-600 mt-1">Học sinh tốt nghiệp THCS học thẳng lên Trung cấp được miễn 100% học phí theo Nghị định 81.</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-5 rounded-xl border border-blue-200">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-briefcase text-blue-600 text-xl mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-blue-800">Cam kết việc làm</h4>
                                    <p class="text-sm text-gray-600 mt-1">Nhà trường ký cam kết giới thiệu việc làm cho 100% sinh viên sau khi tốt nghiệp.</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-5 rounded-xl border border-purple-200">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-university text-purple-600 text-xl mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-purple-800">Liên thông Đại học</h4>
                                    <p class="text-sm text-gray-600 mt-1">Được liên thông lên Cao đẳng, Đại học chính quy ngay tại trường.</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-5 rounded-xl border border-orange-200">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-bed text-orange-600 text-xl mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-orange-800">Hỗ trợ nội trú</h4>
                                    <p class="text-sm text-gray-600 mt-1">Có ký túc xá đầy đủ tiện nghi cho học sinh ở xa.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 5. HỒ SƠ ĐĂNG KÝ --}}
                <div class="bg-white rounded-xl shadow-lg border-l-4 border-blue-900 p-8">
                    <h3 class="text-xl font-bold text-blue-900 mb-6 uppercase border-b pb-2">Hồ sơ đăng ký bao gồm</h3>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <li class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                            <i class="fas fa-file-alt text-blue-500 text-xl"></i>
                            <span class="font-medium text-gray-700">01 Phiếu đăng ký (Theo mẫu)</span>
                        </li>
                        <li class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                            <i class="fas fa-book text-blue-500 text-xl"></i>
                            <span class="font-medium text-gray-700">01 Bản sao Học bạ (Công chứng)</span>
                        </li>
                        <li class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                            <i class="fas fa-graduation-cap text-blue-500 text-xl"></i>
                            <span class="font-medium text-gray-700">01 Bằng tốt nghiệp/CNTNTT</span>
                        </li>
                        <li class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                            <i class="fas fa-id-card text-blue-500 text-xl"></i>
                            <span class="font-medium text-gray-700">01 Bản sao CCCD (Công chứng)</span>
                        </li>
                        <li class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                            <i class="fas fa-image text-blue-500 text-xl"></i>
                            <span class="font-medium text-gray-700">04 Ảnh 3x4 (Chụp không quá 6 tháng)</span>
                        </li>
                    </ul>
                </div>

            </div>

            {{-- CỘT PHẢI: SIDEBAR (4 phần) --}}
            <div class="lg:col-span-4 space-y-8">
                
                {{-- FORM ĐĂNG KÝ NHANH --}}
                <div class="bg-blue-900 text-white rounded-2xl p-6 shadow-xl sticky top-24">
                    <h3 class="text-xl font-bold uppercase text-center mb-1 text-yellow-400">Đăng ký trực tuyến</h3>
                    <p class="text-center text-blue-200 text-xs mb-6">Nhận tư vấn miễn phí ngay hôm nay</p>
                    
                    <form action="{{ route('candidate.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="text-xs font-bold uppercase ml-1">Họ và tên</label>
                            <input type="text" name="name" required class="w-full mt-1 p-3 rounded-lg bg-blue-800 border border-blue-700 focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 outline-none text-white placeholder-blue-400" placeholder="Nhập họ tên...">
                        </div>
                        <div>
                            <label class="text-xs font-bold uppercase ml-1">Số điện thoại</label>
                            <input type="tel" name="phone" required pattern="[0-9]{10}" class="w-full mt-1 p-3 rounded-lg bg-blue-800 border border-blue-700 focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 outline-none text-white placeholder-blue-400" placeholder="Nhập số điện thoại...">
                        </div>
                        <div>
                            <label class="text-xs font-bold uppercase ml-1">Ngành quan tâm</label>
                            <select name="major_id" class="w-full mt-1 p-3 rounded-lg bg-blue-800 border border-blue-700 focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 outline-none text-white">
                                <option value="">-- Chọn ngành học --</option>
                                {{-- Nếu có biến $headerMajors thì loop, ko thì hardcode --}}
                                @if(isset($headerMajors))
                                    @foreach($headerMajors as $major)
                                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                                    @endforeach
                                @else
                                    <option value="1">Công nghệ thông tin</option>
                                    <option value="2">Dược sĩ</option>
                                    <option value="3">Hướng dẫn du lịch</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="w-full py-3 bg-gradient-to-r from-yellow-400 to-yellow-600 text-blue-900 font-bold rounded-lg shadow-lg hover:shadow-yellow-500/50 transition transform hover:-translate-y-1 uppercase">
                            Gửi đăng ký ngay
                        </button>
                    </form>
                </div>

                {{-- THÔNG TIN LIÊN HỆ --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <h3 class="font-bold text-gray-800 mb-4 border-b pb-2">Thông tin liên hệ</h3>
                    <ul class="space-y-4 text-sm text-gray-600">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-red-500 mt-1"></i>
                            <span><strong>Trụ sở chính:</strong> Khu phố Phước Đức A, Phường Gia Lộc, TX. Trảng Bàng, Tây Ninh</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-phone-alt text-green-500"></i>
                            <a href="tel:02763533222" class="hover:text-blue-600 font-bold">02763 533 222</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope text-yellow-500"></i>
                            <a href="mailto:tuyensinh@achau.edu.vn" class="hover:text-blue-600">tuyensinh@achau.edu.vn</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fab fa-facebook text-blue-600"></i>
                            <a href="#" class="hover:text-blue-600">fb.com/TrungCapAChau</a>
                        </li>
                    </ul>
                </div>

                {{-- BANNER QUẢNG CÁO NHỎ --}}
                <div class="rounded-2xl overflow-hidden shadow-lg group relative cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="w-full h-auto transition duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-blue-900/80 flex items-center justify-center p-6 text-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <div>
                            <h4 class="text-white font-bold text-lg mb-2">Bạn còn thắc mắc?</h4>
                            <a href="#" class="inline-block bg-yellow-400 text-blue-900 px-4 py-2 rounded-full text-sm font-bold hover:bg-yellow-300">Nhắn tin ngay</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>

@include('components.footer')