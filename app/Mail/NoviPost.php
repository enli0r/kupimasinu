<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NoviPost extends Mailable
{
    use Queueable, SerializesModels;

    public $naziv;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($naziv)
    {
        $this->naziv = $naziv;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.new-post', [
            'url' => 'http://192.168.0.100/kupimasinu/public/oglasi?tip='.$this->naziv
        ]);
    }
}
