<?php

namespace App\Filament\Resources\Pos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PoForm
{
    public static function configure(Schema $schema): Schema
    {
        $isAdmin = fn (): bool => auth()->user()?->roles()->where('id', 1)->exists() ?? false;

        return $schema
            ->components([
                Select::make('penawaran_id')
                    ->relationship('penawaran', 'nama_perusahaan')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('no_po')
                    ->required()
                    ->maxLength(50),
                FileUpload::make('file_po')
                    ->directory('po')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('catatan')
                    ->rows(3)
                    ->maxLength(1000)
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approve' => 'Approve',
                        'reject' => 'Reject',
                    ])
                    ->required()
                    ->default('pending')
                    ->visible(fn () => $isAdmin())
                    ->dehydrated(fn () => true)
                    ->dehydrateStateUsing(fn ($state) => $state ?? 'pending'),
                Toggle::make('active')
                    ->visible(fn () => $isAdmin())
                    ->default(true)
                    ->required(),
            ]);
    }
}
