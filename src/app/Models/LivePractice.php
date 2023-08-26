<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivePractice extends Model
{
    use HasFactory;
    protected $table = 'live_practices';
    protected $primaryKey = 'id';
    protected $fillable = [
        'courses_id',
        'title',
        'slug',
        'partiture',
        'time',
        'status'
    ];
    public $timestamps = false;
}
