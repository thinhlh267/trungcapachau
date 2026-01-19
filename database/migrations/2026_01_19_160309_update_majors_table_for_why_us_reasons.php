<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('majors', function (Blueprint $table) {
            // 1. Thêm column mới cho JSON reasons
            $table->json('why_us_reasons')->nullable()->after('why_us_image');
            
            // 2. Xóa column cũ (optional - có thể comment nếu muốn backup)
            $table->dropColumn('why_us_content');
            
            // Hoặc nếu muốn rename để backup trước:
            // $table->renameColumn('why_us_content', 'why_us_content_backup');
        });
    }

    public function down(): void
    {
        Schema::table('majors', function (Blueprint $table) {
            // Khôi phục lại nếu rollback
            $table->text('why_us_content')->nullable();
            $table->dropColumn('why_us_reasons');
        });
    }
};