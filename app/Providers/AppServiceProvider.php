<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Major;
use App\Models\AdmissionCategory;
use App\Models\Department; 
class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }


public function boot(): void
{
    // Tự động ép HTTPS và nhận diện APP_URL động khi chạy qua Cloudflare Tunnel
    if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
        \Illuminate\Support\Facades\URL::forceScheme('https');
        
        // Tự động cấu hình lại APP_URL khớp với link Cloudflare đang chạy
        if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
            config(['app.url' => 'https://' . $_SERVER['HTTP_X_FORWARDED_HOST']]);
        }
    }

    // Phần chia sẻ dữ liệu menu của bác giữ nguyên
    try {
        \Illuminate\Support\Facades\View::share('headerMajors', \App\Models\Major::where('is_active', true)->get());
        
        $admissionMenu = \App\Models\AdmissionCategory::where('is_active', true)
                                        ->orderBy('sort_order')
                                        ->get();
        \Illuminate\Support\Facades\View::share('admissionMenu', $admissionMenu);

        $globalDepartments = \App\Models\Department::where('is_active', true)->get();
        \Illuminate\Support\Facades\View::share('globalDepartments', $globalDepartments);

    } catch (\Exception $e) {
        \Illuminate\Support\Facades\View::share('headerMajors', []);
        \Illuminate\Support\Facades\View::share('admissionMenu', []);
        \Illuminate\Support\Facades\View::share('globalDepartments', []); 
    }
}
}