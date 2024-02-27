<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $details)
    {
        $this->order=$order;
        $this->details=$details;
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Invoice From Ecomart!')->view('mail.invoice');
    }
}
