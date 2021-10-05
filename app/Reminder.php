<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $guarded = [];

    protected $casts = [
        'id' => 'string',
    ];
}
