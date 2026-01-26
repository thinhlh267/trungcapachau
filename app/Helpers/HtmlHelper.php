<?php

namespace App\Helpers;

use Mews\Purifier\Facades\Purifier;

class HtmlHelper
{
    /**
     * Clean HTML với cấu hình mặc định (an toàn nhất)
     */
    public static function clean($html)
    {
        if (empty($html) || !is_string($html)) {
            return $html;
        }
        
        return Purifier::clean($html, 'default');
    }
    
    /**
     * Clean HTML nhưng giữ định dạng cơ bản
     * Dùng cho description, intro text
     */
    public static function safe($html)
    {
        if (empty($html) || !is_string($html)) {
            return $html;
        }
        
        return Purifier::clean($html, 'safe');
    }
    
    /**
     * Clean HTML giữ nhiều định dạng
     * Dùng cho bài viết chi tiết
     */
    public static function rich($html)
    {
        if (empty($html) || !is_string($html)) {
            return $html;
        }
        
        return Purifier::clean($html, 'rich');
    }
    
    /**
     * Strip tags hoàn toàn, chỉ giữ text
     */
    public static function plain($html)
    {
        if (empty($html) || !is_string($html)) {
            return $html;
        }
        
        $cleaned = strip_tags($html);
        return htmlspecialchars($cleaned, ENT_QUOTES, 'UTF-8');
    }
}