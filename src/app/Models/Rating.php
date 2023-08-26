<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    protected $fillable = [
        'rating',
        'comment',
        'courses_id',
        'users_id',
    ];

    public function courses()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }
}
