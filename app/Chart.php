<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    protected $fillable = [
        'id','patient_id','treatment', 'iv_infusion', 'diet', 'chart_img', 'prescribed_by'
    ];
}
