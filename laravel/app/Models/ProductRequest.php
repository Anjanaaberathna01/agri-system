<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    protected $fillable = [
        'supplier_id',
        'product_type',
        'title',
        'description',
        'price',
        'status',
        'image',
        'image2',
        'image3',
        'image4',
        'admin_notes',
        'reviewed_at',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'reviewed_at' => 'datetime',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }
}
