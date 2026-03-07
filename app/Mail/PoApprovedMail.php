<?php

namespace App\Mail;

use App\Models\Po;
use App\Models\Perusahaan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PoApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $po;
    public $perusahaan;
    public $logoBase64;

    /**
     * Create a new message instance.
     */
    public function __construct(Po $po)
    {
        $this->po = $po;
        $this->perusahaan = Perusahaan::query()
            ->orderBy('id')
            ->first(['nama', 'alamat', 'email', 'no_wa', 'logo']);

        // Persiapkan Logo Base64 agar muncul di email meskipun testing lokal
        $logoPath = public_path('assets/logo.png');
        if (file_exists($logoPath)) {
            $logoData = base64_encode(file_get_contents($logoPath));
            $this->logoBase64 = 'data:image/png;base64,' . $logoData;
        }
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Purchase Order Approved - ' . $this->po->no_po,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.po-approved',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
