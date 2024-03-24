<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;
    /**
     * Create a new message instance.
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->view('backend.email.custom') // Blade template for the email
        ->subject($this->mailData['subject'])
        ->from(config('mail.from.address'), config('mail.from.name')) // Use configured sender details
        ->to($this->mailData['email']);
        
    }
}
