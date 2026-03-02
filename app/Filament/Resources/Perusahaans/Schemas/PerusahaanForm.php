<?php

namespace App\Filament\Resources\Perusahaans\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PerusahaanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                Textarea::make('alamat')
                    ->rows(3),
                FileUpload::make('logo')
                    ->image()
                    ->directory('perusahaan')
                    ->columnSpanFull(),
                Textarea::make('tentang_kami')
                    ->columnSpanFull(),
                Textarea::make('filosofi')
                    ->columnSpanFull(),
                Textarea::make('visi')
                    ->columnSpanFull(),
                Repeater::make('misi')
                    ->schema([
                        TextInput::make('value')
                            ->label('Misi')
                            ->required(),
                    ])
                    ->columnSpanFull()
                    ->defaultItems(0)
                    ->addActionLabel('Tambah Misi')
                    ->formatStateUsing(fn (?array $state): array => collect($state ?? [])
                        ->map(fn ($item) => is_array($item) ? $item : ['value' => $item])
                        ->values()
                        ->all())
                    ->dehydrateStateUsing(fn (?array $state): array => collect($state ?? [])
                        ->pluck('value')
                        ->filter()
                        ->values()
                        ->all()),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('no_wa'),
                FileUpload::make('foto')
                    ->image()
                    ->directory('perusahaan')
                    ->columnSpanFull(),
                Repeater::make('media_sosial')
                    ->schema([
                        Select::make('platform')
                            ->options([
                                'facebook' => 'Facebook',
                                'instagram' => 'Instagram',
                                'linkedin' => 'LinkedIn',
                            ])
                            ->required(),
                        TextInput::make('link')
                            ->url()
                            ->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull()
                    ->maxItems(3)
                    ->default([
                        ['platform' => 'facebook', 'link' => ''],
                        ['platform' => 'instagram', 'link' => ''],
                        ['platform' => 'linkedin', 'link' => ''],
                    ])
                    ->addActionLabel('Tambah Sosial Media')
                    ->formatStateUsing(fn (?array $state): array => collect($state ?? [])
                        ->map(fn ($item) => [
                            'platform' => strtolower((string) ($item['platform'] ?? $item['name'] ?? '')),
                            'link' => (string) ($item['link'] ?? $item['url'] ?? ''),
                        ])
                        ->filter(fn (array $item) => filled($item['platform']) || filled($item['link']))
                        ->values()
                        ->all())
                    ->dehydrateStateUsing(fn (?array $state): array => collect($state ?? [])
                        ->map(fn ($item) => [
                            'platform' => strtolower((string) ($item['platform'] ?? '')),
                            'link' => (string) ($item['link'] ?? ''),
                        ])
                        ->filter(fn (array $item) => filled($item['platform']) && filled($item['link']))
                        ->values()
                        ->all()),
                Toggle::make('active')
                    ->required(),
            ]);
    }
}
