<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DocumentResource\Pages;
use App\Models\Document;
use App\Models\Service;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-rectangle-stack';
    }

    public static function getNavigationGroup(): string
    {
        return 'Arsip';
    }

    protected static ?string $navigationLabel = 'Kelola Dokumen';

    protected static ?string $modelLabel = 'Dokumen';

    protected static ?string $pluralModelLabel = 'Dokumen';

    protected static ?int $navigationSort = 2;


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('documentType.service.parent.name')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Dinas Kesehatan' => 'success',
                        'Dinas Perhubungan' => 'warning',
                        'Permohonan Magang' => 'info',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('documentType.service.name')
                    ->label('Sub Kategori')
                    ->badge()
                    ->color('gray'),
                Tables\Columns\TextColumn::make('documentType.name')
                    ->label('Jenis Dokumen')
                    ->wrap()
                    ->limit(50),
                Tables\Columns\TextColumn::make('uploader.name')
                    ->label('Diupload oleh')
                    ->sortable(),
                Tables\Columns\TextColumn::make('download_count')
                    ->label('Download')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Upload')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('download_link')
                    ->label('Download')
                    ->formatStateUsing(fn ($record) => 'Unduh')
                    ->url(fn (\App\Models\Document $record): string => route('documents.download', $record))
                    ->openUrlInNewTab()
                    ->color('primary')
                    ->icon('heroicon-o-arrow-down-tray'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Kategori')
                    ->options(fn () => Service::query()->whereNull('parent_id')->orderBy('name')->pluck('name', 'id')->toArray())
                    ->query(function ($query, $data) {
                        if (!empty($data['value'])) {
                            $query->whereHas('documentType.service.parent', function ($q) use ($data) {
                                $q->where('id', $data['value']);
                            });
                        }
                    }),
                Tables\Filters\SelectFilter::make('sub_category')
                    ->label('Sub Kategori')
                    ->options(fn () => Service::query()->whereNotNull('parent_id')->orderBy('name')->pluck('name', 'id')->toArray())
                    ->query(function ($query, $data) {
                        if (!empty($data['value'])) {
                            $query->whereHas('documentType.service', function ($q) use ($data) {
                                $q->where('id', $data['value']);
                            });
                        }
                    }),
                Tables\Filters\SelectFilter::make('document_type_id')
                    ->label('Jenis Dokumen')
                    ->relationship('documentType', 'name'),
                Tables\Filters\SelectFilter::make('uploader')
                    ->label('Diupload oleh')
                    ->relationship('uploader', 'name'),
            ])
            ->recordUrl(fn (Document $record): string => static::getUrl('edit', ['record' => $record]))
            
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
