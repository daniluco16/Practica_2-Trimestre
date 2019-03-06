<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected  $table = 'mensaje';
    
    public function user() {
        
        return $this->belongsTo('App\User', 'users_id');
        
    }
    
    protected $fillable = [
       'destinatario','titulo','contenido','users_id'
    ];
    
}
