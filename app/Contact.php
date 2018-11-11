<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'title', 'p1', 'p2', 'p3', 'description', 'img'
    ];
}
