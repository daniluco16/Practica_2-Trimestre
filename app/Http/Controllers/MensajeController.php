<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MensajeController extends Controller
{
    public function envio() {
        
        return view('mensaje');
        
    }
}
