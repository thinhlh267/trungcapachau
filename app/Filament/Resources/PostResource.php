<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Builder as ContentBuilder; // Đặt tên khác để không trùng với Eloquent Builder
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationLabel = 'Tin tức';
    protected static ?string $modelLabel = 'Bài viết';
    protected static ?string $pluralModelLabel = 'Quản lý Tin tức';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // --- KHỐI 1: THÔNG TIN CHÍNH ---
                Section::make('Thông tin bài viết')
                    ->schema([
                        TextInput::make('title')
                            ->label('Tiêu đề')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),

                        // Nhập tên phòng ban
                        TextInput::make('department')
                            ->label('Phòng ban/Tác giả')
                            ->placeholder('VD: Phòng Tuyển sinh, Đoàn Thanh niên...')
                            ->required(),

                        Select::make('category')
                            ->label('Danh mục')
                            ->options([
                                'tuyensinh' => 'Tuyển sinh',
                                'hoatdong' => 'Hoạt động',
                                'thanhtich' => 'Thành tích',
                                'nobo' => 'Nội bộ',
                            ])
                            ->required(),
                    ])->columns(2),

                // --- KHỐI 2: NỘI DUNG (NÂNG CẤP BUILDER - XẾP KHỐI) ---
                Section::make('Nội dung chi tiết')
                    ->schema([
                        ContentBuilder::make('content')
                            ->label('Soạn thảo nội dung (Thêm từng khối)')
                            ->blocks([
                                // 1. KHỐI ĐOẠN VĂN
                                ContentBuilder\Block::make('doan_van')
                                    ->label('Đoạn văn bản')
                                    ->schema([
                                        RichEditor::make('noi_dung')
                                            ->label('Nội dung văn bản')
                                            ->toolbarButtons([
                                                'bold', 'italic', 'underline', 'strike',
                                                'bulletList', 'orderedList', 
                                                'link', 'h2', 'h3', 'blockquote',
                                                'undo', 'redo',
                                            ]) // Bỏ nút ảnh vì dùng khối ảnh riêng
                                            ->required(),
                                    ]),

                                // 2. KHỐI HÌNH ẢNH + CHÚ THÍCH
                                ContentBuilder\Block::make('hinh_anh')
                                    ->label('Hình ảnh minh họa')
                                    ->schema([
                                        FileUpload::make('url')
                                            ->label('Tải ảnh lên')
                                            ->image()
                                            ->directory('posts/content')
                                            ->required(),
                                        
                                        TextInput::make('chu_thich')
                                            ->label('Chú thích ảnh (Caption)')
                                            ->placeholder('VD: Sinh viên đang thực hành...')
                                            ->required(),
                                    ]),
                            ])
                            ->collapsible() // Cho phép thu gọn các khối
                            ->columnSpanFull(),
                    ]),

                // --- KHỐI 3: HÌNH ẢNH ĐẠI DIỆN & THƯ VIỆN ---
                Section::make('Hình ảnh & Cấu hình')
                    ->schema([
                        // Ảnh thumbnail
                        FileUpload::make('image')
                            ->label('Ảnh đại diện (Thumbnail)')
                            ->image()
                            ->directory('posts')
                            ->columnSpanFull(),

                        // Chú thích ảnh thumbnail (MỚI)
                        TextInput::make('image_caption')
                            ->label('Chú thích ảnh đại diện')
                            ->placeholder('Nhập chú thích cho ảnh bìa...')
                            ->columnSpanFull(),

                        // Thư viện ảnh phụ (Gallery)
                        FileUpload::make('gallery')
                            ->label('Thư viện ảnh hoạt động (Chọn nhiều ảnh)')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->directory('posts/gallery')
                            ->columnSpanFull(),
                        
                        Toggle::make('is_published')
                            ->label('Hiển thị trên web')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Ảnh')->height(50),
                TextColumn::make('title')->label('Tiêu đề')->searchable()->sortable()->limit(50),
                TextColumn::make('category')
                    ->label('Danh mục')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'tuyensinh' => 'warning',
                        'hoatdong' => 'info',
                        'thanhtich' => 'success',
                        'nobo' => 'gray',
                        default => 'gray',
                    }),
                ToggleColumn::make('is_published')->label('Hiển thị'),
                TextColumn::make('created_at')->label('Ngày đăng')->date('d/m/Y')->sortable(),
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
            ])
            ->defaultSort('created_at', 'desc'); // Mặc định bài mới nhất lên đầu
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}