<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FailedIncfilePostJobEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //\Log::debug('Failed Incfile Post Job');
        //\Log::debug($this->event->job->resolveName());

        return $this->from(env('FAILED_MAIL_INCFILE_FROM'))
            ->subject('Failed Incfile Post Job')
            ->markdown('mails.failedincfilepostjob', ['data'=>$this->event]);


    }
}
