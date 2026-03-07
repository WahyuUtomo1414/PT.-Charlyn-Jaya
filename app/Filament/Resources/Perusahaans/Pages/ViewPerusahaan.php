<?php

namespace App\Filament\Resources\Perusahaans\Pages;

use App\Filament\Resources\Perusahaans\PerusahaanResource;
use App\Mail\PoApprovedMail;
use App\Models\Po;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Mail;

class ViewPerusahaan extends ViewRecord
{
    protected static string $resource = PerusahaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('testSendEmail')
                ->label('Test Send Email (PO)')
                ->icon('heroicon-o-envelope')
                ->color('warning')
                ->requiresConfirmation()
                ->modalHeading('Kirim Email Uji Coba')
                ->modalDescription('Apakah anda yakin ingin mengirim email uji coba PO Approved ke kinnoubucrouzeu-8334@yopmail.com?')
                ->action(function () {
                    $testEmail = 'kinnoubucrouzeu-8334@yopmail.com';
                    $user = auth()->user();
                    
                    // Create dummy PO for testing (not saved to DB)
                    $dummyPo = new Po([
                        'no_po' => 'PO-DUMMY-' . now()->format('YmdHis'),
                        'status' => 'approve',
                        'catatan' => 'Ini adalah catatan email uji coba (Synchronous).',
                    ]);
                    
                    // Manually set relations
                    $dummyPo->setRelation('createdBy', $user);
                    
                    $penawaran = \App\Models\Penawaran::first();
                    if ($penawaran) {
                        $dummyPo->setRelation('penawaran', $penawaran);
                    }

                    try {
                        // Gunakan Mail::to()->send() secara langsung
                        // Agar tidak masuk queue (karena data dummy tidak bisa di-serialize ke DB queue)
                        Mail::to($testEmail)->send(new PoApprovedMail($dummyPo));
                        
                        Notification::make()
                            ->title('Email berhasil dikirim')
                            ->body('Email uji coba telah dikirim secara langsung ke: ' . $testEmail)
                            ->success()
                            ->send();
                    } catch (\Exception $e) {
                        Notification::make()
                            ->title('Gagal mengirim email')
                            ->body('Terjadi kesalahan: ' . $e->getMessage())
                            ->danger()
                            ->send();
                    }
                }),
        ];
    }
}
