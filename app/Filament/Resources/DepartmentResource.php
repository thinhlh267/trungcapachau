<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepartmentResource\Pages;
use App\Models\Department;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;
    protected static ?string $navigationLabel = 'Khoa - Phòng ban';
    protected static ?string $modelLabel = 'Đơn vị';
    protected static ?string $pluralModelLabel = 'Quản lý Khoa/Phòng';
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        // --- KHỐI 1: THÔNG TIN CHÍNH ---
                        Forms\Components\Section::make('Thông tin chung')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Tên Khoa / Phòng ban')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', Str::slug($state))),

                                Forms\Components\TextInput::make('slug')
                                    ->label('Đường dẫn (URL)')
                                    ->required()
                                    ->unique(ignoreRecord: true),

                                Forms\Components\Select::make('type')
                                    ->label('Loại đơn vị')
                                    ->options([
                                        'khoa' => 'Khoa chuyên môn',
                                        'phong_ban' => 'Phòng ban chức năng',
                                        'trung_tam' => 'Trung tâm trực thuộc',
                                    ])
                                    ->default('khoa')
                                    ->required(),

                                Forms\Components\Textarea::make('description')
                                    ->label('Mô tả ngắn gọn (Hiển thị đầu trang)')
                                    ->rows(3)
                                    ->columnSpanFull(),
                                    
                                \AmidEsfahani\FilamentTinyEditor\TinyEditor::make('content')
    ->label('Nội dung giới thiệu chi tiết')
    ->columnSpanFull()
    ->fileAttachmentsDirectory('uploads/tiny_editor') // Thư mục lưu ảnh chèn vào bài
    ->profile('default|simple|full|minimal') // Chọn giao diện
    ->language('vi'), // Set tiếng Việt nếu cần
                            ])->columns(2),

                        // --- KHỐI 2: SEO TỐI ƯU ---
                        Forms\Components\Section::make('Tối ưu SEO')
                            ->description('Thông tin hiển thị trên công cụ tìm kiếm (Google, Facebook...)')
                            ->schema([
                                Forms\Components\TextInput::make('seo_title')
                                    ->label('Tiêu đề SEO (Mặc định lấy tên đơn vị nếu để trống)')
                                    ->maxLength(70),
                                Forms\Components\Textarea::make('seo_description')
                                    ->label('Mô tả SEO')
                                    ->maxLength(160)
                                    ->helperText('Độ dài chuẩn: Dưới 160 ký tự.'),
                            ])->collapsed(),
                    ])
                    ->columnSpan(['lg' => 2]),

                // --- SIDEBAR BÊN PHẢI ---
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Trạng thái & Hình ảnh')
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Hiển thị trên Web')
                                    ->default(true),

                                Forms\Components\TextInput::make('sort_order')
                                    ->label('Thứ tự hiển thị')
                                    ->numeric()
                                    ->default(0)
                                    ->helperText('Số càng nhỏ càng lên đầu.'),

                                Forms\Components\FileUpload::make('image')
                                    ->label('Ảnh bìa / Ảnh đại diện')
                                    ->image()
                                    ->directory('departments')
                                    ->columnSpanFull(),
                            ]),

                        // --- KHỐI 3: THÔNG TIN LIÊN HỆ CỦA ĐƠN VỊ ---
                        Forms\Components\Section::make('Thông tin liên hệ')
                            ->schema([
                                // Lưu dạng Key-Value vào cột JSON 'contact_info'
                                Forms\Components\KeyValue::make('contact_info')
                                    ->label('Chi tiết liên hệ')
                                    ->keyLabel('Loại (VD: Điện thoại, Phòng)')
                                    ->valueLabel('Nội dung (VD: 09123456, Phòng A102)')
                                    ->default([
                                        'Điện thoại' => '',
                                        'Email' => '',
                                        'Văn phòng' => '',
                                    ])
                                    ->reorderable(),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3); // Chia layout 2 cột trái, 1 cột phải
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Ảnh bìa')
                    ->circular(),
                    
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên đơn vị')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('type')
                    ->label('Phân loại')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'khoa' => 'success',
                        'phong_ban' => 'warning',
                        'trung_tam' => 'info',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'khoa' => 'Khoa',
                        'phong_ban' => 'Phòng ban',
                        'trung_tam' => 'Trung tâm',
                        default => $state,
                    }),

                Tables\Columns\TextInputColumn::make('sort_order')
                    ->label('Thứ tự')
                    ->sortable()
                    ->rules(['numeric']),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Hiển thị'),
            ])
            ->defaultSort('sort_order', 'asc') // Sắp xếp theo thứ tự mặc định
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('Lọc theo loại')
                    ->options([
                        'khoa' => 'Khoa',
                        'phong_ban' => 'Phòng ban',
                        'trung_tam' => 'Trung tâm',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDepartments::route('/'),
            'create' => Pages\CreateDepartment::route('/create'),
            'edit' => Pages\EditDepartment::route('/{record}/edit'),
        ];
    }
}