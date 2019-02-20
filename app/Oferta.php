<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    public function Usuario() {
        
        return $this->belongsTo('App/User', 'users_id');
        
    }
}
