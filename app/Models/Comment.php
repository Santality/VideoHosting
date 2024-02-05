<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'text',
        'video',
    ];

    public function user_com()
    {
        return $this->belongsTo(User::class, 'user');
    }
}
