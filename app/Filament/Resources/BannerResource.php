<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationLabel = 'Banner tĩnh';
    protected static ?string $modelLabel = 'Banner';
    protected static ?string $pluralModelLabel = 'Quản lý Banner';
    protected static ?string $navigationIcon = 'heroicon-o-photo'; 
    // -------------------------------------

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->label('Ảnh Banner')
                    ->image() 
                    ->directory('banners') // Lưu vào thư mục 'banners' trong storage
                    ->required() 
                    ->columnSpanFull(), // Cho khung upload to hết chiều ngang
                
                Toggle::make('is_active')
                    ->label('Hiển thị ngay?')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Cột hiển thị ảnh nhỏ
                ImageColumn::make('image')
                    ->label('Hình ảnh')
                    ->height(100) // Chiều cao ảnh demo
                    ->width('auto'),

                // Cột bật tắt nhanh
                ToggleColumn::make('is_active')
                    ->label('Trạng thái'),
                
                // Cột ngày tạo
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime('d/m/Y')
                    ->sortable(),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}