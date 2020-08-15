<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premedication extends Model
{
    protected $fillable = [
        'id','patient_id','date', 'time', 'drug_name', 'route', 'prescribed_by'
    ];
}
