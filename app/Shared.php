<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shared extends Model
{
    protected $fillable = ['title', 'description', 'text', 'img'];
}
