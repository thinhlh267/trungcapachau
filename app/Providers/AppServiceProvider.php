<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Major;
use App\Models\AdmissionCategory;
use App\Models\Department; // 1. Thêm dòng này để gọi Model Department

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

            // 2. Share danh mục Tuyển sinh (admissionMenu)
            $admissionMenu = AdmissionCategory::where('is_active', true)
                                            ->orderBy('sort_order')
                                            ->get();
            View::share('admissionMenu', $admissionMenu);

            // 3. Share danh sách Khoa - Phòng ban (globalDepartments) - MỚI THÊM
            // Lấy tất cả các khoa/phòng đang hoạt động để hiển thị lên Menu
            $globalDepartments = Department::where('is_active', true)->get();
            View::share('globalDepartments', $globalDepartments);

        } catch (\Exception $e) {
            // Tránh lỗi "Table not found" khi mới clone code về chưa chạy migrate
            // Share mảng rỗng để View không bị lỗi undefined variable
            View::share('headerMajors', []);
            View::share('admissionMenu', []);
            View::share('globalDepartments', []); // Fallback rỗng cho Departments
        }
        
    }
}