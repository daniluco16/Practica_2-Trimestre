<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Usuarios_inactivos;

class UserController extends Controller
{
    
    
    public function listado() {
        
        $users = User::orderBy('rol', 'asc')->paginate(5);
        
//        $users_inac = Usuarios_inactivos::orderBy('created_at', 'asc')->paginate(3);
        
        
        return view('listado', [
            
            'users' => $users,
//            'users_inac' => $users_inac
        ]);
        
    }
    
    
    public function listado_activo() {
        
        $users_inac = Usuarios_inactivos::orderBy('created_at', 'asc')->paginate(5);
        
        
        return view('listado_activos', [
            
            'users_inac' => $users_inac
            
        ]);
        
    }
    
    public function perfil() {
        
        $user = \Auth::user();
        
        return view('perfil', ['user' => $user]);
    }
    
    public function borrar_activos($id) {
        
        $user = \Auth::user();
        
        $user_act = User::find($id);
        
        
        if($user && $user->rol == 'Admin'){
            
            $user_act->delete();
            
        }
        
        return redirect('listado');
        
    }
    
    public function borrar_inactivos($id) {
        
        $user = \Auth::user();
        
        $user_inac = Usuarios_inactivos::find($id);
        
        
        if($user && $user->rol == 'Admin'){
            
            $user_inac->delete();
            
        }
        
        return redirect('listado_activos');
        
    }
    
    public function confirmar_registro($id) {
        
        $user = \Auth::user();
        
        $user_inac = Usuarios_inactivos::find($id);
        
        $user_act = $user_inac;
        
        var_dump($user_act);
        
        die();
        
        if($user && $user->rol == 'Admin'){
            
            $user_inac->delete();
            
        }
        
        
    }
}