<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo_page extends Model
{
    protected $fillable = [
        'page', 'slug', 'title', 'h1',
        'meta_description', 'meta_keywords',
    ];
}
