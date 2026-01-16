<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Major;

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
        try {
            // SỬA TÊN BIẾN THÀNH 'headerMajors' ĐỂ KHỚP VỚI GIAO DIỆN
            View::share('headerMajors', Major::where('is_active', true)->get());
        } catch (\Exception $e) {
            // Tránh lỗi khi chưa chạy migrate
        }
    }
}