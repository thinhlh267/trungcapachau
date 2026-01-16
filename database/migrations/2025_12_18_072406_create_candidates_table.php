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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');             // Tên thí sinh
            $table->string('phone');            // Số điện thoại (Quan trọng nhất)
            $table->string('email')->nullable();
            $table->foreignId('major_id')->nullable()->constrained('majors')->nullOnDelete(); // Đăng ký ngành nào?
            $table->text('message')->nullable(); // Lời nhắn
            $table->string('status')->default('new'); // Trạng thái: new (mới), contacted (đã gọi), enrolled (đã nhập học)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
