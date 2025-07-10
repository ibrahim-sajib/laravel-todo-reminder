<?php


namespace App\Jobs;

use App\Mail\TodoReminderMail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use App\Models\EmailLog;
use App\Models\Todo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendTodoReminderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $todo;

    public function __construct($todo)
    {
        $this->todo = $todo;
    }

    public function handle(): void
    {
        $todo = $this->todo;

        if (!$todo || $todo->email_sent || !$todo->user) return;

        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        if (!$response->successful()) {
            \Log::error('Failed to fetch API data');
            return;
        }

        $titles = collect($response->json())->take(10)->pluck('title');
        $csv = implode("\n", $titles->toArray());
        $csvPath = storage_path('app/titles.csv');
        file_put_contents($csvPath, $csv);

        // Send email
        Mail::to($todo->user->email)->send(new TodoReminderMail($todo, $csvPath));

        // Log email
        EmailLog::create([
            'to' => $todo->user->email,
            'subject' => 'Reminder: ' . $todo->title,
            'body' => 'Reminder email sent with CSV.',
        ]);

        $todo->update(['email_sent' => true]);
    }
}
