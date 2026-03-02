<?php

namespace App\Filament\Resources\Perusahaans\Pages;

use App\Filament\Resources\Perusahaans\PerusahaanResource;
use App\Models\Perusahaan;
use Filament\Resources\Pages\ListRecords;

class ListPerusahaans extends ListRecords
{
    protected static string $resource = PerusahaanResource::class;

    public function mount(): void
    {
        parent::mount();

        $record = Perusahaan::query()->orderBy('id')->first();

        if (! $record) {
            $record = Perusahaan::query()->create([
                'nama' => 'PT. Charlyn Jaya',
                'created_by' => 1,
            ]);
        }

        $this->redirect(PerusahaanResource::getUrl('view', ['record' => $record]));
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
