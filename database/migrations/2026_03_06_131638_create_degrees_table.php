<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            
            // 1. Thông tin học sinh
            $table->string('student_name'); // Họ tên thí sinh
            $table->date('date_of_birth'); // Ngày tháng năm sinh
            $table->string('address')->nullable(); // Địa chỉ (Có thể bỏ trống)
            
            // 2. Thông tin khóa học & Văn bằng
            $table->string('cohort'); // Khóa học (VD: K10, 2021-2023)
            $table->string('major'); // Ngành nghề đào tạo
            $table->string('degree_code')->unique(); // Mã văn bằng (BẮT BUỘC PHẢI DUY NHẤT để tra cứu)
            $table->string('issuing_body'); // Đơn vị cấp (VD: Trường Trung cấp Á Châu)
            
            // 3. Thông tin bổ sung (Làm cho hệ thống xịn hơn)
            $table->date('issue_date')->nullable(); // Ngày cấp
            $table->string('classification')->nullable(); // Xếp loại (Giỏi, Khá...)
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('degrees');
    }
};