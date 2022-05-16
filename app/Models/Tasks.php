<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Tasks extends Model
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'position',
        'title',
        'description',
        'date_create',
        'date_todo',
        'tag_id',
        'user_create_id',
        'comment_id',
        'creator',
        'status',
        'theme',
        'comment',
        'favorite',
        'from_advertisers'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
        return $this->belongsTo(User::class, 'user_create_id', 'id');
    }

    public function tags()
    {
        return $this->belongsTo(Tags::class, 'tag_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(CommentToTask::class, 'task_id', 'id');
    }
}
