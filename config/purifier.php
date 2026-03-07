<?php

return [
    'encoding'      => 'UTF-8',
    'finalize'      => true,
    'cachePath'     => storage_path('app/purifier'),
    'cacheFileMode' => 0755,
    
    'settings'      => [
        'default' => [
            'HTML.Doctype'             => 'HTML 4.01 Transitional',
            'HTML.Allowed'             => 'h1,h2,h3,h4,h5,h6,p,br,b,strong,i,em,u,ul,ol,li,blockquote,code,pre,hr,span,div,a[href|title|target],img[src|alt|title|width|height],table,thead,tbody,tr,th,td',
            'CSS.AllowedProperties'    => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align,float,margin',
            'AutoFormat.AutoParagraph' => true,
            'AutoFormat.RemoveEmpty'   => true,
            'Attr.AllowedFrameTargets' => ['_blank'],
        ],
        
        'safe' => [
            'HTML.Doctype'             => 'HTML 4.01 Transitional',
            'HTML.Allowed'             => 'p,br,b,strong,i,em,u,ul,ol,li,blockquote',
            'CSS.AllowedProperties'    => '',
            'AutoFormat.AutoParagraph' => true,
            'AutoFormat.RemoveEmpty'   => true,
        ],
        
        'rich' => [
    'HTML.Doctype'             => 'HTML 4.01 Transitional',
    
    // ĐÃ SỬA: Thêm [style] vào span, p, div, h1-h6, ul, li... để nhận màu sắc và căn lề. 
    // Thêm các thuộc tính cho table để lỡ admin kẻ bảng thì vẫn hiện viền.
    'HTML.Allowed'             => 'h1[style],h2[style],h3[style],h4[style],h5[style],h6[style],p[style],br,b,strong,i,em,u,ul[style],ol[style],li[style],blockquote,code,pre,hr,span[style],div[style],a[href|title|target|style],img[src|alt|title|width|height|style],table[border|cellpadding|cellspacing|style|width],thead,tbody,tr[style],th[style],td[style|colspan|rowspan]',
    
    // ĐÃ BỔ SUNG: margin, border, width, height để lỡ TinyMCE có chèn vào thì không bị lỗi
    'CSS.AllowedProperties'    => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align,width,height,border,margin',
    
    'AutoFormat.AutoParagraph' => true,
    'AutoFormat.RemoveEmpty'   => true,
    'Attr.AllowedFrameTargets' => ['_blank'],
],
    ],
];