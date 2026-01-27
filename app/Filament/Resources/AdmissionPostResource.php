<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdmissionPostResource\Pages;
use App\Models\AdmissionPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class AdmissionPostResource extends Resource
{
    protected static ?string $model = AdmissionPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone'; // Icon cái loa
    protected static ?string $navigationGroup = 'Module Tuyển Sinh';
    protected static ?string $navigationLabel = 'Bài Viết Tuyển Sinh';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)->schema([
                    // CỘT TRÁI: Nội dung chính
                    Forms\Components\Group::make()->schema([
                        Forms\Components\Card::make()->schema([
                            Forms\Components\TextInput::make('title')
                                ->label('Tiêu đề thông báo')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                            
                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->unique(ignoreRecord: true),

                            Forms\Components\Textarea::make('description')
                                ->label('Mô tả ngắn')
                                ->rows(3),

                            // Trình soạn thảo văn bản
                            Forms\Components\RichEditor::make('content')
                                ->label('Nội dung chi tiết')
                                ->fileAttachmentsDirectory('admission-images')
                                ->required()
                                ->columnSpanFull(),
                        ]),
                    ])->columnSpan(2),

                    // CỘT PHẢI: Cấu hình
                    Forms\Components\Group::make()->schema([
                        Forms\Components\Card::make()->schema([
                            Forms\Components\FileUpload::make('image')
                                ->label('Ảnh đại diện')
                                ->image()
                                ->directory('admission-thumbnails'),

                            Forms\Components\Select::make('admission_category_id')
                                ->label('Thuộc Hệ Đào Tạo')
                                ->relationship('category', 'name')
                                ->required()
                                ->createOptionForm([ // Cho phép tạo nhanh danh mục ngay tại đây
                                    Forms\Components\TextInput::make('name')
                                        ->required()
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                                    Forms\Components\TextInput::make('slug')->required(),
                                ]),

                            Forms\Components\Toggle::make('is_published')
                                ->label('Đăng ngay')
                                ->default(true),
                        ]),
                    ])->columnSpan(1),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Ảnh'),
                Tables\Columns\TextColumn::make('title')->label('Tiêu đề')->limit(50)->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Hệ')
                    ->badge()
                    ->color('warning'),
                Tables\Columns\ToggleColumn::make('is_published')->label('Hiển thị'),
                Tables\Columns\TextColumn::make('created_at')->date('d/m/Y')->label('Ngày đăng'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('admission_category_id')
                    ->relationship('category', 'name')
                    ->label('Lọc theo Hệ'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdmissionPosts::route('/'),
            'create' => Pages\CreateAdmissionPost::route('/create'),
            'edit' => Pages\EditAdmissionPost::route('/{record}/edit'),
        ];
    }
}