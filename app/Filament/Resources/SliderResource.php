<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;
    protected static ?string $navigationLabel = 'Slide'; // Tên trên Menu
    protected static ?string $modelLabel = 'Slide'; // Tên gọi 1 cái
    protected static ?string $pluralModelLabel = 'Quản lý Banner'; // Tiêu đề danh sách
    protected static ?string $navigationIcon = 'heroicon-o-photo'; // Icon bức ảnh

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('title')
                ->label('Tiêu đề lớn'),
                
            Textarea::make('description')
                ->label('Mô tả ngắn')
                ->rows(2),

            FileUpload::make('image')
                ->label('Ảnh Banner')
                ->image()
                ->directory('sliders') // Lưu vào thư mục sliders
                ->required()
                ->columnSpan('full'), // Ảnh to tràn màn hình

            Toggle::make('is_active')
                ->label('Hiển thị')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Ảnh demo')->width(150),
                TextColumn::make('title')->label('Tiêu đề')->searchable(),
                ToggleColumn::make('is_active')->label('Hiển thị'),
                TextColumn::make('created_at')->label('Ngày tạo')->date('d/m/Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
