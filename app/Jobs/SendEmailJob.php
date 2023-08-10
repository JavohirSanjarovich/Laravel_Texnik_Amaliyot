<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\ApplicationCreated;
use App\Models\Application;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Application $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function handle()
    {
        $manager = User::first();

        Mail::to($manager)->send(new ApplicationCreated($this->application));
    }
}
