<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_category',
    ];

    public function video()
    {
        return $this->hasMany(Video::class, 'category');
    }
}
