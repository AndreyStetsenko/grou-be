<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tags extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'tag',
        'tag_color'
    ];

    public function tasks()
    {
        return $this->belongsTo(Tags::class, 'tag_id', 'id');
    }
}