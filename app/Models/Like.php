<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_video'
    ];

    public $timestamps = false;

    public function vid_lik()
    {
        return $this->hasMany(Video::class, 'id_video');
    }
}
