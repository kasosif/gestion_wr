<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMailGw extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    protected $plainpass;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $plainpass)
    {
        $this->user = $user;
        $this->plainpass = $plainpass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('administration@gs.com')
            ->subject('Bienvenue à GestionWr')
            ->view('mails.welecomegw',['user' => $this->user, 'plainpass' => $this->plainpass]);
    }
}
