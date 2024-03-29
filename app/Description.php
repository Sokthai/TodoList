<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Todo;
class Description extends Model
{
    protected $table = 'desc';
    protected $fillable = ['description', 'comment', 'todo_id'];

    public function todo(){
        return $this->belongsTo(Todo::class);
    }

    public function image(){ //refer by "image" name in tinker
        return $this->hasMany(Picture::class, 'desc_id');
    }


    public function getLastDescription(){
        return $this->pluck('description')->last();
    }

}
