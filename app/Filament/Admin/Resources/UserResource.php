<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    
    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-users';
    }
    
    public static function getNavigationGroup(): string
    {
        return 'System';
    }

    protected static ?string $navigationLabel = 'Kelola User';

    protected static ?string $modelLabel = 'User';

    protected static ?string $pluralModelLabel = 'Users';

    protected static ?int $navigationSort = 1;


    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('accessibleCategories')
                    ->label('Kategori yang Bisa Diakses')
                    ->relationship('accessibleCategories', 'name')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->options(fn () => \App\Models\Service::whereNull('parent_id')->orderBy('name')->pluck('name', 'id'))
                    ->visible(fn (callable $get) => !$get('is_admin')),
                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('nip')
                    ->label('NIP')
                    ->maxLength(50)
                    ->unique(ignoreRecord: true)
                    ->validationAttribute('NIP')
                    ->nullable(),

                TextInput::make('nik')
                    ->label('NIK')
                    ->maxLength(50)
                    ->unique(ignoreRecord: true)
                    ->validationAttribute('NIK')
                    ->nullable(),

                TextInput::make('phone_number')
                    ->label('Nomor Telepon')
                    ->tel()
                    ->maxLength(50)
                    ->nullable(),

                Toggle::make('is_admin')
                    ->label('Admin')
                    ->default(false),

                FileUpload::make('avatar')
                    ->label('Avatar')
                    ->image()
                    ->imageEditor()
                    ->directory('avatars')
                    ->disk('public')
                    ->visibility('public')
                    ->maxSize(2048)
                    ->nullable(),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->revealable()
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $operation) => $operation === 'create')
                    ->minLength(8),

                TextInput::make('password_confirmation')
                    ->label('Konfirmasi Password')
                    ->password()
                    ->revealable()
                    ->same('password')
                    ->dehydrated(false)
                    ->required(fn (string $operation) => $operation === 'create'),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->label('Avatar')
                    ->circular()
                    ->disk('public')
                    ->defaultImageUrl(fn ($record): string => 'https://ui-avatars.com/api/?name=' . urlencode($record->name ?? 'User') . '&color=7F9CF5&background=EBF4FF'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_admin')
                    ->label('Admin')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diupdate')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_admin')
                    ->label('Admin')
                    ->boolean()
                    ->trueLabel('Admin')
                    ->falseLabel('User Biasa')
                    ->native(false),
            ])
            ->recordUrl(fn (User $record): string => static::getUrl('edit', ['record' => $record]));
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
