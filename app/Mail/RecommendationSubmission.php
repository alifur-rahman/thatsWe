<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RecommendationSubmission extends Mailable
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

        $subject = __('messages.new_rec', [], $userLanguage);
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->view('emails.recommendation-submission')
            ->subject($subject);
    }
}
