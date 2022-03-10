<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class PcrImmeditate extends Mailable
{
    use Queueable, SerializesModels;
    public $check;
    public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($check)
    {
        $this->mailData = $check;

        $this->pdf = PDF::loadView('pcr-instant', ["result" => $check]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Covid-19 PCR Result')
            ->markdown('email.mail')
            ->with('mailData', $this->mailData)
            ->attachData($this->pdf->output(), $this->mailData['patient_name'].".pdf");
    }
}
