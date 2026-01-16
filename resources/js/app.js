import './bootstrap';
import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';

// Đăng ký plugin trước khi khởi chạy Alpine
Alpine.plugin(intersect);

window.Alpine = Alpine;
Alpine.start();
document.addEventListener('alpine:init', () => {
    Alpine.store('counters', {
        started: false,
        startCounting() {
            if (!this.started) {
                this.started = true;
                // Logic counter sẽ chạy khi section visible
            }
        }
    });
});