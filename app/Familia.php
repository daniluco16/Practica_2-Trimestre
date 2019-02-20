<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    public function Ciclos() {
        
        return $this->hasMany('App/Ciclo');
        
    }
}
