<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizOrder extends Model
{
    use HasFactory;
    protected $table = 'quiz_orders';
    protected $primarykey = "id";
    protected $fillable = [
        'question',
        'answers',
        'content',
        'a',
        'b',
        'c',
        'd',
        'solution',
        'explanation',
        'finish_at',
        'score'
    ];
}
