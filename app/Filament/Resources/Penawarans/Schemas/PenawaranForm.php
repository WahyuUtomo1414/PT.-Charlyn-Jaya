<?php

namespace App\Filament\Resources\Penawarans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class PenawaranForm
{
    public static function configure(Schema $schema): Schema
    {
        $isAdmin = fn (): bool => auth()->user()?->roles()->where('id', 1)->exists() ?? false;

        return $schema
            ->components([
                Select::make('layanan_id')
                    ->relationship('layanan', 'nama')
                    ->searchable()
                    ->preload(),
                TextInput::make('nama_perusahaan'),
                Grid::make(2)
                    ->schema([
                        Textarea::make('alamat')
                            ->rows(3),
                        DatePicker::make('tanggal_permintaan'),
                    ]),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                FileUpload::make('file')
                    ->directory('penawaran')
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approve' => 'Approve',
                        'reject' => 'Reject',
                    ])
                    ->default('pending')
                    ->visible(fn () => $isAdmin())
                    ->dehydrated(fn () => true),
                TextInput::make('catatan'),
                Toggle::make('active')
                    ->visible(fn () => $isAdmin())
                    ->required(),

            ]);
    }
}
