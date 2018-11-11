<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'title', 'price', 'mo', 'yearly', 'hdd',
        'bandwidth', 'ram', 'ip', 'cpanel', 'os',
    ];
}
