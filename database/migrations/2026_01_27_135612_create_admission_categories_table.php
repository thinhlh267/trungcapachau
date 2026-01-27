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
    Schema::create('admission_categories', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Tên hệ: Trung cấp, Đại học...
        $table->string('slug')->unique(); // Slug: trung-cap, dai-hoc
        $table->text('description')->nullable();
        $table->boolean('is_active')->default(true);
        $table->integer('sort_order')->default(0); // Để sắp xếp thứ tự hiển thị trên menu
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_categories');
    }
};
