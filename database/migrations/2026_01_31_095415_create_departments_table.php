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
    Schema::create('departments', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Tên Khoa/Phòng
        $table->string('slug')->unique(); // Đường dẫn
        $table->string('type')->default('khoa'); // Phân loại: 'khoa' hoặc 'phong_ban'
        $table->text('description')->nullable(); // Mô tả ngắn
        $table->boolean('is_active')->default(true); // Hiển thị
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
