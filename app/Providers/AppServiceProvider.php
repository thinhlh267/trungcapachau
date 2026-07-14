<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use App\Models\Major;
use App\Models\AdmissionCategory;
use App\Models\Department;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // --- ĐOẠN XỬ LÝ TẠO LINK STORAGE CHO CLOUD ---
        if (!file_exists(public_path('storage'))) {
            @symlink(storage_path('app/public'), public_path('storage'));
        }

        // Tự động ép HTTPS và nhận diện APP_URL động khi chạy qua Cloudflare Tunnel
        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
            URL::forceScheme('https');
            
            // Tự động cấu hình lại APP_URL khớp với link Cloudflare đang chạy
            if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
                config(['app.url' => 'https://' . $_SERVER['HTTP_X_FORWARDED_HOST']]);
            }
        }

        // Phần chia sẻ dữ liệu menu của bác giữ nguyên
        try {
            View::share('headerMajors', Major::where('is_active', true)->get());
            
            $admissionMenu = AdmissionCategory::where('is_active', true)
                                              ->orderBy('sort_order')
                                              ->get();
            View::share('admissionMenu', $admissionMenu);

            $globalDepartments = Department::where('is_active', true)->get();
            View::share('globalDepartments', $globalDepartments);

        } catch (\Exception $e) {
            View::share('headerMajors', []);
            View::share('admissionMenu', []);
            View::share('globalDepartments', []); 
        }
    }
}