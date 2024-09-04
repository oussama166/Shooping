<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgetPaswordMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user_nom;
    public $user_prenom;
    public $reset_code;
    /**
     * Create a new message instance.
     */
    public function __construct($user_nom,$user_prenom,$reset_code)
    {
        $this->user_nom=$user_nom;
        $this->user_prenom=$user_prenom;
        $this->reset_code=$reset_code;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Forget Pasword Mail',
        );
    }

    public function bluid()
    {
        return $this->markdown('emails.auth.forget_password_mail')->with(['user_nom'=>$this->user_nom,'user_prenom'=>$this->user_prenom,
        'reset_code'=>$this->reset_code]);
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.auth.forget_password_mail',
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
