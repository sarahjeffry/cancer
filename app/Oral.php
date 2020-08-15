<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oral extends Model
{
    protected $fillable = [
        'id','patient_id','date', 'time', 'drug_name', 'dose_value', 'dose_unit','frequency','duration', 'prescribed_by'
    ];
}
