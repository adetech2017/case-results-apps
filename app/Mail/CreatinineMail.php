<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class CreatinineMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;
    public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;

        $this->pdf = PDF::loadView('psa-urea-resultsheet', ["result" => $mailData]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Creatinine Test Screening')
            ->markdown('email.creatinine-mailer')
            ->with('mailData', $this->mailData)
            ->attachData($this->pdf->output(), $this->mailData->patient_name.".pdf");
    }
}
