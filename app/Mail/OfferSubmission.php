<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OfferSubmission extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    public function build()
    {
        $userLanguage = app()->getLocale();

        $subject = __('messages.info_material', [], $userLanguage);
        return $this->from(config('mail.from.address'), config('mail.from.name'))->subject($subject)->view('emails.offer-submission');
    }
}
