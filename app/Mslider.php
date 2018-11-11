<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mslider extends Model
{
    protected $fillable = [
        'title', 'description', 'p1', 'p2', 'p3', 'p4', 'p5', 'price', 'img'
    ];

    protected $casts = [
        'price' => 'integer'
    ];
}
