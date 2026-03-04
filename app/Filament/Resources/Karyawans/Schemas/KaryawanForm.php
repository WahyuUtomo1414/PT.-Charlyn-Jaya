<?php

namespace App\Filament\Resources\Karyawans\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class KaryawanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                FileUpload::make('foto')
                    ->image()
                    ->directory('karyawan')
                    ->columnSpanFull(),
                TextInput::make('jabatan'),
                Select::make('parent_id')
                    ->label('Atasan')
                    ->relationship('parent', 'nama')
                    ->searchable()
                    ->preload()
                    ->nullable(),
                TextInput::make('urutan')
                    ->numeric()
                    ->default(0),
                Toggle::make('active')
                    ->required(),

            ]);
    }
}
