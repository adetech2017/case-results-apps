<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class AntigenImmediateMail extends Mailable
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

        $this->pdf = PDF::loadView('quick-antigen', ["result" => $check]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        return $this->subject('Covid-19 Antigen Result')
        ->markdown('email.antigen')
        ->with('mailData', $this->mailData)
        ->attachData($this->pdf->output(), $this->mailData['patient_name'] . ".pdf");
    }
}
