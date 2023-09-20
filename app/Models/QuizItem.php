<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizItem extends Model
{
    use HasFactory;
    protected $table = 'quiz_items';
    protected $primarykey = "id";
    protected $fillable = [
        'quiz_id',
        'course_id',
        'content',
        'a',
        'b',
        'c',
        'd',
        'solution',
        'explanation'
    ];
}
