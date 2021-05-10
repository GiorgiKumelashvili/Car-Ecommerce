<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailContact extends Mailable {
    use Queueable, SerializesModels;

    public string $fromEmail;
    public string $name;
    public string $text;

    public function __construct(string $fromEmail, string $name, string $text) {
        $this->fromEmail = $fromEmail;
        $this->name = $name;
        $this->text = $text;
    }

    public function build(): MailContact {
        $subject = 'Contact from car-ecommerce';

        return $this
            ->from($this->fromEmail)
            ->subject($subject)
            ->view('email.contact');
    }
}
