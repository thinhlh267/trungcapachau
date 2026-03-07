<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DegreeResource\Pages;
use App\Models\Degree;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Exports\DegreeExporter; 
use App\Filament\Imports\DegreeImporter;

class DegreeResource extends Resource
{
    protected static ?string $model = Degree::class;
    protected static ?string $navigationLabel = 'Tra cứu Văn bằng';
    protected static ?string $modelLabel = 'Văn bằng / Chứng chỉ';
    protected static ?string $pluralModelLabel = 'Quản lý Văn bằng';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Học viên'; // Nhóm menu mới

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // KHỐI 1: THÔNG TIN HỌC VIÊN
                Forms\Components\Section::make('Thông tin Thí sinh')
                    ->description('Dữ liệu cá nhân của người được cấp bằng')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Forms\Components\TextInput::make('student_name')
                            ->label('Họ tên thí sinh')
                            ->required()
                            ->maxLength(255),
                            
                        Forms\Components\DatePicker::make('date_of_birth')
                        ->label('Ngày sinh')
                        ->native(false) 
                        ->displayFormat('d/m/Y')
                        ->closeOnDateSelection() 
                        ->required(),

                        Forms\Components\TextInput::make('address')
                            ->label('Nơi sinh / Địa chỉ')
                            ->placeholder('VD: Tây Ninh')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])->columns(2),

                // KHỐI 2: THÔNG TIN VĂN BẰNG
                Forms\Components\Section::make('Thông tin Văn bằng / Chứng chỉ')
                    ->description('Dữ liệu dùng để tra cứu trên hệ thống')
                    ->icon('heroicon-o-document-check')
                    ->schema([
                        Forms\Components\TextInput::make('degree_code')
                            ->label('Số hiệu / Mã văn bằng')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('VD: ACV-2026-001')
                            ->helperText('Mã này phải là duy nhất và được học sinh dùng để tra cứu.'),

                        Forms\Components\TextInput::make('cohort')
                            ->label('Khóa học')
                            ->required()
                            ->placeholder('VD: K15 (2021-2023)'),

                        Forms\Components\Select::make('major')
                            ->label('Ngành nghề đào tạo')
                            ->required()
                            // Gợi ý sẵn một số ngành, hoặc admin tự gõ thêm
                            ->options([
                                'Quản trị mạng máy tính' => 'Quản trị mạng máy tính',
                                'Điện công nghiệp và dân dụng' => 'Điện công nghiệp và dân dụng',
                                'Kế toán doanh nghiệp' => 'Kế toán doanh nghiệp',
                                'Tự động hóa công nghiệp' => 'Tự động hóa công nghiệp',
                                'Luật' => 'Luật',
                                'Dược sĩ' => 'Dược sĩ',
                                'Y sĩ y học cổ truyền' => 'Y sĩ y học cổ truyền',
                                'Quản trị và kinh doanh du lịch' => 'Quản trị và kinh doanh du lịch',
                                'Quản trị và kinh doanh khách sạn' => 'Quản trị và kinh doanh khách sạn',

                            ])
                            ->searchable(),

                        Forms\Components\Select::make('classification')
                            ->label('Xếp loại tốt nghiệp')
                            ->options([
                                'Xuất sắc' => 'Xuất sắc',
                                'Giỏi' => 'Giỏi',
                                'Khá' => 'Khá',
                                'Trung bình khá' => 'Trung bình khá',
                                'Trung bình' => 'Trung bình',
                            ]),

                        Forms\Components\TextInput::make('issuing_body')
                            ->label('Đơn vị cấp')
                            ->default('Trường Trung cấp Á Châu')
                            ->required(),

                        Forms\Components\DatePicker::make('issue_date')
                        ->label('Ngày ký / Ngày cấp')
                        ->native(false) 
                        ->displayFormat('d/m/Y') 
                        ->closeOnDateSelection()
                        ->default(now()),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('degree_code')
                    ->label('Số hiệu bằng')
                    ->searchable()
                    ->weight('bold')
                    ->color('primary')
                    ->copyable(), // Cho phép click để copy

                Tables\Columns\TextColumn::make('student_name')
                    ->label('Họ tên')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('date_of_birth')
                    ->label('Ngày sinh')
                    ->date('d/m/Y'),

                Tables\Columns\TextColumn::make('major')
                    ->label('Ngành nghề')
                    ->searchable(),

                Tables\Columns\TextColumn::make('classification')
                    ->label('Xếp loại')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Xuất sắc', 'Giỏi' => 'success',
                        'Khá' => 'info',
                        'Trung bình khá', 'Trung bình' => 'warning',
                        default => 'gray',
                    }),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\ImportAction::make()
                    ->label('Nhập dữ liệu (CSV)')
                    ->importer(DegreeImporter::class)
                    ->color('info')
                    ->icon('heroicon-o-arrow-down-tray'),

                Tables\Actions\ExportAction::make()
                    ->label('Xuất dữ liệu')
                    ->exporter(DegreeExporter::class)
                    ->color('success')
                    ->icon('heroicon-o-arrow-up-tray'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDegrees::route('/'),
            'create' => Pages\CreateDegree::route('/create'),
            'edit' => Pages\EditDegree::route('/{record}/edit'),
        ];
    }
}