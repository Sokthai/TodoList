<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = "pictures";
    protected $fillable = ['user_id', "todo_id", "desc_id", "image"];

    public function user(){
        return $this->belongto(User::class);
    }

    public function todo(){
        return $this->belongto(Todo::class);
    }

    public function description(){
        return $this->belongsTo(Description::class, 'desc_id');
    }

    public function scopeGetAllPictures($query, $picId){
        return $query->where('desc_id' , $picId);
    }

    public function getFirstImageName(){
        return $this->pluck('image')->first();
    }


}
