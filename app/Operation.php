<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = [
        'id','patient_id','date', 'time', 'operation', 'diagnosis', 'shaving','anaesthetist','diet'
    ];
}
