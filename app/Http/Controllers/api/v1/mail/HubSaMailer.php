<?php

namespace App\Http\Controllers\api\v1\mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HubSaMailer extends Mailable {

    use Queueable,
        SerializesModels;

    public $mailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($formData) {
        $this->mailData = $formData;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        $subject = $this->mailData['subject'];
        return $this->view('mail.otp_mail')->subject($subject)->with(['data' => $this->mailData]);
//        return $this->view('mail.Test_mail')->with(['data' => $this->mailData]);
    }

}
