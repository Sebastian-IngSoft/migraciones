<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    //uno a muchos
    public function posts(){//Plural
        return $this->hasMany(Post::class);
    }
}
