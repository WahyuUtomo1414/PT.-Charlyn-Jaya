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
        if ($po->isDirty('status') && $po->status === 'approve') {
            $user = $po->createdBy;

            if ($user && $user->email) {
                // Gunakan Mail::to()->queue() agar pengiriman otomatis tetap lewat antrian
                Mail::to($user->email)->queue(new PoApprovedMail($po));
            }
        }
    }
}
