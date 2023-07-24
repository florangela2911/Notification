<?php

namespace App\Mail;

use App\Models\usuarios_gs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $base;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(usuarios_gs $base)
    {
        $this->base = $base;
    }


    public function build()
    {
        return $this->view('mail.expenseReport')->withStatus('Correo electrónico enviado a los destinatarios.');
    }


   
    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Email Received',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
    
}
