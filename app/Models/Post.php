<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //uno a muchos solo un usuario tiene un post
    public function user(){//singular
        return $this->belongsTo(User::class);

    }
    public function categoria(){//singular
        return $this->belongsTo(Categoria::class);

    }

    //uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
