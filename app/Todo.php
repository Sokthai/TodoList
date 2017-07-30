<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Todo extends Model
{
    protected $table = "todo";
    protected $fillable = [ 'type', 'name', 'description', 'complete', 'user_id', 'comment', 'closing' , 'path'];


    public function description(){
        return $this->hasMany(Description::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function getAllDataCurrentUser(){
        return static:: where('user_id', Auth::user()->id)->latest()->get();
    }


    public function scopeGetAllCurrentUser($query){
        return $query->where('user_id' , Auth::user()->id);
    }

    public function scopeGetAllType(){
        return $this->select('type')->where('user_id', Auth::user()->id);
    }

    public function scopeGetDeleteRecords($query, $IDs){
        return $query->wherein('id', $IDs);
    }


    public static function getSubsetRecord($offset = 0){
        return static::where('user_id', Auth::user()->id)->skip($offset)->take(10)->latest()->get();
    }


    public function getRouteKeyName()
    {
        return 'name';
    }







}
