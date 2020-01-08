<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;

    /**
     * Create a new message instance.
     *
     * @param $message
     */
    public function __construct($message)
    {
        $this->content = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Message envoyé depuis le site web.');
        return $this->view('emails.contact-submitted')
            ->with([
                'nom' => $this->content['nom'],
                'email' => $this->content['email'],
                'texte' => $this->content['message']
            ]);
    }
}
