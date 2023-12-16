<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    //uno a muchos inverso  
    public function user(){
        return $this->belongsTo(User::class);
    }
    //uno a muchos polimorfica
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
        
    }
    //muchos a muchos polimorfica
    public function tags(){
        return $this->morphToMany(Tag::class,'taggables');
    }
}
