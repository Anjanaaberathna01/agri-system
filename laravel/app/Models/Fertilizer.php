<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fertilizer extends Model
{
    protected $fillable = [
        'title',
        'price',
        'image',
        'image2',
        'image3',
        'image4',
        'description',
        'status',
    ];
}
