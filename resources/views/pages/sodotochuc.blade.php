@include('components.header')

{{-- 1. BANNER HEADER --}}
<div class="relative w-full h-[250px] md:h-[350px] overflow-hidden">
    <div class="absolute inset-0 bg-blue-900">
        <div class="absolute inset-0 opacity-20" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-blue-900 via-blue-900/60 to-transparent"></div>
    </div>
    <div class="relative z-10 h-full max-w-7xl mx-auto px-4 flex flex-col justify-center items-center text-center text-white">
        <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 px-5 py-1.5 rounded-full backdrop-blur-md mb-4">
            <i class="fas fa-sitemap text-yellow-400"></i>
            <span class="text-yellow-100 font-bold uppercase text-xs tracking-widest">Hệ thống quản trị</span>
        </div>
        <h1 class="text-3xl md:text-5xl font-black font-bevietnam leading-tight mb-2">
            SƠ ĐỒ TỔ CHỨC
        </h1>
    </div>
</div>

{{-- 2. MAIN CONTENT --}}
<main class="font-bevietnam bg-slate-50 py-16 relative overflow-hidden">
    
    <div class="max-w-full mx-auto px-4 relative z-10">
        
        {{-- CHART CONTAINER --}}
        <div class="overflow-x-auto overflow-y-hidden text-center pb-10">
            
            {{-- CHART WRAPPER --}}
            <div class="inline-block min-w-max p-4">
                
                <div class="org-tree">
                    <ul>
                        {{-- LEVEL 1: CHI BỘ --}}
                        <li>
                            <div class="org-node node-party">
                                <div class="node-icon"><i class="fas fa-star"></i></div>
                                <div class="node-content">
                                    <div class="node-title">Chi bộ nhà trường</div>
                                </div>
                            </div>

                            {{-- LEVEL 2: HỘI ĐỒNG QUẢN TRỊ --}}
                            <ul>
                                <li>
                                    <div class="org-node node-board">
                                        <div class="node-icon"><i class="fas fa-users-cog"></i></div>
                                        <div class="node-content">
                                            <div class="node-title">Hội đồng quản trị</div>
                                        </div>
                                    </div>

                                    {{-- LEVEL 3: BAN GIÁM HIỆU & CÁC HỘI ĐỒNG --}}
                                    <ul>
                                        {{-- Nhánh Trái: Tổ chức đoàn thể --}}
                                        <li class="align-top pt-12">
                                            <div class="org-node node-dept">
                                                <div class="node-title text-sm">Các tổ chức CTXH</div>
                                                <div class="node-desc text-[11px]">(Công đoàn, Đoàn TN...)</div>
                                            </div>
                                        </li>

                                        {{-- Nhánh Giữa: BGH --}}
                                        <li>
                                            <div class="org-node node-bgh shadow-xl ring-4 ring-yellow-50 mb-10">
                                                <div class="node-icon"><i class="fas fa-user-tie"></i></div>
                                                <div class="node-content">
                                                    <div class="node-title text-lg uppercase">Ban Giám Hiệu</div>
                                                </div>
                                            </div>

                                            {{-- LEVEL 4: PHÒNG & KHOA (Layout COMPACT) --}}
                                            <ul>
                                                {{-- NHÁNH 1: CÁC PHÒNG CHỨC NĂNG --}}
                                                <li class="group-branch branch-wide">
                                                    <div class="org-group-label bg-blue-100 text-blue-800 border-blue-200">
                                                        KHỐI PHÒNG BAN
                                                    </div>
                                                    {{-- Danh sách dọc --}}
                                                    <div class="vertical-list">
                                                        <div class="org-node node-basic">
                                                            Phòng Tuyển sinh, Hợp tác và Dịch vụ việc làm
                                                        </div>
                                                        <div class="org-node node-basic">
                                                            Phòng Tổ chức - Hành chính - Kế toán
                                                        </div>
                                                        <div class="org-node node-basic">
                                                            Phòng Đào tạo và Công tác HSSV
                                                        </div>
                                                        <div class="org-node node-basic">
                                                            Phòng Khảo thí & Đảm bảo chất lượng
                                                        </div>
                                                    </div>
                                                </li>

                                                {{-- NHÁNH 2: CÁC KHOA CHUYÊN MÔN --}}
                                                <li class="group-branch branch-wide">
                                                    <div class="org-group-label bg-yellow-100 text-yellow-800 border-yellow-200">
                                                        KHỐI KHOA ĐÀO TẠO
                                                    </div>
                                                    {{-- Danh sách dọc --}}
                                                    <div class="vertical-list">
                                                        <div class="org-node node-khoa">Khoa Kỹ thuật Công nghệ</div>
                                                        <div class="org-node node-khoa">Khoa Kinh tế Dịch vụ</div>
                                                        <div class="org-node node-khoa">Khoa Y Dược</div>
                                                        <div class="org-node node-khoa">Khoa Cơ bản</div>
                                                    </div>
                                                </li>
                                            </ul>
                                            
                                            {{-- LEVEL 5: SINH VIÊN (Foundation Style) --}}
                                            <div class="connector-down h-12"></div>
                                            
                                            <div class="relative z-10 mt-2">
                                                <div class="absolute inset-0 bg-green-500 blur-xl opacity-20 rounded-full"></div>
                                                <div class="org-node-foundation">
                                                    <div class="flex items-center gap-4">
                                                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                                            <i class="fas fa-user-graduate text-2xl text-white"></i>
                                                        </div>
                                                        <div class="text-left">
                                                            <h3 class="uppercase font-black text-xl text-white tracking-wide">Các lớp Học sinh, Sinh viên</h3>
                                                            <p class="text-green-100 text-xs font-medium">Trung tâm của mọi hoạt động giáo dục</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>

                                        {{-- Nhánh Phải: Hội đồng tư vấn --}}
                                        <li class="align-top pt-12">
                                            <div class="org-node node-dept">
                                                <div class="node-title text-sm">Các Hội đồng tư vấn</div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

{{-- STYLES CSS --}}
<style>
    /* --- Tree CSS Base --- */
    .org-tree ul {
        padding-top: 20px; position: relative;
        display: flex; justify-content: center;
    }
    .org-tree li {
        float: left; text-align: center;
        list-style-type: none;
        position: relative;
        padding: 20px 10px 0 10px;
    }

    /* QUAN TRỌNG: Tăng khoảng cách vì các ô giờ to hơn */
    .branch-wide {
        padding-left: 80px !important;
        padding-right: 80px !important;
    }

    /* Lines connecting nodes */
    .org-tree li::before, .org-tree li::after {
        content: ''; position: absolute; top: 0; right: 50%;
        border-top: 2px solid #cbd5e1; width: 50%; height: 20px;
    }
    .org-tree li::after { right: auto; left: 50%; border-left: 2px solid #cbd5e1; }
    
    .org-tree li:only-child::after, .org-tree li:only-child::before { display: none; }
    .org-tree li:only-child { padding-top: 0; }
    .org-tree li:first-child::before, .org-tree li:last-child::after { border: 0 none; }
    
    .org-tree li:last-child::before { 
        border-right: 2px solid #cbd5e1; border-radius: 0 15px 0 0; 
    }
    .org-tree li:first-child::after { 
        border-radius: 15px 0 0 0; 
    }
    .org-tree ul ul::before {
        content: ''; position: absolute; top: 0; left: 50%;
        border-left: 2px solid #cbd5e1; width: 0; height: 20px;
    }

    /* NODE STYLES */
    .org-node {
        display: inline-flex; flex-direction: column; align-items: center; justify-content: center;
        padding: 12px 16px; text-decoration: none; border-radius: 10px;
        transition: all 0.3s; position: relative; z-index: 10;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        background: white;
        
        /* Mặc định cho các ô nhỏ */
        width: 200px;
        min-height: 60px;
    }
    .org-node:hover { transform: translateY(-3px); box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }

    .node-title { font-weight: 700; line-height: 1.4; font-size: 14px; }
    .node-desc { font-size: 11px; opacity: 0.8; margin-top: 2px; }

    /* Node types colors */
    .node-party { background: #dc2626; color: white; border: 1px solid #b91c1c; box-shadow: 0 4px 6px rgba(220, 38, 38, 0.3); }
    .node-party .node-icon { color: #fcd34d; font-size: 18px; margin-bottom: 4px; }
    
    .node-board { background: #1e3a8a; color: white; border: 1px solid #172554; box-shadow: 0 4px 6px rgba(30, 58, 138, 0.3); }
    .node-board .node-icon { color: #facc15; font-size: 18px; margin-bottom: 4px; }

    .node-bgh { background: #f59e0b; color: #1e3a8a; border: 1px solid #d97706; padding: 20px; width: 240px; }
    .node-bgh .node-icon { color: #1e3a8a; font-size: 24px; margin-bottom: 4px; }

    .node-dept { border: 1px solid #e2e8f0; color: #475569; border-top: 4px solid #64748b; width: 180px; }

    /* VERTICAL LIST STYLE */
    .vertical-list {
        display: flex; flex-direction: column; gap: 12px; align-items: center;
        position: relative; padding-top: 15px;
    }
    .vertical-list::before {
        content: ''; position: absolute; top: 0; left: 50%;
        width: 2px; height: 100%; background: #cbd5e1; z-index: 0;
    }
    
    /* STYLE CHO PHÒNG & KHOA (RỘNG HƠN - 1 HÀNG - CĂN GIỮA) */
    .node-basic, .node-khoa {
        width: 400px; /* Tăng độ rộng để chứa tên dài */
        padding: 12px 20px;
        font-size: 14px;
        font-weight: 700;
        z-index: 1;
        
        /* Căn giữa & Không xuống dòng */
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap; /* Bắt buộc 1 dòng */
    }

    .node-basic { border-left: 6px solid #3b82f6; color: #1e40af; }
    .node-khoa { border-left: 6px solid #f59e0b; color: #92400e; }

    .org-group-label {
        display: inline-block; padding: 8px 20px; margin-bottom: 5px;
        border-radius: 30px; font-size: 12px; font-weight: 800; text-transform: uppercase;
        border: 1px solid transparent; z-index: 10; position: relative;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    /* STUDENT NODE FOUNDATION STYLE */
    .org-node-foundation {
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        padding: 20px 40px;
        border-radius: 16px;
        box-shadow: 0 10px 25px -5px rgba(16, 185, 129, 0.4);
        color: white;
        min-width: 400px; /* To bằng các ô ở trên */
        border: 4px solid #fff;
        position: relative;
        transition: transform 0.3s;
    }
    .org-node-foundation:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 30px -5px rgba(16, 185, 129, 0.5);
    }

    .connector-down {
        height: 40px; width: 2px; background: #cbd5e1; margin: 0 auto;
    }
</style>

@include('components.footer')