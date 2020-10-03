<?php

namespace App\Mail;
use App\Passanger;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomePassanger extends Mailable
{
    use Queueable, SerializesModels;

    public $passanger;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Passanger $passanger)
    {
        $this->passanger = $passanger ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.welcome-passanger');
    }
}
