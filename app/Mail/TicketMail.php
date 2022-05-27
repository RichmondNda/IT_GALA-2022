<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketMail extends Mailable
{
    use Queueable, SerializesModels;
    public $maildata;
    public $pdf;
    public $pdf_nom;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($maildata, $pdf, $pdf_nom)
    {
        $this->maildata = $maildata;
        $this->pdf = $pdf ;
        $this->pdf_nom = $pdf_nom;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.ticket-mail')
                ->with('maildata', $this->maildata)
                ->subject("IT GALA 2022")
                ->attachData($this->pdf->output(), $this->pdf_nom.".pdf");
    }
}
