<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name', 'gender', 'mrn', 'type', 'height', 'weight', 'bmi', 'smoking', 'status', 'live', 'year'
    ];

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function guardian() {
        return $this->hasOne('App\User');
    }
}
