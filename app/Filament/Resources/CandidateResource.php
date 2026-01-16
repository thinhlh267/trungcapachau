<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CandidateResource\Pages;
use App\Filament\Resources\CandidateResource\RelationManagers;
use App\Models\Candidate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class CandidateResource extends Resource
{
    protected static ?string $model = Candidate::class;

    protected static ?string $navigationLabel = 'Hồ sơ xét tuyển';
    protected static ?string $modelLabel = 'Hồ sơ';
    protected static ?string $pluralModelLabel = 'Danh sách hồ sơ';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    // --- NÂNG CẤP 1: HIỆN SỐ LƯỢNG HỒ SƠ MỚI TRÊN MENU ---
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'new')->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('status', 'new')->count() > 0 ? 'danger' : 'primary';
    }
    // -----------------------------------------------------

    protected static array $statusOptions = [
        'new' => 'Mới đăng ký',
        'contacted' => 'Đã liên hệ',
        'potential' => 'Tiềm năng',
        'enrolled' => 'Đã nhập học',
        'cancelled' => 'Hủy hồ sơ',
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Họ tên')->required(),
                TextInput::make('phone')->label('Số điện thoại')->required(),
                TextInput::make('email')->label('Email'),
                
                Select::make('major_id')
                    ->label('Ngành đăng ký')
                    ->relationship('major', 'name'),
                    
                Select::make('status')
                    ->label('Trạng thái xử lý')
                    ->options(self::$statusOptions)
                    ->default('new')
                    ->required(),

                Textarea::make('message')->label('Ghi chú/Lời nhắn')->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->label('Ngày đăng ký')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('name')
                    ->label('Họ tên')
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('phone')
                    ->label('SĐT')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Đã chép số điện thoại'),

                TextColumn::make('major.name')
                    ->label('Ngành quan tâm')
                    ->wrap(),


                SelectColumn::make('status')
                    ->label('Trạng thái')
                    ->options(self::$statusOptions)
                    ->selectablePlaceholder(false),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Lọc theo Trạng thái')
                    ->options(self::$statusOptions),
                
                SelectFilter::make('major_id')
                    ->label('Lọc theo Ngành')
                    ->relationship('major', 'name'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListCandidates::route('/'),
            'create' => Pages\CreateCandidate::route('/create'),
            'edit' => Pages\EditCandidate::route('/{record}/edit'),
        ];
    }
}