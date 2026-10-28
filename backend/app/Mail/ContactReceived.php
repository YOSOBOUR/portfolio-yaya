<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ContactReceived extends Mailable
{
    public function __construct(public ContactMessage $msg) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [new Address($this->msg->email, $this->msg->name)],
            subject: 'Portfolio : nouveau message de ' . $this->msg->name,
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.contact');
    }
}
