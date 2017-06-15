<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ContactMessage;

class MessageDelivered extends Mailable
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
        $name = $this->contactMessage->name;
        return $this->from($email , $name)->subject('Message')->view('mail.index');
    }
}
