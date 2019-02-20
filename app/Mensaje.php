<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    public function Mensaje() {
        
        return $this->belongsTo('App/User', 'users_id');
        
    }
}
