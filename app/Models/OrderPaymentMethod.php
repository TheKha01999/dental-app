<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderPaymentMethod extends Model
{
    use HasFactory, SoftDeletes;
    const STATUS_PENDING = 'pending';
    const STATUS_SUCCESS = 'success';
    protected $table = 'order_payment_methods';
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    protected $fillable = [
        'order_id',
        'payment_provider',
        'status',
        'total',
        'note'
    ];
}
