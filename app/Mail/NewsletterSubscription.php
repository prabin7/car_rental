<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ContactMessage;

class NewsletterSubscription extends Mailable
{
    use Queueable, SerializesModels;
    
    public $contactMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct(ContactMessage $contactMessage)
    {
        //
        $this->contactMessage = $contactMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->contactMessage->email;
        return $this->from($email , 'Charity')->subject('Email Subscription')->view('mail.newsletter');
    }
}
