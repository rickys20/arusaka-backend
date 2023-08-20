<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivePracticeOrder extends Model
{
    use HasFactory;
    protected $table = 'live_practice_orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'live_practice_id',
        'status'
    ];
    public $timestamps = false;
}
