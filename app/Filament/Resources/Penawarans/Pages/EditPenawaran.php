<?php

namespace App\Filament\Resources\Penawarans\Pages;

use App\Filament\Resources\Penawarans\PenawaranResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPenawaran extends EditRecord
{
    protected static string $resource = PenawaranResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['status'])) {
            $data['status'] = $this->record?->status ?? 'pending';
        }

        return $data;
    }

    protected function authorizeAccess(): void
    {
        parent::authorizeAccess();

        if ($this->record?->status === 'po') {
            abort(403);
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            // DeleteAction::make()
            //     ->visible(fn (): bool => $this->record?->status !== 'approve'),
            // ForceDeleteAction::make()
            //     ->visible(fn (): bool => $this->record?->status !== 'approve'),
            // RestoreAction::make()
            //     ->visible(fn (): bool => $this->record?->status !== 'approve'),
        ];
    }
}
