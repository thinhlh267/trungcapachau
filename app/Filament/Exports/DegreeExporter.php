<?php

namespace App\Filament\Exports;

use App\Models\Degree;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class DegreeExporter extends Exporter
{
    protected static ?string $model = Degree::class;

    public static function getColumns(): array
    {
        return [
            // Khai báo các cột sẽ xuất ra file CSV
            ExportColumn::make('degree_code')->label('Số hiệu / Mã văn bằng'),
            ExportColumn::make('student_name')->label('Họ tên Thí sinh'),
            ExportColumn::make('date_of_birth')->label('Ngày sinh'),
            ExportColumn::make('major')->label('Ngành nghề đào tạo'),
            ExportColumn::make('classification')->label('Xếp loại'),
            ExportColumn::make('cohort')->label('Khóa học'),
            ExportColumn::make('issuing_body')->label('Đơn vị cấp'),
            ExportColumn::make('issue_date')->label('Ngày cấp'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Đã xuất thành công ' . number_format($export->successful_rows) . ' văn bằng.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' Có ' . number_format($failedRowsCount) . ' dòng bị lỗi.';
        }

        return $body;
    }
}