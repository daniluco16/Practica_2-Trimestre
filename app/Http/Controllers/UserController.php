<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mensaje;
use Mail;
use App\Usuarios_inactivos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Mail\Contacto;
use App\Familia;
use App\Ciclo;
use Illuminate\Support\Facades\Auth;

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

    public function correo() {

        $user = User::orderBy('created_at', 'asc')->paginate(3);

        return view('correo', [
            'users' => $user,
        ]);
    }

    public function envio_correo(Request $request) {


        $datos = ['asunto' => $request->input('asunto'), 'remitente' => $request->input('remitente'), 'mensaje' => $request->input('comentario')];

        $destinatarios = $request->input('correo');


        foreach ($destinatarios as $destinatario) {

            Mail::to($destinatario)->send(new Contacto($datos));
        }

        return redirect('/');
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

    public function darAlta(Request $request) {

        $user = User::find($request->input('id'));

        //Validacion de campos

        $validate = $this->validate($request, [
            'nif' => ['required', 'string', 'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i'],
            'password' => ['required', 'string', 'regex:/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/', 'confirmed'],
            'email' => 'required|string|email|max:255|unique:users,email,',
        ]);


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

        $nuevo_user = new User();

        $nuevo_user::create([
            'nif' => $nif,
            'name' => $name,
            'surname' => $surname,
            'nick' => $nick,
            'email' => $email,
            'password' => bcrypt($password),
            'telefono_movil' => $telefono_movil,
            'rol' => $rol,
            'departamento' => $departamento,
            'blog' => $blog,
            'github' => $github,
//            'remember_token' => $user_inac->remember_token,
        ]);

        return redirect('/');
    }

    public function update(Request $request) {

        $users = \Auth::user();

        $user = User::find($request->input('id'));


        //Validar campos

        $validate = $this->validate($request, [
            'nif' => ['required', 'string', 'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i'],
            'password' => ['required', 'string', 'regex:/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/', 'confirmed'],
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);


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
        $user->password = bcrypt($password);
        $user->telefono_movil = $telefono_movil;

        if ($users->rol == 'Admin') {

            $user->rol = $rol;
        }

        $user->departamento = $departamento;
        $user->blog = $blog;
        $user->github = $github;


        $image = $request->file('imagen');

        if ($image) {

            $image_path_name = time() . $image->getClientOriginalName();

            Storage::disk('public')->put($image_path_name, File::get($image));

            $user->image_path = $image_path_name;
        }

        $user->update();

        return redirect()->route('listado');
    }

    public function getImage($filename) {

        $file = Storage::disk('public')->get($filename);

        return new Response($file, 200);
    }

    public function insert_alumnos() {

        return view('insert_alumno');
    }

    public function envio() {

        $user = User::orderBy('created_at', 'asc')->get();

        return view('mensaje', [
            'users' => $user,
        ]);
    }

    public function bandeja_entrada() {

        return view('bandeja_entrada');
    }

    public function addFormacion() {

        $familias = Familia::all();

        return view('addFormacion', [
            'familias' => $familias
        ]);
    }

    public function getCiclos(Request $request) {

        $familias = (int) $request->input('familia');

        $ciclos = Ciclo::where('FP_id', $familias)->get();

        return response()->json($ciclos);
    }

    public function insertFormacion(Request $request) {

        $user = Auth::user();

        $validate = $this->validate($request, [
            'familia' => 'required',
            'ciclo' => 'required'
        ]);

        $nombreFamilia = Familia::find($request->input('familia'))->nombre;

        $ciclo = $request->input('ciclo');

        $formacion = $ciclo . ' ' . $nombreFamilia . ';';

        $user->formacion .= $formacion;

        \DB::table('users')
                ->where('id', $user->id)
                ->update(['formacion' => $formacion]);

        return redirect()->route('home');
    }

}
