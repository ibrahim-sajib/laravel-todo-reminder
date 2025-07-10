<?php

namespace App\Jobs;


use App\Mail\TodoReminderMail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use App\Models\EmailLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendTodoReminderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // $todo = $this->todo;

        // fetch titles from API
        // $response = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        // $titles = collect($response)->take(10)->pluck('title');

        // $csv = implode("\n", $titles->toArray());
        // $csvPath = storage_path('app/titles.csv');
        // file_put_contents($csvPath, $csv);

        Mail::to('test@example.com')->send(new TodoReminderMail());

        // log email
        // EmailLog::create([
        //     'to' => Auth::user()->email,
        //     'subject' => "Todo subject by custom",
        //     'body' => 'Reminder email sent with CSV.',
        // ]);

        // mark todo as email_sent
        // $todo->update(['email_sent' => true]);
    }
}
