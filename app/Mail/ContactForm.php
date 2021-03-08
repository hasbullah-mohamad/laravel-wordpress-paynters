<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $phone;
    public $email;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $phone, $email, $message)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact_form', [
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'text' => $this->message,
        ]);
    }
}
