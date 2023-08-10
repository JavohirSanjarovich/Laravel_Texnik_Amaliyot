<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;


class ApplicationCreated extends Mailable
{
    use Queueable, SerializesModels;

    public Application $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function build()
    {
        $mail = $this->from ('example@example.com', 'Example')
        ->subject('Application Created')
        ->view('emails.application-created');

        if (! is_null($this->application->file_url)) {
            $mail->attachFromStorageDisk('public', $this->application->file_url);
    }

    return $mail;

}

}
