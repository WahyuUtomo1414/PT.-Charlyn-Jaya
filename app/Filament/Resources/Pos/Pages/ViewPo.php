<?php

namespace App\Filament\Resources\Pos\Pages;

use App\Filament\Resources\Pos\PoResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPo extends ViewRecord
{
    protected static string $resource = PoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->visible(fn (): bool => $this->record?->status !== 'approve'),
        ];
    }
}
