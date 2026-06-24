<?php

namespace App\Observers;

use App\Models\Major;
use Illuminate\Support\Facades\Storage;

class MajorObserver
{
    // Danh sách các cột chứa 1 ảnh trong bảng majors
    private $imageFields = [
        'image', 'intro_image', 'why_us_image', 
        'career_titles_image', 'career_places_image'
    ];

    public function updated(Major $major): void
    {
        // 1. Quét các trường 1 ảnh
        foreach ($this->imageFields as $field) {
            // Nếu trường này bị thay đổi nội dung (có ảnh mới up lên)
            if ($major->isDirty($field)) {
                $oldImage = $major->getOriginal($field); // Lấy đường dẫn ảnh cũ
                if (!empty($oldImage) && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage); // Xóa khỏi ổ cứng
                }
            }
        }

        // 2. Quét mảng Gallery (3 ảnh định nghĩa)
        if ($major->isDirty('gallery')) {
            $this->deleteArrayDiffImages(
                $major->getOriginal('gallery'), 
                $major->gallery
            );
        }

        // 3. Quét ảnh trong Lộ trình (Roadmap)
        if ($major->isDirty('roadmap')) {
            $oldRoadmap = is_string($major->getOriginal('roadmap')) ? json_decode($major->getOriginal('roadmap'), true) : ($major->getOriginal('roadmap') ?? []);
            $newRoadmap = is_array($major->roadmap) ? $major->roadmap : [];

            // Rút trích đường dẫn ảnh từ các bước lộ trình
            $oldImages = collect($oldRoadmap)->pluck('image')->filter()->toArray();
            $newImages = collect($newRoadmap)->pluck('image')->filter()->toArray();

            $this->deleteArrayDiffImages($oldImages, $newImages);
        }
    }

    /**
     * SỰ KIỆN 2: KHI ADMIN BẤM NÚT "XÓA" BÀI VIẾT ĐÓ LUÔN
     */
    public function deleted(Major $major): void
    {
        // 1. Xóa toàn bộ trường 1 ảnh
        foreach ($this->imageFields as $field) {
            if (!empty($major->$field) && Storage::disk('public')->exists($major->$field)) {
                Storage::disk('public')->delete($major->$field);
            }
        }

        // 2. Xóa toàn bộ Gallery
        if (is_array($major->gallery)) {
            foreach ($major->gallery as $image) {
                if (!empty($image) && Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        // 3. Xóa toàn bộ ảnh trong Roadmap
        if (is_array($major->roadmap)) {
            $images = collect($major->roadmap)->pluck('image')->filter()->toArray();
            foreach ($images as $image) {
                if (!empty($image) && Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }
    }

    /**
     * Hàm hỗ trợ: So sánh mảng cũ và mới để tìm ra ảnh bị xóa
     */
    private function deleteArrayDiffImages($oldArray, $newArray)
    {
        $old = is_string($oldArray) ? json_decode($oldArray, true) : ($oldArray ?? []);
        $new = is_array($newArray) ? $newArray : [];

        $old = is_array($old) ? $old : [];
        $new = is_array($new) ? $new : [];

        // Tìm các ảnh có trong mảng CŨ nhưng không có trong mảng MỚI
        $deletedImages = array_diff($old, $new);
        
        foreach ($deletedImages as $image) {
            if (!empty($image) && Storage::disk('public')->exists($image)) {
                Storage::disk('public')->delete($image);
            }
        }
    }
}