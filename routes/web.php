<?php

use Illuminate\Support\Facades\Route;

// Import các Controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\CandidateController;

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
Route::get('/thong-bao-tuyen-sinh', function () {
    // Lấy danh sách ngành để đổ vào select box trong form
    $headerMajors = \App\Models\Major::where('is_active', true)->get();
    return view('pages.tuyensinh_thongbao', compact('headerMajors'));
})->name('page.tuyensinh.thongbao');