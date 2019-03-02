<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Usuarios_inactivos;

class UserController extends Controller {

    public function listado($ordenar = '', $campo = '', $search = '') {

        if (!empty($search)) {

            $users = User::where($campo, 'LIKE', '%' . $search . '%')
                    ->orderBy($ordenar, 'asc')
                    ->paginate(5);
        } else {

            $users = User::orderBy('rol', 'asc')->paginate(5);
        }


        return view('listado', [
            'users' => $users,
        ]);
    }

    public function listado_activo() {

        $users_inac = Usuarios_inactivos::orderBy('created_at', 'asc')->paginate(5);


        return view('listado_activos', [
            'users_inac' => $users_inac
        ]);
    }

    public function perfil($id) {

        $user = User::find($id);

        return view('perfil', ['user' => $user]);
        
//        $user = \Auth::user();
//
//        return view('perfil', ['user' => $user]);
    }

    public function borrar_activos($id) {

        $user = \Auth::user();

        $user_act = User::find($id);


        if ($user && $user->rol == 'Admin') {

            $user_act->delete();
        }

        return redirect('listado');
    }

    public function borrar_inactivos($id) {

        $user = \Auth::user();

        $user_inac = Usuarios_inactivos::find($id);


        if ($user && $user->rol == 'Admin') {

            $user_inac->delete();
        }

        return redirect('listado_activos');
    }

    public function confirmar_registro($id) {

        $user = \Auth::user();

        $user_inac = Usuarios_inactivos::find($id);

        $nuevo_user = new User();

        $nuevo_user::create([
            'nif' => $user_inac->nif,
            'rol' => $user_inac->rol,
            'name' => $user_inac->name,
            'surname' => $user_inac->surname,
            'nick' => $user_inac->nick,
            'email' => $user_inac->email,
            'password' => $user_inac->password,
            'telefono_movil' => $user_inac->telefono_movil,
            'image_path' => $user_inac->image_path,
            'departamento' => $user_inac->departamento,
            'formacion' => $user_inac->formacion,
            'blog' => $user_inac->blog,
            'github' => $user_inac->github,
            'created_at' => $user_inac->created_at,
            'updated_at' => $user_inac->updated_at,
            'remember_token' => $user_inac->remember_token,
            'provider' => $user_inac->provider,
            'provider_id' => $user_inac->provider_id
        ]);


        if ($user && $user->rol == 'Admin') {



            $user_inac->delete();
        }

        return redirect('listado_activos');
    }

    public function ver_editar($id) {

        $user = User::find($id);
        
        return view('editar', ['user' => $user]);
    }

    public function update(Request $request) {
        
        
        $user = User::find($request->input('id'));

        //Recoger valores formulario
        
        $nif = $request->input('nif');
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');
        $password = $request->input('password');
        $telefono_movil = $request->input('telefono_movil');
        $rol = $request->input('rol');
        $departamento = $request->input('departamento');
        $blog = $request->input('blog');
        $github = $request->input('github');
        
        //Asignar valores al usuario
        
        $user->nif = $nif;
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;
        $user->password = sha1($password);
        $user->telefono_movil = $telefono_movil;
        $user->rol = $rol;
        $user->departamento = $departamento;
        $user->blog = $blog;
        $user->github = $github;
        
        $user->update();
        
        return redirect()->route('listado');
        

    }

    public function bandeja_entrada() {

        return view('bandeja_entrada');
    }

}
