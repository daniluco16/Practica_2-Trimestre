<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Oferta;
use Auth;

class OfertaController extends Controller {

    public function oferta() {

        $user = User::orderBy('created_at', 'asc')->get();

        return view('crearOferta', [
            'users' => $user
        ]);
    }

    public function crearOferta(Request $request) {

        $listaOfertas = $request->input('ofertas');

        $nombre = $request->input('nombre');
        $telefono = $request->input('telefono');
        $email = $request->input('email');
        $descripcion = $request->input('descripcion');
        $direccion = $request->input('direccion');
//        $oferta_user = $request->input('userOferta');
        

        foreach ($listaOfertas as $listaOferta) {

            $oferta = new Oferta();
            
            $oferta->users_id = $listaOferta;
            $oferta->nombre_empresa = $nombre;
            $oferta->telefono_empresa = $telefono;
            $oferta->email_empresa = $email;
            $oferta->descripcion = $descripcion;
            $oferta->direccion_empresa = $direccion;
        }

        $oferta::create([
            'nombre_empresa' => $nombre,
            'telefono_empresa' => $telefono,
            'email_empresa' => $email,
            'descripcion' => $descripcion,
            'direccion_empresa' => $direccion,
            'users_id' => $listaOferta
        ]);
        
        return view('home');
    }
    
    public function verOfertas() {

        $ofertas = Oferta::where('users_id', Auth::user()->id)->paginate(3);
        
        
        return view('listado_ofertas', [
            
            'ofertas' => $ofertas
            
        ]);
    }
    
    public function eliminar_oferta($id) {
        
        $ofertas = Oferta::find($id);
        
        $ofertas->delete();
        
        return view('home');
        
    }
   

}
