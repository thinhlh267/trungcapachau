/**
 * assets/js/main.js
 * Tập hợp toàn bộ logic Javascript của website
 */

document.addEventListener("DOMContentLoaded", function() {

    // ==========================================
    // 1. KHỞI TẠO AOS (Animate On Scroll)
    // ==========================================
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            once: true,
            offset: 100,
            easing: 'ease-in-out'
        });
    }

    // ==========================================
    // 2. KHỞI TẠO SWIPER (Hero Slider)
    // ==========================================
    if (document.querySelector(".mySwiper")) {
        const swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            effect: "fade",
            fadeEffect: {
                crossFade: true
            },
            speed: 1000
        });
    }

    // ==========================================
    // 3. LOGIC BỘ LỌC TIN TỨC (News Filter)
    // ==========================================
    const filterButtons = document.querySelectorAll('.filter-btn');
    const newsItems = document.querySelectorAll('#news-container article'); // Chọn đúng thẻ article

    if (filterButtons.length > 0 && newsItems.length > 0) {
        filterButtons.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();

                // 1. Xử lý giao diện nút bấm (Active/Inactive)
                filterButtons.forEach(button => {
                    button.classList.remove('bg-blue-600', 'text-white', 'active');
                    button.classList.add('bg-gray-100', 'text-blue-800');
                });

                // Kích hoạt nút đang bấm
                this.classList.remove('bg-gray-100', 'text-blue-800');
                this.classList.add('bg-blue-600', 'text-white', 'active');

                // 2. Xử lý ẩn/hiện bài viết
                const category = this.getAttribute('data-category');

                newsItems.forEach(item => {
                    // Reset hiệu ứng để chuẩn bị chuyển cảnh
                    item.style.transition = 'all 0.3s ease';
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.95)';
                    
                    setTimeout(() => {
                        // Logic kiểm tra danh mục
                        const itemCategory = item.getAttribute('data-category');
                        const shouldShow = (category === 'tatca' || itemCategory === category);

                        if (shouldShow) {
                            item.classList.remove('hidden'); // Gỡ class hidden của Tailwind
                            item.style.display = 'flex'; // Đảm bảo hiển thị dạng flex (do thiết kế card là flex-col)
                            
                            // Hiệu ứng hiện dần
                            setTimeout(() => {
                                item.style.opacity = '1';
                                item.style.transform = 'scale(1)';
                            }, 50);
                        } else {
                            item.classList.add('hidden'); // Thêm class hidden để ẩn khỏi luồng Grid
                            item.style.display = 'none';
                        }
                    }, 300); // Chờ 300ms cho hiệu ứng mờ kết thúc rồi mới ẩn/hiện
                });
            });
        });
    }

    // ==========================================
    // 4. LOGIC FAQ (Câu hỏi thường gặp)
    // ==========================================
    const faqItems = document.querySelectorAll('.faq-item');
    if (faqItems.length > 0) {
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            if(question){
                question.addEventListener('click', () => {
                    // Đóng tất cả các item khác
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                        }
                    });
                    // Toggle item hiện tại
                    item.classList.toggle('active');
                });
            }
        });
    }

    // ==========================================
    // 5. LOGIC MOBILE MENU (Đã đưa vào trong DOMContentLoaded)
    // ==========================================
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileOverlay = document.getElementById('mobile-menu-overlay');
    const mobileContent = document.getElementById('mobile-menu-content');
    const closeMobileBtn = document.getElementById('close-mobile-menu');

    if (mobileBtn && mobileOverlay && mobileContent && closeMobileBtn) {
        
        function openMenu() {
            mobileOverlay.classList.remove('hidden');
            setTimeout(() => {
                mobileOverlay.classList.remove('opacity-0');
                mobileContent.classList.remove('translate-x-full');
            }, 10);
        }

        function closeMenu() {
            mobileOverlay.classList.add('opacity-0');
            mobileContent.classList.add('translate-x-full');
            setTimeout(() => {
                mobileOverlay.classList.add('hidden');
            }, 300);
        }

        mobileBtn.addEventListener('click', openMenu);
        closeMobileBtn.addEventListener('click', closeMenu);

        mobileOverlay.addEventListener('click', function(e) {
            if (e.target === mobileOverlay) {
                closeMenu();
            }
        });
    }

}); // Kết thúc DOMContentLoaded