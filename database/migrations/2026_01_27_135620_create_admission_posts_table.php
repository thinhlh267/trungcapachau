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
    Schema::create('admission_posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('slug')->unique();
        $table->string('image')->nullable(); // Ảnh đại diện bài viết
        $table->text('description')->nullable(); // Mô tả ngắn
        $table->longText('content')->nullable(); // Nội dung chi tiết
        // Liên kết với danh mục hệ đào tạo
        $table->foreignId('admission_category_id')->constrained()->onDelete('cascade');
        $table->boolean('is_published')->default(true);
        $table->integer('view_count')->default(0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_posts');
    }
};
