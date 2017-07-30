<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reset extends Model
{
    protected $table = 'password_resets';
    protected $fillable = [
        'email', 'token', 'token', 'firstQuestion', 'firstAnswer',
        'secondQuestion', 'secondAnswer', 'thirdQuestion', 'thirdAnswer', 'user_id'
    ];



    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }



    public function getRouteKeyName()
    {
     return 'token';
    }
}
