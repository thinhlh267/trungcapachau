<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Major;
use App\Models\AdmissionCategory; // Thêm dòng này để gọi Model

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
            // 1. Share danh sách Ngành đào tạo (headerMajors)
            View::share('headerMajors', Major::where('is_active', true)->get());

            // 2. Share danh mục Tuyển sinh (admissionMenu) - MỚI THÊM
            // Lấy các hệ đào tạo đang hoạt động, sắp xếp theo thứ tự ưu tiên
            $admissionMenu = AdmissionCategory::where('is_active', true)
                                ->orderBy('sort_order')
                                ->get();
            
            View::share('admissionMenu', $admissionMenu);

        } catch (\Exception $e) {
            // Tránh lỗi "Table not found" khi mới clone code về chưa chạy migrate
            // Share mảng rỗng để View không bị lỗi undefined variable
            View::share('headerMajors', []);
            View::share('admissionMenu', []);
        }
    }
}