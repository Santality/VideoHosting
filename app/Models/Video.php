<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'file_name',
        'cover',
        'category',
        'user',
        'limit',
    ];

    public function category_vid()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function limit_vid()
    {
        return $this->belongsTo(Limit::class, 'limit');
    }
}
