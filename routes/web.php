<?php

use Illuminate\Support\Facades\Route;

// Import các Controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\DepartmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. TRANG CHỦ
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. CÁC TRANG TĨNH
Route::get('/gioi-thieu', [PageController::class, 'gioithieu'])->name('page.gioithieu');
Route::get('/su-menh-tam-nhin', [PageController::class, 'sumenh'])->name('page.sumenh');
Route::get('/muc-tieu-giao-duc', [PageController::class, 'muctieu'])->name('page.muctieu');
Route::get('/chung-nhan', [PageController::class, 'chungnhan'])->name('page.chungnhan');
Route::get('/lien-he', [PageController::class, 'lienhe'])->name('page.lienhe');

// 3. MODULE TIN TỨC
Route::get('/tin-tuc', [PostController::class, 'index'])->name('news.index');
Route::get('/tin-tuc/{slug}', [PostController::class, 'detail'])->name('post.detail');

// 4. MODULE NGÀNH ĐÀO TẠO
Route::get('/nganh-dao-tao/{slug}', [MajorController::class, 'detail'])->name('major.detail');

// 5. XỬ LÝ FORM ĐĂNG KÝ
Route::post('/dang-ky-tu-van', [CandidateController::class, 'store'])->name('candidate.store');

// 6. CÁC TRANG KHÁC (THÊM HEADERMAJORS)
Route::get('/thu-ngo', function () {
    $headerMajors = \App\Models\Major::where('is_active', true)->get();
    return view('pages.thungo', compact('headerMajors'));
})->name('page.thungo');

Route::get('/so-do-to-chuc', function () {
    $headerMajors = \App\Models\Major::where('is_active', true)->get();
    return view('pages.sodotochuc', compact('headerMajors'));
})->name('page.sodotochuc');


// MODULE TUYỂN SINH (DYNAMIC)
Route::prefix('tuyen-sinh')->group(function () {
    // Trang danh sách chung: domain.com/tuyen-sinh
    Route::get('/', [AdmissionController::class, 'index'])->name('admission.index');
    
    // Xem chi tiết: domain.com/tuyen-sinh/bai-viet-abc
    Route::get('/{slug}', [AdmissionController::class, 'detail'])->name('admission.detail');
});
Route::get('/cau-hoi-thuong-gap', [App\Http\Controllers\PageController::class, 'faq'])->name('page.faq');
Route::get('/dang-ky-tu-van', [App\Http\Controllers\PageController::class, 'register'])->name('page.register');
Route::get('/khoa/{slug}', [DepartmentController::class, 'detail'])->name('department.detail.khoa');
Route::get('/phong-ban/{slug}', [DepartmentController::class, 'detail'])->name('department.detail.phongban');