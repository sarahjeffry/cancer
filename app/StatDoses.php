<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatDoses extends Model
{
    protected $fillable = [
        'date', 'time', 'drug', 'dose_value', 'dose_unit'
    ];
}
