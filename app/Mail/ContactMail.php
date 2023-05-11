<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\View;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array
     */
    private array $mailData;

    public function __construct(array $mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.contact', [
            'name'  => $this->mailData['name'],
            'email' => $this->mailData['email'],
            'text'  => $this->mailData['message']
        ]);
    }
}
