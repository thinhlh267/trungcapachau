<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // 1. Thêm cột chú thích cho ảnh đại diện (Thumbnail)
            $table->string('image_caption')->nullable()->after('image'); 
            
            // 2. Xóa cột content cũ (kiểu text) để tạo lại cột content mới (kiểu json)
            // Lưu ý: Dữ liệu bài viết cũ sẽ bị mất, bạn chịu khó nhập lại nhé (vì đang test)
            $table->dropColumn('content');
        });
        
        Schema::table('posts', function (Blueprint $table) {
            $table->json('content')->nullable()->after('slug'); // Tạo lại cột content dạng JSON
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
};
