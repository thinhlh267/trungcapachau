<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // DỌN SẠCH CÁC BẢNG BỊ KỆT NẾU CÓ
        Schema::dropIfExists('failed_import_rows'); // Sửa ở đây
        Schema::dropIfExists('imports');
        Schema::dropIfExists('exports');

        // 1. BẢNG QUẢN LÝ XUẤT DỮ LIỆU (EXPORTS)
        Schema::create('exports', function (Blueprint $table) {
            $table->id();
            $table->timestamp('completed_at')->nullable();
            $table->string('file_disk'); // Bảng Export dùng file_disk
            $table->string('file_name')->nullable();
            $table->string('exporter');
            $table->unsignedInteger('processed_rows')->default(0);
            $table->unsignedInteger('total_rows')->default(0);
            $table->unsignedInteger('successful_rows')->default(0);
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });

        // 2. BẢNG QUẢN LÝ NHẬP DỮ LIỆU (IMPORTS)
        Schema::create('imports', function (Blueprint $table) {
            $table->id();
            $table->timestamp('completed_at')->nullable();
            $table->string('file_path'); // BẢNG IMPORT PHẢI DÙNG FILE_PATH
            $table->string('file_name');
            $table->string('importer');
            $table->unsignedInteger('processed_rows')->default(0);
            $table->unsignedInteger('total_rows')->default(0);
            $table->unsignedInteger('successful_rows')->default(0);
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });

        // 3. BẢNG LƯU CÁC DÒNG BỊ LỖI KHI NHẬP
        Schema::create('failed_import_rows', function (Blueprint $table) { // Sửa ở đây
            $table->id();
            $table->foreignId('import_id')->constrained('imports')->cascadeOnDelete();
            $table->json('data');
            $table->text('validation_error')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('failed_import_rows'); // Sửa ở đây
        Schema::dropIfExists('imports');
        Schema::dropIfExists('exports');
    }
};