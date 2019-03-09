<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
       'nif','rol','name','surname', 'email','nick','telefono_movil','departamento','blog','github', 'password','provider', 'provider_id', 'image_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
   
    
    public function ciclos() {
        
        return $this->hasMany('App\Ciclo');
        
    }
    public function mensajes() {
        
        return $this->hasMany('App\Mensaje');
        
    }
    public function ofertas() {
        
        return $this->hasMany('App\Oferta');
        
    }
    public function curriculum() {
        
        return $this->hasOne("App\Curriculum" , "users_id");
        
    }
}
