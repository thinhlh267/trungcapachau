<?php

namespace App\Filament\Imports;

use App\Models\Degree;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class DegreeImporter extends Importer
{
    protected static ?string $model = Degree::class;

    public static function getColumns(): array
    {
        return [
            // Khai báo cột: match đúng tên cột trong Database với tên cột trong file CSV
            \Filament\Actions\Imports\ImportColumn::make('degree_code')
                ->requiredMapping()
                ->rules(['required', 'max:255'])
                ->guess(['Số hiệu / Mã văn bằng', 'Số hiệu', 'Mã văn bằng', 'degree_code']),

            \Filament\Actions\Imports\ImportColumn::make('student_name')
                ->requiredMapping()
                ->rules(['required', 'max:255'])
                ->guess(['Họ tên Thí sinh', 'Họ tên', 'student_name']),

            \Filament\Actions\Imports\ImportColumn::make('date_of_birth')
                ->requiredMapping()
                ->rules(['required', 'date'])
                ->guess(['Ngày sinh', 'date_of_birth']),

            \Filament\Actions\Imports\ImportColumn::make('major')
                ->requiredMapping()
                ->rules(['required', 'max:255'])
                ->guess(['Ngành nghề đào tạo', 'Ngành đào tạo', 'Ngành', 'major']),

            \Filament\Actions\Imports\ImportColumn::make('classification')
                ->rules(['nullable', 'max:255'])
                ->guess(['Xếp loại', 'classification']),

            \Filament\Actions\Imports\ImportColumn::make('cohort')
                ->rules(['nullable', 'max:255'])
                ->guess(['Khóa học', 'Khóa', 'cohort']),

            \Filament\Actions\Imports\ImportColumn::make('issuing_body')
                ->requiredMapping()
                ->rules(['required', 'max:255'])
                ->guess(['Đơn vị cấp', 'issuing_body']),

            \Filament\Actions\Imports\ImportColumn::make('issue_date')
                ->rules(['nullable', 'date'])
                ->guess(['Ngày cấp', 'issue_date']),
        ];
    }

    public function resolveRecord(): ?Degree
    {
        // return Degree::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Degree();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your degree import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
