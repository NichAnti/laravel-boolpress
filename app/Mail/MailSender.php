<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailSender extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $title;
    public $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $title, $cont)
    {
        $this->username = $username;
        $this->title = $title;
        $this->content = $cont;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.test-mail');
    }
}
