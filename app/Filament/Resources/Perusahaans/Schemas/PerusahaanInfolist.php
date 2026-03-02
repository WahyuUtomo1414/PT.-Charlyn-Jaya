<?php

namespace App\Filament\Resources\Perusahaans\Schemas;

use App\Models\Perusahaan;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PerusahaanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama'),
                TextEntry::make('alamat')
                    ->placeholder('-')
                    ->columnSpanFull(),
                ImageEntry::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('tentang_kami')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('filosofi')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('visi')
                    ->placeholder('-')
                    ->columnSpanFull(),
                RepeatableEntry::make('misi')
                    ->label('Misi')
                    ->state(fn (Perusahaan $record): array => collect($record->misi ?? [])
                        ->map(fn ($item) => ['misi' => (string) $item])
                        ->values()
                        ->all())
                    ->schema([
                        TextEntry::make('misi'),                    ])
                    ->columns(1)
                    ->columnSpanFull(),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('no_wa')
                    ->placeholder('-'),
                ImageEntry::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->placeholder('-')
                    ->columnSpanFull(),
                RepeatableEntry::make('media_sosial')
                    ->label('Sosial Media')
                    ->schema([
                        TextEntry::make('platform')
                            ->formatStateUsing(fn ($state) => ucfirst((string) $state)),
                        TextEntry::make('link')
                            ->url(fn (?string $state): ?string => filled($state) ? $state : null, shouldOpenInNewTab: true),
                    ])
                    ->columns(2)
                    ->columnSpanFull()
                    ->formatStateUsing(fn ($state): array => collect($state ?? [])
                        ->map(fn ($item) => [
                            'platform' => strtolower((string) ($item['platform'] ?? $item['name'] ?? '')),
                            'link' => (string) ($item['link'] ?? $item['url'] ?? ''),
                        ])
                        ->filter(fn (array $item) => filled($item['platform']) || filled($item['link']))
                        ->values()
                        ->all()),
            ]);
    }
}
