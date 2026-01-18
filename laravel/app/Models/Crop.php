<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    protected $fillable = [
        'name',
        'type',
        'description',
        'price',
        'rating',
        'reviews',
        'status',
        'image_folder',
    ];
}
