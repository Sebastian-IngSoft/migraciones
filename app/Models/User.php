<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //uno a uno con la tabla profiles
    //convencion en singular porque tiene un solo perfil
    public function profile(){
        //$profile = Profile::where('user_id'),$this->id->first();
        return $this->hasOne(Profile::class);//hace lo mismo con lo de arriba
    }

    //UNO A MUCHOS
    public function posts(){//plural porque es muchos
        return $this->hasMany(Post::class);

    }
    public function videos(){//plural porque es muchos
        return $this->hasMany(Video::class);

    }

    //muchos a muchos con role
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    //uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
