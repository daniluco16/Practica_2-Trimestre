<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected  $table = 'ofertas';
    
    protected $primaryKey = 'idofertas';
    
    public function user() {
        
        return $this->belongsTo('App\User', 'users_id');
        
    }
    
    protected $fillable = [
       'nombre_empresa','telefono_empresa','email_empresa',
        'descripcion', 'direccion_empresa','users_id'
    ];
}
