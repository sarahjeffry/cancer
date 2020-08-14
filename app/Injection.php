<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Injection extends Model
{
    protected $fillable = [
        'id','patient_id','date', 'time', 'route', 'drug_name', 'dose_value', 'dose_unit'
    ];
}
