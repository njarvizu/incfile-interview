<?php

namespace App\Providers;

//use App\Jobs\IncFilePost;
use App\Mail\FailedIncfilePostJobEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobFailed;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Queue::failing(function (JobFailed $event) {
            Mail::to(env('FAILED_MAIL_INCFILE_FROM'))->send(new FailedIncfilePostJobEmail($event));
        });
    }
}
