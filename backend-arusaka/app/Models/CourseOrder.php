<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseOrder extends Model
{
    use HasFactory;
    protected $table = 'course_orders';
    protected $fillable = [
        'id',
        'users_id',
        'courses_id',
        'payments_id',
    ];
    public $timestamps = false;

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

}
