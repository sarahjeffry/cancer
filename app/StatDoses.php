<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatDoses extends Model
{
    protected $fillable = [
        'id','patient_id','date', 'time', 'drug_name', 'dose_value', 'dose_unit'
    ];
}
