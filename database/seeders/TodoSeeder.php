<?php

namespace Database\Seeders;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Todo::create([
            'user_id' => 1,
            'title' => 'Demo Todo from TodoSeeder',
            'description' => 'Seeder created todo item.',
            'remind_at' => Carbon::now()->addMinutes(2),
            'email_sent' => false,
        ]);
    }
}
