<?php

namespace App\Filament\Resources\Penawarans\Schemas;

use App\Models\Penawaran;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PenawaranInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Penawaran')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('layanan.nama')
                            ->label('Layanan')
                            ->placeholder('-'),
                        TextEntry::make('nama_perusahaan')
                            ->label('Nama Perusahaan')
                            ->placeholder('-'),
                        TextEntry::make('alamat')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('tanggal_permintaan')
                            ->date()
                            ->placeholder('-'),
                        TextEntry::make('status')
                            ->placeholder('-'),
                        TextEntry::make('file')
                            ->placeholder('-'),
                        TextEntry::make('catatan')
                            ->placeholder('-'),
                        IconEntry::make('active')
                            ->boolean(),
                    ]),
                Section::make('Deskripsi')
                    ->schema([
                        TextEntry::make('deskripsi')
                            ->placeholder('-'),
                    ]),
                Section::make('Audit')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('createdBy.name')
                            ->label('Created By')
                            ->placeholder('-'),
                        TextEntry::make('updatedBy.name')
                            ->label('Updated By')
                            ->placeholder('-'),
                        TextEntry::make('deletedBy.name')
                            ->label('Deleted By')
                            ->placeholder('-'),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('deleted_at')
                            ->dateTime()
                            ->visible(fn (Penawaran $record): bool => $record->trashed()),
                    ]),
            ]);
    }
}
