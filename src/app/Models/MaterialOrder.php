<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaterialOrder extends Model
{
    use HasFactory;
    protected $table = 'material_orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'courses_id',
        'material_id',
        'user_id',
        'status',
    ];

    public function materials(): BelongsTo
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }
}
