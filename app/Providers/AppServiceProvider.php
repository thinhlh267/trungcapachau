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
        // --- CHỈ TẠO SYMLINK KHI CHẠY Ở PRODUCTION ---
        if (\Illuminate\Support\Facades\App::environment('production')) {
            if (!file_exists(public_path('storage'))) {
                @symlink(storage_path('app/public'), public_path('storage'));
            }
        }

        // Tự động ép HTTPS và nhận diện APP_URL động khi chạy qua Cloudflare Tunnel
        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
            URL::forceScheme('https');
            
            if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
                config(['app.url' => 'https://' . $_SERVER['HTTP_X_FORWARDED_HOST']]);
            }
            
            // ÉP LIVEWIRE CHẠY ĐÚNG ĐƯỜNG DẪN HTTPS
            if (class_exists(\Livewire\Livewire::class)) {
                \Livewire\Livewire::setUpdateRoute(function ($handle) {
                    return Route::post('/livewire/update', $handle)->middleware('web');
                });
            }
        }

        // Phần chia sẻ dữ liệu menu của bác giữ nguyên
        try {
            if (!\Illuminate\Support\Facades\App::runningInConsole()) {
                View::share('headerMajors', Major::where('is_active', true)->get());
                
                $admissionMenu = AdmissionCategory::where('is_active', true)
                                                  ->orderBy('sort_order')
                                                  ->get();
                View::share('admissionMenu', $admissionMenu);

                $globalDepartments = Department::where('is_active', true)->get();
                View::share('globalDepartments', $globalDepartments);
            }
        } catch (\Exception $e) {
            View::share('headerMajors', []);
            View::share('admissionMenu', []);
            View::share('globalDepartments', []); 
        }
    }
}
