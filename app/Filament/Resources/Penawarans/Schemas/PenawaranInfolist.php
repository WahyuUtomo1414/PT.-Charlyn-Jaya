<?php

namespace App\Filament\Resources\Penawarans\Schemas;

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
                    ->columns(3)
                    ->schema([
                        TextEntry::make('layanan.nama')
                            ->label('Layanan')
                            ->placeholder('-'),
                        TextEntry::make('nama_perusahaan')
                            ->label('Nama Perusahaan')
                            ->placeholder('-'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'pending' => 'warning',
                                'po' => 'success',
                                'proses' => 'info',
                                'selesai' => 'success',
                                'batal' => 'danger',
                                default => 'gray',
                            }),
                        TextEntry::make('quantity')
                            ->label('Quantity (Orang)')
                            ->numeric()
                            ->placeholder('-'),
                        TextEntry::make('deadline_pengerjaan')
                            ->label('Deadline Pengerjaan')
                            ->date()
                            ->placeholder('-'),
                        TextEntry::make('tanggal_permintaan')
                            ->label('Tanggal Permintaan')
                            ->date()
                            ->placeholder('-'),
                    ])->columnSpanFull(),
                
                Section::make('Detail & Dokumen')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('alamat')
                            ->label('Alamat')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('deskripsi')
                            ->label('Deskripsi')
                            ->markdown()
                            ->placeholder('-')
                            ->columnSpanFull(),
                        
                        // Dokumen Section
                        TextEntry::make('file')
                            ->label('File Customer')
                            ->url(fn ($record) => $record->file ? route('private-file', ['path' => ltrim($record->file, '/')]) : null)
                            ->openUrlInNewTab()
                            ->icon('heroicon-m-arrow-down-tray')
                            ->color('primary')
                            ->placeholder('Tidak ada file'),
                        
                        TextEntry::make('file_penawaran')
                            ->label('File Penawaran (Admin)')
                            ->url(fn ($record) => $record->file_penawaran ? route('private-file', ['path' => ltrim($record->file_penawaran, '/')]) : null)
                            ->openUrlInNewTab()
                            ->icon('heroicon-m-arrow-down-tray')
                            ->color('success')
                            ->placeholder('Belum diupload'),
                    ])->columnSpanFull(),

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
