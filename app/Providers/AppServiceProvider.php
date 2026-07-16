<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use App\Models\Major;
use App\Models\AdmissionCategory;
use App\Models\Department;
use Illuminate\Support\Facades\App; // Thêm dòng này

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // --- CHỈ TẠO SYMLINK KHI CHẠY Ở MÔI TRƯỜNG PRODUCTION ---
        if (App::environment('production')) {
            if (!file_exists(public_path('storage')) && is_writable(public_path())) {
                @symlink(storage_path('app/public'), public_path('storage'));
            }
        }

        // Tự động ép HTTPS
        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
            URL::forceScheme('https');
            if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
                config(['app.url' => 'https://' . $_SERVER['HTTP_X_FORWARDED_HOST']]);
            }
        }

        // Phần chia sẻ dữ liệu menu
        try {
            if (!App::runningInConsole()) { // Chỉ share data khi không phải lệnh CLI
                View::share('headerMajors', Major::where('is_active', true)->get());
                View::share('admissionMenu', AdmissionCategory::where('is_active', true)->orderBy('sort_order')->get());
                View::share('globalDepartments', Department::where('is_active', true)->get());
            }
        } catch (\Exception $e) {
            View::share('headerMajors', []);
            View::share('admissionMenu', []);
            View::share('globalDepartments', []); 
        }
    }
}
