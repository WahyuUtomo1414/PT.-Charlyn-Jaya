<?php

namespace App\Filament\Resources\Penawarans\Schemas;

use App\Models\Penawaran;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
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
                                'proses' => 'info',
                                'selesai' => 'success',
                                'batal' => 'danger',
                                default => 'gray',
                            }),
                        TextEntry::make('quantity')
                            ->label('Quantity')
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
                    ]),
                
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
                        TextEntry::make('catatan')
                            ->label('Catatan')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('file_penawaran')
                            ->label('File Penawaran')
                            ->url(fn ($record) => $record->file_penawaran ? asset('storage/' . $record->file_penawaran) : null)
                            ->openUrlInNewTab()
                            ->placeholder('Belum ada file'),
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
