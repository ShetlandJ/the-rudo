<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WrestlingPromotion extends Model
{
    protected $casts = [
        'active' => 'boolean'
    ];
}
