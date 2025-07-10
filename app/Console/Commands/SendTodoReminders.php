<?php

namespace App\Console\Commands;

use App\Jobs\SendTodoReminderJob;
use App\Models\Todo;
use Illuminate\Console\Command;

class SendTodoReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-todo-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $todos = Todo::where('email_sent', false)
        ->where('remind_at', '>=', now())
        ->where('remind_at', '<=', now()->addMinutes(10))->get();  
        
        foreach ($todos as $todo) {
            dispatch(new SendTodoReminderJob($todo));
        }
    }
}
