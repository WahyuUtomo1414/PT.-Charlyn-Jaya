<?php

namespace App\Filament\Resources\Pos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class PoForm
{
    public static function configure(Schema $schema): Schema
    {
        $isAdmin = fn (): bool => auth()->user()?->roles()->where('id', 1)->exists() ?? false;

        return $schema
            ->components([
                // Select::make('penawaran_id')
                //     ->relationship('penawaran', 'nama_perusahaan')
                //     ->searchable()
                //     ->preload()
                //     ->required(),
                // TextInput::make('no_po')
                //     ->required()
                //     ->maxLength(50),
                // FileUpload::make('file_po')
                //     ->directory('po')
                //     ->required()
                //     ->columnSpanFull(),
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
                
                // Placeholder::make('print_action')
                //     ->label('Aksi')
                //     ->visible(fn ($record) => $record !== null)
                //     ->content(fn ($record) => new HtmlString('
                //         <a href="'.route('po.print', $record).'" target="_blank" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-success-600 rounded-lg shadow hover:bg-success-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-success-600">
                //             <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                //                 <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.618 0-1.13-.514-1.122-1.131L6.34 18m11.32 0h-11.32m0 0a2.25 2.25 0 002.25 2.25h6.82a2.25 2.25 0 002.25-2.25M6.34 18h11.32m-9.47-6V7.054c0-1.282.95-2.417 2.24-2.613a42.247 42.247 0 014.478 0c1.29.196 2.24 1.331 2.24 2.613V12m-8.958 0h8.958" />
                //             </svg>
                //             Cetak PDF
                //         </a>
                //     '))
            ]);
    }
}
