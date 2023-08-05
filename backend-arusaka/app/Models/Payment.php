<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = [
        'order_id',
        'transaction_id',
        'price',
        'payment_type',
        'expiry_time',
        'url',
        'status'
    ];
    public $timestamps = false;
}
