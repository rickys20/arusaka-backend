<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class user extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;


    protected $primaryKey = 'id';

    // TODO: add pendidikan
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'role',
        'mobile_phone',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'ratings', 'users_id', 'courses_id')
                    ->as('ratings')
                    ->withPivot('rating, comment');
    }

    public function courses2(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_orders', 'users_id', 'courses_id')
                    ->as('orders')
                    ->withPivot('payments_id');
    }
}
