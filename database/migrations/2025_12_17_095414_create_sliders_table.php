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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();       // Tiêu đề lớn (Có thể để trống)
            $table->text('description')->nullable();   // Mô tả nhỏ bên dưới
            $table->string('image');                   // Ảnh banner (Bắt buộc)
            $table->boolean('is_active')->default(true); // Trạng thái hiển thị
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
