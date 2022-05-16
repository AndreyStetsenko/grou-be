<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CommentToTask extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'comment_to_task';
    protected $fillable = [
        'comment',
        'task_id',
        'user_id',
        'user_name',
    ];

    public function tasks()
    {
        return $this->belongsTo(Tasks::class, 'task_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
