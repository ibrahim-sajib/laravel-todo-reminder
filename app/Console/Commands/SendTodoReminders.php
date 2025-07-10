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
         dispatch(new \App\Jobs\SendTodoReminderJob());
        // $todos = \App\Models\Todo::where('email_sent', false)
        //     ->where('remind_at', '<=', now()->addMinutes(1))
        //     ->get();

        // foreach ($todos as $todo) {
           
        // }
    }
}
