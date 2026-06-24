<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('majors', function (Blueprint $table) {
            // 1. Các trường hình ảnh bổ sung
            $table->string('intro_image')->nullable()->after('image');
            $table->string('why_us_image')->nullable();
            $table->string('career_titles_image')->nullable();
            $table->string('career_places_image')->nullable();
            
            // 2. Các trường nội dung Rich Text
            $table->longText('overview')->nullable();
            $table->longText('career_titles')->nullable();
            $table->longText('career_places')->nullable();
            $table->longText('benefits')->nullable();
            
            // 3. Các trường mảng (JSON)
            $table->json('gallery')->nullable();
            $table->json('roadmap')->nullable();
            $table->json('program_advantages')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('majors', function (Blueprint $table) {
            $table->dropColumn([
                'intro_image', 
                'why_us_image', 
                'career_titles_image', 
                'career_places_image',
                'overview', 
                'career_titles', 
                'career_places', 
                'benefits',
                'gallery', 
                'roadmap', 
                'program_advantages'
            ]);
        });
    }
};