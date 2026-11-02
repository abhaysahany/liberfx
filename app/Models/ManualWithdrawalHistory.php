<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualWithdrawalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'member_name',
        'request_date',
        'wallet_address',
        'coin',
        'usdt',
        'gross_amount',
        'charges',
        'net_amount',
        'wallet_type',
        'payment_date',
        'status',
        'remarks',
        'created_by',
        'request_id',
    ];
}
