<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionary extends Model
{
    use HasFactory;

    protected $table = 'users_main_data';
    protected $fillable = [
        'user_id',
        'person_aim',
        'main_chanels'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
