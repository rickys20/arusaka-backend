<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table = 'materials';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'video',
        'description',
        'content',
        'courses_id',
    ];
    public $timestamps = false;

    public function materialOrders()
    {
        return $this->hasMany(MaterialOrder::class, 'material_id', 'id');
    }
}
