<?php

namespace App\Filament\Resources\Penawarans\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PenawaransTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('layanan.nama')
                    ->label('Layanan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('nama_perusahaan')
                    ->label('Perusahaan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('quantity')
                    ->label('Qty')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('deadline_pengerjaan')
                    ->label('Deadline')
                    ->date()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'proses' => 'info',
                        'selesai' => 'success',
                        'batal' => 'danger',
                        default => 'gray',
                    })
                    ->searchable(),
                TextColumn::make('tanggal_permintaan')
                    ->label('Tgl Request')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('createdBy.name')
                    ->label('Dibuat Oleh')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                ViewAction::make(),
                Action::make('print')
                    ->label('Print')
                    ->icon('heroicon-m-printer')
                    ->visible(fn ($record): bool => $record->status === 'approve')
                    ->url(fn ($record): string => route('penawaran.print', $record))
                    ->openUrlInNewTab(),
                EditAction::make()
                    ->visible(fn ($record): bool => $record->status !== 'approve'),
            ])
            ->bulkActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make()
                //         ->action(function ($records): void {
                //             $records
                //                 ->reject(fn ($record) => $record->status === 'approve')
                //                 ->each->delete();
                //         }),
                //     ForceDeleteBulkAction::make(),
                //     RestoreBulkAction::make(),
                // ]),
            ]);
    }
}
