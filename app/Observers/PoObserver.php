<?php

namespace App\Observers;

use App\Mail\PoApprovedMail;
use App\Models\Po;
use Illuminate\Support\Facades\Mail;

class PoObserver
{
    /**
     * Handle the Po "updated" event.
     */
    public function updated(Po $po): void
    {
        // In "updated" event, use wasChanged() to check persisted changes.
        if ($po->wasChanged('status') && $po->status === 'approve') {
            $user = $po->createdBy;

            if ($user && $user->email) {
                // Queue setelah commit agar job tidak dieksekusi sebelum data benar-benar tersimpan.
                Mail::to($user->email)->queue((new PoApprovedMail($po))->afterCommit());
            }
        }
    }
}
