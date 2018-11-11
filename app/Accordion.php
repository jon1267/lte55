<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accordion extends Model
{
    protected $fillable = [
        'name', 'title', 'text'
    ];
}
