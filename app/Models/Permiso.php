<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;
    //muchos a muchos con roles
    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
