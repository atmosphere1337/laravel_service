<?php

namespace App\Mail;

use App\Models\Person;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Mailer extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(protected Person $person){}
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New person. Notification',
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'mail_page',
			with: [
				'name' => $this->person->name,
				'number' => $this->person->number,
				'mail' => $this->person->mail,
			],
        );
    }
    public function attachments(): array
    {
        return [];
    }
}
