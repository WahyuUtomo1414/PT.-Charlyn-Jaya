<?php

namespace App\Filament\Resources\Penawarans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PenawaranForm
{
    public static function configure(Schema $schema): Schema
    {
        $isAdmin = fn (): bool => auth()->user()?->roles()->where('id', 1)->exists() ?? false;

        return $schema
            ->components([
                // Section::make('Informasi Dasar')
                //     ->columns(2)
                //     ->schema([
                //         Select::make('layanan_id')
                //             ->relationship('layanan', 'nama')
                //             ->searchable()
                //             ->preload()
                //             ->required(),
                //         TextInput::make('nama_perusahaan')
                //             ->label('Nama Perusahaan'),
                //         TextInput::make('quantity')
                //             ->numeric()
                //             ->required(),
                //         DatePicker::make('deadline_pengerjaan')
                //             ->native(false)
                //             ->required(),
                //         DateTimePicker::make('tanggal_permintaan')
                //             ->required()
                //             ->native(false)
                //             ->displayFormat('d-m-Y H:i')
                //             ->format('Y-m-d H:i:s'),
                //         Textarea::make('alamat')
                //             ->rows(3),
                //     ])->columnSpanFull(),

                // Section::make('Detail & Lampiran')
                //     ->schema([
                //         Textarea::make('deskripsi')
                //             ->columnSpanFull(),
                //         FileUpload::make('file')
                //             ->label('File dari Customer')
                //             ->directory('penawaran')
                //             ->columnSpanFull(),
                //         Textarea::make('catatan')
                //             ->rows(3)
                //             ->columnSpanFull(),
                //     ])->columnSpanFull(),

                Section::make('Proses Admin')
                    ->visible(fn () => $isAdmin())
                    ->schema([
                        FileUpload::make('file_penawaran')
                            ->label('Upload File Penawaran (Admin)')
                            ->directory('penawaran_admin')
                            ->columnSpanFull()
                            ->required(fn ($get) => $get('status') === 'po'),
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'po' => 'PO',
                            ])
                            ->required()
                            ->default('pending'),
                        Toggle::make('active')
                            ->default(true)
                            ->required(),
                    ])->columnSpanFull(),
            ]);
    }
}
