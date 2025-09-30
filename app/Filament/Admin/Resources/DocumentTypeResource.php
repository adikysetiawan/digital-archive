<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DocumentTypeResource\Pages;
use App\Models\DocumentType;
use App\Models\Service;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DocumentTypeResource extends Resource
{
    protected static ?string $model = DocumentType::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-document-text';
    }

    public static function getNavigationGroup(): string
    {
        return 'Master Data';
    }

    protected static ?string $navigationLabel = 'Document Types';


    protected static ?int $navigationSort = 3;


    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Category')
                    ->options(fn () => Service::query()->whereNull('parent_id')->orderBy('name')->pluck('name', 'id'))
                    ->live()
                    ->dehydrated(false)
                    ->native(false),

                Select::make('service_id')
                    ->label('Sub Category')
                    ->required()
                    ->options(function (callable $get) {
                        $categoryId = $get('category_id');
                        $query = Service::query()->whereNotNull('parent_id');
                        if (!empty($categoryId)) {
                            $query->where('parent_id', $categoryId);
                        }
                        return $query->orderBy('name')->pluck('name', 'id');
                    })
                    ->native(false),

                TextInput::make('name')
                    ->label('Document Type')
                    ->required()
                    ->maxLength(255),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('service.parent.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('service.name')
                    ->label('Sub Category')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Document Type')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Category')
                    ->options(Service::query()->whereNull('parent_id')->pluck('name', 'id'))
                    ->query(function ($query, $data) {
                        if (! empty($data['value'])) {
                            $query->whereHas('service.parent', function ($q) use ($data) {
                                $q->where('id', $data['value']);
                            });
                        }
                    }),
                Tables\Filters\SelectFilter::make('service_id')
                    ->label('Sub Category')
                    ->options(Service::query()->whereNotNull('parent_id')->pluck('name', 'id')),
            ])
            ->recordUrl(fn (DocumentType $record): string => static::getUrl('edit', ['record' => $record]));
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDocumentTypes::route('/'),
            'create' => Pages\CreateDocumentType::route('/create'),
            'edit' => Pages\EditDocumentType::route('/{record}/edit'),
        ];
    }
}
