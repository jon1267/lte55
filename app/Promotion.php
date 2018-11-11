<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'title', 'p1', 't1', 'p2', 't2', 'p3', 't3',
    ];
}
