<?php

namespace App\Filament\Resources\Pos\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Purchase Order')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('penawaran.nama_perusahaan')
                            ->label('Perusahaan (Dari Penawaran)')
                            ->placeholder('-'),
                        TextEntry::make('no_po')
                            ->label('Nomor PO')
                            ->placeholder('-'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn (?string $state): string => match ($state) {
                                'pending' => 'warning',
                                'approve' => 'success',
                                'reject' => 'danger',
                                default => 'gray',
                            })
                            ->placeholder('-'),
                        TextEntry::make('file_po')
                            ->label('File PO')
                            ->url(fn ($record) => $record->file_po ? asset('storage/' . $record->file_po) : null)
                            ->openUrlInNewTab()
                            ->placeholder('Tidak ada file'),
                        TextEntry::make('catatan')
                            ->label('Catatan')
                            ->columnSpanFull()
                            ->placeholder('-'),
                    ]),

                Section::make('Audit Trail')
                    ->columns(2)
                    ->collapsed()
                    ->schema([
                        TextEntry::make('createdBy.name')
                            ->label('Dibuat Oleh')
                            ->placeholder('-'),
                        TextEntry::make('created_at')
                            ->label('Waktu Buat')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updatedBy.name')
                            ->label('Diperbarui Oleh')
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->label('Waktu Perbarui')
                            ->dateTime()
                            ->placeholder('-'),
                    ]),
            ]);
    }
}
