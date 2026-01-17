<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'total_amount',
        'cod_fee',
        'payment_method',
        'status',
        'items',
        'shipping_address',
        'phone',
    ];

    protected $casts = [
        'items' => 'array',
        'total_amount' => 'decimal:2',
        'cod_fee' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getGrandTotalAttribute()
    {
        return $this->total_amount + $this->cod_fee;
    }
}
