<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('kategori'),
                FileUpload::make('logo')
                    ->image()
                    ->directory('customer')
                    ->columnSpanFull(),
                Textarea::make('alamat')
                    ->rows(3)
                    ->columnSpanFull(),
                Toggle::make('active')
                    ->required(),

            ]);
    }
}
