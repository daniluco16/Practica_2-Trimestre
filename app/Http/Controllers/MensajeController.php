<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensaje;
use App\User;
use Auth;

class MensajeController extends Controller {

    public function enviar_mensaje(Request $request) {

//        $validator = $this->validate($request->all(), [
//                    "destinatarios" => "required|array|min:3",
//                    "destinatarios.*" => "required|string|distinct|min:3",
//        ]);

        $titulo = $request->input('titulo');
        $contenido = $request->input('contenido');
        $destinatarios = $request->input('destinatarios');
        $remitente = Auth::User()->id;

        foreach ($destinatarios as $destinatario) {

            $nuevo_mensaje = new Mensaje();

            $nuevo_mensaje->destinatario = $destinatario;
            $nuevo_mensaje->titulo = $titulo;
            $nuevo_mensaje->contenido = $contenido;
            $nuevo_mensaje->users_id = $remitente;

            $nuevo_mensaje->save();
        }

        return redirect('/');
    }

    public function listar_mensaje() {

        $user = \Auth::User();

        if($user->rol != 'Admin'){
            
            $mensajes = Mensaje::where('destinatario', $user->name)->paginate(3);
            
        } else {
        
            $mensajes = Mensaje::orderBy('created_at', $user->created_at)->paginate(3);
            
        }
        

        return view('bandeja_entrada', [
            'mensajes' => $mensajes,
        ]);
    }

    public function delete($id) {
        
        $mensaje = Mensaje::find($id);
                
        $mensaje->delete();
        
        return redirect()->route('listado_mensaje');
    }

}
