<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MajorResource\Pages;
use App\Filament\Resources\MajorResource\RelationManagers;
use App\Models\Major;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Str;
use Filament\Forms\Set;

class MajorResource extends Resource
{
    protected static ?string $model = Major::class;

    protected static ?string $navigationLabel = 'Ngành đào tạo';
    protected static ?string $modelLabel = 'Ngành học';
    protected static ?string $pluralModelLabel = 'Quản lý Ngành đào tạo';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // --- KHỐI 1: THÔNG TIN CƠ BẢN ---
                Section::make('Thông tin chung')
                    ->schema([
                        Grid::make(2) 
                            ->schema([
                                TextInput::make('name')
                                    ->label('Tên Ngành Đào Tạo')
                                    ->required()
                                    ->live(onBlur: true) 
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                                TextInput::make('slug')
                                    ->label('Đường dẫn (URL)')
                                    ->required()
                                    ->unique(ignoreRecord: true),

                                TextInput::make('department')
                                    ->label('Tên Khoa / Tổ bộ môn')
                                    ->placeholder('VD: Khoa Công nghệ Thông tin')
                                    ->columnSpanFull(),
                                    
                                TextInput::make('duration')
                                    ->label('Thời gian đào tạo')
                                    ->default('2 năm')
                                    ->placeholder('VD: 1.5 năm, 2 năm...'),

                                TextInput::make('tuition')
                                    ->label('Học phí tham khảo')
                                    ->placeholder('VD: 5.000.000đ/kỳ'),
                            ]),

                        RichEditor::make('description')
                            ->label('Mô tả ngắn (Intro Text - Hiển thị ở thẻ đầu trang)')
                            ->toolbarButtons(['bold', 'italic', 'underline']) // Chỉ cần nút cơ bản
                            ->columnSpanFull(),
                    ]),

                // --- KHỐI 2: HÌNH ẢNH & NỘI DUNG CHI TIẾT ---
                Section::make('Nội dung chi tiết từng phần')
                    ->schema([
                        
                        // 1. HEADER & INTRO
                        Grid::make(2)->schema([
                            FileUpload::make('image')
                                ->label('Ảnh Bìa (Banner to trên cùng)')
                                ->image()
                                ->directory('majors'),

                            FileUpload::make('intro_image')
                                ->label('Ảnh Giới thiệu (Ảnh bên phải phần Intro)')
                                ->image()
                                ->directory('majors/intro')
                                ->helperText('Nên chọn ảnh chân dung sinh viên hoặc ảnh tách nền'),
                        ]),

                        // 2. ĐỊNH NGHĨA NGÀNH
                        Section::make('Định nghĩa ngành (Ngành ... là gì?)')
                            ->schema([
                                RichEditor::make('overview')
                                    ->label('Nội dung định nghĩa')
                                    ->columnSpanFull(),
                                    
                                FileUpload::make('gallery')
                                    ->label('3 Ảnh minh họa (Hiển thị ngay dưới định nghĩa)')
                                    ->image()
                                    ->multiple()
                                    ->reorderable()
                                    ->maxFiles(3)
                                    ->directory('majors/gallery')
                                    ->columnSpanFull(),
                            ])->collapsible(),

                        // 3. LÝ DO CHỌN TRƯỜNG (PHẦN BẠN BỊ THIẾU)
                        Section::make('Lý do chọn học tại Á Châu (Why Us?)')
                        ->schema([
                            Grid::make(2)->schema([
                                FileUpload::make('why_us_image')
                                    ->label('Ảnh minh họa (Bên trái)')
                                    ->image()
                                    ->directory('majors/why_us')
                                    ->columnSpan(1),
                                
                                // THAY ĐỔI TẠI ĐÂY:
                                Forms\Components\Repeater::make('why_us_reasons')
                                    ->label('Danh sách lý do (Hiển thị dạng bullet với icon)')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            Forms\Components\Select::make('icon')
                                                ->label('Biểu tượng')
                                                ->options([
                                                    'fas fa-graduation-cap' => '🎓 Bằng cấp',
                                                    'fas fa-user-tie' => '👔 Giảng viên',
                                                    'fas fa-laptop-code' => '💻 Cơ sở vật chất',
                                                    'fas fa-handshake' => '🤝 Doanh nghiệp',
                                                    'fas fa-briefcase' => '💼 Thực tập',
                                                    'fas fa-money-bill-wave' => '💰 Học phí',
                                                    'fas fa-clock' => '⏰ Thời gian',
                                                    'fas fa-certificate' => '📜 Chứng chỉ',
                                                    'fas fa-building' => '🏢 Trường lớp',
                                                    'fas fa-users' => '👥 Cộng đồng',
                                                ])
                                                ->searchable()
                                                ->required(),
                                                
                                            TextInput::make('title')
                                                ->label('Tiêu đề lý do')
                                                ->required()
                                                ->placeholder('VD: Giảng viên giàu kinh nghiệm')
                                                ->maxLength(100),
                                        ]),
                                        
                                        Textarea::make('description')
                                            ->label('Mô tả chi tiết')
                                            ->rows(2)
                                            ->required()
                                            ->placeholder('Mô tả ngắn gọn về lý do này...'),
                                    ])
                                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? 'Lý do mới')
                                    ->collapsible()
                                    ->defaultItems(3)
                                    ->columnSpan(1),
                            ]),
                            
                            // VẪN GIỮ LẠI field cũ để tương thích với data hiện có
                            RichEditor::make('why_us_content')
                                ->label('Nội dung cũ (Legacy - Nếu có)')
                                ->toolbarButtons(['bold', 'bulletList', 'checkList'])
                                ->helperText('Chỉ sử dụng nếu có dữ liệu cũ. Khuyến nghị chuyển sang danh sách lý do bên trên.')
                                ->columnSpanFull()
                                ->disabled()
                                ->dehydrated(),
                        ])->collapsible(),

                        // 4. CƠ HỘI NGHỀ NGHIỆP
                        Section::make('Cơ hội nghề nghiệp (Làm gì & Ở đâu?)')
                            ->schema([
                                Grid::make(2)->schema([
                                    // Làm nghề gì
                                    FileUpload::make('career_titles_image')
                                        ->label('Ảnh minh họa (Làm gì)')
                                        ->image()
                                        ->directory('majors/career')
                                        ->columnSpan(1),
                                    RichEditor::make('career_titles')
                                        ->label('Danh sách nghề nghiệp')
                                        ->toolbarButtons(['bold', 'bulletList'])
                                        ->columnSpan(1),
                                        
                                    // Làm ở đâu
                                    RichEditor::make('career_places')
                                        ->label('Danh sách nơi làm việc')
                                        ->toolbarButtons(['bold', 'bulletList'])
                                        ->columnSpan(1),
                                    FileUpload::make('career_places_image')
                                        ->label('Ảnh minh họa (Ở đâu)')
                                        ->image()
                                        ->directory('majors/career')
                                        ->columnSpan(1),
                                ]),
                            ])->collapsible(),

                        // 5. LỘ TRÌNH HỌC TẬP
                        Section::make('Lộ trình học tập & Ưu điểm')
                            ->schema([
                                Forms\Components\Repeater::make('roadmap')
                                    ->label('Chi tiết Lộ trình (Thêm từng Học kỳ)')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('title')->label('Tên giai đoạn')->required(),
                                            FileUpload::make('image')->label('Ảnh minh họa')->directory('majors/roadmap'),
                                        ]),
                                        Textarea::make('description')->label('Mô tả')->rows(2)->columnSpanFull(),
                                    ])
                                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                                    ->collapsible()
                                    ->columnSpanFull(),

                                RichEditor::make('benefits')
                                    ->label('Ưu điểm chương trình (Mục cuối cùng)')
                                    ->toolbarButtons(['bold', 'bulletList'])
                                    ->columnSpanFull(),
                            ])->collapsible(),
                            
                        // 6. Ưu điểm 
                        Section::make('Điểm nổi bật của ngành (Hiển thị dạng lưới thẻ)')
                        ->schema([
                            // ...
                            Forms\Components\Repeater::make('program_advantages')
                                ->label('Danh sách các điểm nổi bật')
                                ->schema([
                                    // 1. Ô CHỌN ICON (Mới thêm)
                                    Forms\Components\Select::make('icon')
                                        ->label('Chọn biểu tượng (Icon)')
                                        ->options([
                                            // Nhóm Cơ sở vật chất / Công nghệ
                                            'fas fa-laptop-code' => '💻 Máy tính / Lập trình',
                                            'fas fa-server' => '🗄️ Server / Hệ thống',
                                            'fas fa-wifi' => '📡 Mạng / Wifi',
                                            'fas fa-microchip' => '💾 Công nghệ cao',
                                            'fas fa-layer-group' => '📚 Cơ sở vật chất',
                                            
                                            // Nhóm Tiền / Thời gian
                                            'fas fa-coins' => '💰 Học phí / Chi phí',
                                            'fas fa-wallet' => '👛 Tiết kiệm',
                                            'fas fa-clock' => '⏰ Thời gian / Ngắn hạn',
                                            'fas fa-calendar-alt' => '📅 Lịch học linh hoạt',
                                            
                                            // Nhóm Việc làm / Doanh nghiệp
                                            'fas fa-handshake' => '🤝 Hợp tác doanh nghiệp',
                                            'fas fa-briefcase' => '💼 Việc làm / Thực tập',
                                            'fas fa-user-tie' => '👔 Chuyên nghiệp / Giám đốc',
                                            'fas fa-building' => '🏢 Công ty lớn',
                                            
                                            // Nhóm Đào tạo / Bằng cấp
                                            'fas fa-graduation-cap' => '🎓 Bằng cấp / Tốt nghiệp',
                                            'fas fa-book-reader' => '📖 Chương trình học',
                                            'fas fa-certificate' => '📜 Chứng chỉ',
                                            'fas fa-user-graduate' => '👨‍🎓 Sinh viên',
                                            'fas fa-chalkboard-teacher' => '👨‍🏫 Giảng viên',
                                        ])
                                        ->searchable() // Cho phép tìm kiếm icon
                                        ->required()
                                        ->columnSpanFull(),

                                    TextInput::make('title')
                                        ->label('Tiêu đề (VD: Cơ sở vật chất hiện đại)')
                                        ->required(),
                                    
                                    Textarea::make('description')
                                        ->label('Mô tả ngắn')
                                        ->rows(2)
                                        ->required(),
                                ])
                                ->grid(2)
                                ->columnSpanFull(),
                            // ...
                        ])
                        ->collapsible(),
                        
                        Toggle::make('is_active')
                            ->label('Hiển thị trên web')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Banner'),
                TextColumn::make('name')->label('Tên ngành')->searchable()->sortable(),
                TextColumn::make('department')->label('Khoa')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('duration')->label('Thời gian'),
                ToggleColumn::make('is_active')->label('Hiển thị'),
                TextColumn::make('created_at')->label('Ngày tạo')->date('d/m/Y'),
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
            'index' => Pages\ListMajors::route('/'),
            'create' => Pages\CreateMajor::route('/create'),
            'edit' => Pages\EditMajor::route('/{record}/edit'),
        ];
    }
}