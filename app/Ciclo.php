<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    public function Usuarios() {
        
        return $this->hasMany('App/User');
        
    }
    
    public function FamiliaProfesional() {
        
        return $this->belongsTo('App/Familia', 'FP_idFP');
        
    }
}
