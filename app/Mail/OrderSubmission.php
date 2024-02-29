<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderSubmission extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;
    public $pdfData;



    public function __construct($formData, $pdfData = null)
    {
        $this->formData = $formData;
        $this->pdfData = $pdfData;
    }


    public function build()
    {
        $userLanguage = app()->getLocale();

        $subject = __('Order', [], $userLanguage);
        $mail = $this->from(config('mail.from.address'), config('mail.from.name'))->subject($subject)->view('emails.order-submission');

        if ($this->pdfData) {
            $mail->attachData($this->pdfData, 'order_confirmation.pdf', [
                'mime' => 'application/pdf',
            ]);
        }

        return $mail;
    }
}
