<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->string('image')->nullable()->after('type'); // Ảnh bìa / Ảnh đại diện
            // Đổi description từ text ngắn thành longText để dùng RichEditor
            $table->longText('content')->nullable()->after('description'); // Nội dung giới thiệu chi tiết
            $table->json('contact_info')->nullable()->after('content'); // Số đt, Email, Phòng làm việc (Lưu dạng JSON)
            $table->integer('sort_order')->default(0)->after('is_active'); // Thứ tự sắp xếp trên menu
            
            // --- SEO FIELDS ---
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropColumn(['image', 'content', 'contact_info', 'sort_order', 'seo_title', 'seo_description']);
        });
    }
};