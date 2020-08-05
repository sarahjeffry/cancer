<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name', 'gender', 'mrn', 'type', 'height', 'weight', 'bmi', 'smoking', 'status', 'live', 'year'
    ];
}
