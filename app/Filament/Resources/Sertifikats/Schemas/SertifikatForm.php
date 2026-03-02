<?php

namespace App\Filament\Resources\Sertifikats\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SertifikatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('foto'),
                TextInput::make('jenis'),
                Toggle::make('active')
                    ->required(),

            ]);
    }
}
