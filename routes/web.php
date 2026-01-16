<?php

use Illuminate\Support\Facades\Route;

// Import các Controller (Không cần import Model ở đây nữa)
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;      // Controller Tin tức
use App\Http\Controllers\MajorController;     // Controller Ngành học
use App\Http\Controllers\CandidateController; // Controller Đăng ký

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. TRANG CHỦ
// (Logic lấy Slider, Banner, Bài viết mới đã nằm trong HomeController@index)
Route::get('/', [HomeController::class, 'index'])->name('home');


// 2. CÁC TRANG TĨNH (Giới thiệu, Sứ mệnh, Liên hệ...)
Route::get('/gioi-thieu', [PageController::class, 'gioithieu'])->name('page.gioithieu');
Route::get('/su-menh-tam-nhin', [PageController::class, 'sumenh'])->name('page.sumenh');
Route::get('/muc-tieu-giao-duc', [PageController::class, 'muctieu'])->name('page.muctieu');
Route::get('/chung-nhan', [PageController::class, 'chungnhan'])->name('page.chungnhan');
Route::get('/lien-he', [PageController::class, 'lienhe'])->name('page.lienhe');


// 3. MODULE TIN TỨC (Sử dụng PostController chúng ta vừa tạo)
// Trang danh sách tin tức
Route::get('/tin-tuc', [PostController::class, 'index'])->name('news.index');

// Trang chi tiết bài viết 
// (Mình đổi URL thành /tin-tuc/{slug} cho đồng bộ, hoặc bạn giữ /bai-viet/ tùy ý)
Route::get('/tin-tuc/{slug}', [PostController::class, 'detail'])->name('post.detail');


// 4. MODULE NGÀNH ĐÀO TẠO
Route::get('/nganh-dao-tao/{slug}', [MajorController::class, 'detail'])->name('major.detail');


// 5. XỬ LÝ FORM ĐĂNG KÝ (CandidateController)
Route::post('/dang-ky-tu-van', [CandidateController::class, 'store'])->name('candidate.store');