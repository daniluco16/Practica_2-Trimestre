<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected  $table = 'fp';
    
    public function ciclos() {
        
        return $this->hasMany('App\Ciclo');
        
    }
  
}
