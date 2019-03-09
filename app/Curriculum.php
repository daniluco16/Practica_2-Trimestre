<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = 'curriculum';
    
    public function user() {
        
        return $this->belongsTo('App\User', 'users_id');
        
    }
}
