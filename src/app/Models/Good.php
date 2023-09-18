<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;
    protected $table = 'goods';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'link',
        'description',
        'status',
        'image',
        'price',
    ];
    public $timestamps = false;
}
