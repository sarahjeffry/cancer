<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = [];
    protected $table = 'patients';
    protected $fillable = [
        'name', 'gender', 'mrn', 'type', 'height', 'weight', 'bmi', 'smoking', 'status', 'live', 'year', 'date_in'
    ];

    public function statdoses() {
        return $this->hasMany('App\StatDoses');
    }

    public function oral() {
        return $this->hasMany('App\Oral');
    }

    public function premedication() {
        return $this->hasMany('App\Premedication');
    }

    public function injection() {
        return $this->hasMany('App\Injection');
    }

    public function operation() {
        return $this->hasMany('App\Operation');
    }

    public function infusion() {
        return $this->hasMany('App\Infusion');
    }

    public function inhalation() {
        return $this->hasMany('App\Inhalation');
    }

    public function charts() {
        return $this->hasMany('App\Chart');
    }
}
