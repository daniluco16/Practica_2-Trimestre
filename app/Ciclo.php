<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    protected  $table = 'cf';
    
    public function users() {
        
        return $this->hasMany('App\User');
        
    }
    
    public function familia() {
        
        return $this->belongsTo('App\Familia', 'FP_id');
        
    }
}
