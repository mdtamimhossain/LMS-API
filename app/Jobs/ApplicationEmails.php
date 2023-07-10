<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ApplicationEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email;
    private $name;
    private $content;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $email, string $name,$content)
    {
        $this->email = $email;
        $this->name = $name;
        $this->content = $content;

    }

    /**
     * Execute the job.
     *
     * @return void
     */public function handle()
{
    $email = $this->email;
    $name = $this->name;
    $subject = 'Verification Code';
    $content=$this->content;
    Mail::raw($content, function ($message) use ($email, $name, $subject) {
        $message->from('lms@gmail.com', 'lms');
        $message->to($email, $name)->subject($subject);
    });
}
}
