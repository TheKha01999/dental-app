<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'bookings';
    protected $fillable = [
        'user_id',
        'branch_id',
        'service_id',
        'doctor_id',
        'status_code',
        'time_code',
        'date',
        'created_at',
        'updated_at',
    ];
}
