<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumb',
        'price',
        'sale_date',
        'type',
        'series',
        'description',
        'slug',
    ];
}
