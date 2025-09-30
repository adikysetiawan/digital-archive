<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-queue-list';
    }

    public static function getNavigationGroup(): string
    {
        return 'Master Data';
    }

    protected static ?string $navigationLabel = 'Services (Kategori)';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('level')
                    ->label('Level Data')
                    ->options([
                        'category' => 'Category (Level 1)',
                        'sub_category' => 'Sub Category (Level 2)',
                        'document_group' => 'Document Group (Level 3)',
                    ])
                    ->required()
                    ->live()
                    ->dehydrated(false)
                    ->native(false),

                // Pilih Category (untuk membuat Sub Category / Document Group)
                Select::make('category_id')
                    ->label('Category')
                    ->options(fn () => Service::query()->whereNull('parent_id')->orderBy('name')->pluck('name', 'id'))
                    ->searchable()
                    ->live()
                    ->dehydrated(false)
                    ->native(false)
                    ->visible(fn (callable $get) => in_array($get('level'), ['sub_category', 'document_group'])),

                // Pilih Sub Category (untuk membuat Document Group)
                Select::make('sub_category_id')
                    ->label('Sub Category')
                    ->options(function (callable $get) {
                        $categoryId = $get('category_id');
                        $query = Service::query()->whereNotNull('parent_id');
                        if (!empty($categoryId)) {
                            $query->where('parent_id', $categoryId);
                        }
                        return $query->orderBy('name')->pluck('name', 'id');
                    })
                    ->searchable()
                    ->live()
                    ->dehydrated(false)
                    ->native(false)
                    ->visible(fn (callable $get) => $get('level') === 'document_group'),

                // parent_id diset otomatis sesuai level
                Select::make('parent_id')
                    ->label('Parent (auto)')
                    ->options(fn () => Service::query()->orderBy('name')->pluck('name', 'id'))
                    ->hidden()
                    ->dehydrateStateUsing(function (callable $get, $state) {
                        $level = $get('level');
                        if ($level === 'category') {
                            return null; // Level 1
                        }
                        if ($level === 'sub_category') {
                            return $get('category_id'); // Parent adalah Category terpilih
                        }
                        if ($level === 'document_group') {
                            return $get('sub_category_id'); // Parent adalah Sub Category terpilih
                        }
                        return $state;
                    }),

                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('parent.parent.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Sub Category')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name / Document Group')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->label('Dibuat')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->defaultSort('name');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
