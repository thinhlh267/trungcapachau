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
    protected static ?int $navigationSort = 2; // Hiển thị thứ 2 trên menu admin

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin đơn vị')
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
                            ->label('Mô tả ngắn')
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Hiển thị trên Menu')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Hiển thị'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('Lọc theo loại')
                    ->options([
                        'khoa' => 'Khoa',
                        'phong_ban' => 'Phòng ban',
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