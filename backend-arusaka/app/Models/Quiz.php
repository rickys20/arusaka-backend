<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'quizzes';
    protected $primarykey = "id";
    protected $fillable = [
        'quiz_name',
        'slug',
        'course_id',
        'minimum_material',
        'desc'
    ];
}
