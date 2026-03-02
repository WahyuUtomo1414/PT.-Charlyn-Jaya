<?php

namespace App\Filament\Resources\Karyawans\Schemas;

use Filament\Forms\Components\FileUpload;
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
                Toggle::make('active')
                    ->required(),

            ]);
    }
}
