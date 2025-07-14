<?php

namespace App\Models;

use App\Trait\Ibrahim;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use Ibrahim;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'remind_at',
        'email_sent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
