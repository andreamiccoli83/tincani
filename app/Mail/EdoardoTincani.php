<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EdoardoTincani extends Mailable
{
    use Queueable, SerializesModels;

    public $fields;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fields)
    {
        $this->fields = $fields;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->fields['email'];
        $name = $this->fields['name_surname'];
        $message = $this->fields['message'];


        {
            return $this->from($email, $name, $message)->subject(__('mails.to.tincani.subject'))->view('mail')
                ->with(['fields' => $this->fields]);
        }

    }
}
