<?php

namespace App\Filament\Resources\Layanans\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LayananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('benner')
                    ->image()
                    ->directory('layanan')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('icon')
                    ->image()
                    ->directory('layanan')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                Repeater::make('lingkup_layanan')
                    ->schema([
                        TextInput::make('value')
                            ->label('Lingkup Layanan')
                            ->required(),
                    ])
                    ->columnSpanFull()
                    ->defaultItems(0)
                    ->addActionLabel('Tambah Lingkup')
                    ->formatStateUsing(fn (?array $state): array => collect($state ?? [])
                        ->map(fn ($item) => is_array($item) ? $item : ['value' => $item])
                        ->values()
                        ->all())
                    ->dehydrateStateUsing(fn (?array $state): array => collect($state ?? [])
                        ->pluck('value')
                        ->filter()
                        ->values()
                        ->all()),
                FileUpload::make('foto')
                    ->image()
                    ->multiple()
                    ->directory('layanan')
                    ->columnSpanFull(),
                Toggle::make('active')
                    ->required(),

            ]);
    }
}
