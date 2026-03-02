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

        if ($record) {
            $this->redirect(PerusahaanResource::getUrl('view', ['record' => $record]));

            return;
        }

        $this->redirect(PerusahaanResource::getUrl('create'));
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
