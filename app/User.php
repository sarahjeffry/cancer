<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use function foo\func;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'staff_id','last_online_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_online_at' => 'datetime'
    ];

    public function patients() {
        return $this->hasMany(Patient::class);
    }

    public function stat_doses() {
        return $this->hasMany(StatDoses::class);
    }
    public function premedication() {
        return $this->hasMany(Premedication::class);
    }
    public function oral() {
        return $this->hasMany(Oral::class);
    }
    public function injection() {
        return $this->hasMany(Injection::class);
    }
    public function operations() {
        return $this->hasMany(Operation::class);
    }
    public function charts() {
        return $this->hasMany(Chart::class);
    }
    public function inhalation() {
        return $this->hasMany(Inhalation::class);
    }

    public function setImgProfileAttribute($value) {
        $this->attributes['img_profile'] = asset($value);
    }

    public function getImgProfileAttribute($value) {
        return asset($value);
    }
}
