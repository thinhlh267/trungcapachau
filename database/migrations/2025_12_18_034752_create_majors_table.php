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
        Schema::create('majors', function (Blueprint $table) {
            $table->id();
            $table->string('name');             // Tên ngành (VD: Tin học ứng dụng)
            $table->string('slug')->unique();   // Đường dẫn (tin-hoc-ung-dung)
            $table->string('image')->nullable();// Ảnh đại diện ngành
            $table->text('description')->nullable(); // Mô tả ngắn
            $table->longText('content')->nullable(); // Chi tiết chương trình học
            $table->string('duration')->default('2 năm'); // Thời gian đào tạo
            $table->string('tuition')->nullable(); // Học phí (VD: 5.000.000đ/kỳ)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('majors');
    }
};
