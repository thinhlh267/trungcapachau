<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdmissionCategoryResource\Pages;
use App\Models\AdmissionCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class AdmissionCategoryResource extends Resource
{
    protected static ?string $model = AdmissionCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list'; // Icon danh sách
    protected static ?string $navigationGroup = 'Module Tuyển Sinh'; // Gom nhóm menu
    protected static ?string $navigationLabel = 'Hệ Đào Tạo';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Tên Hệ Đào Tạo (VD: Hệ Trung Cấp)')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                    
                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),

                    Forms\Components\TextInput::make('sort_order')
                        ->label('Thứ tự hiển thị')
                        ->numeric()
                        ->default(0),

                    Forms\Components\Toggle::make('is_active')
                        ->label('Hiển thị trên Menu')
                        ->default(true),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Tên Hệ')->sortable()->searchable(),
                Tables\Columns\ToggleColumn::make('is_active')->label('Hiển thị'),
                Tables\Columns\TextInputColumn::make('sort_order')->label('Thứ tự')->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('sort_order', 'asc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdmissionCategories::route('/'),
            'create' => Pages\CreateAdmissionCategory::route('/create'),
            'edit' => Pages\EditAdmissionCategory::route('/{record}/edit'),
        ];
    }
}