<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function todo(){
        return $this->hasMany(Todo::class, 'user_id');
    }

    public function image(){
        return $this->hasMany(Picture::class);
    }

    public function reset(){
        return $this->hasOne(Reset::class, 'user_id');
    }

}
