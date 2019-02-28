  
@extends('layouts.app')

@section('content')
<div class="w-100 d-flex justify-content-center align-self-start">
        <table class="table table-hover table-dark w-75">
            <thead class="text-center">
                <tr>
                    <th scope="col">Usuarios Inactivos</th>
                    <th scope="col">NIF</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Fecha de Registro</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($users_inac as $user_inac)
                <tr>
                    <th scope="row" class="align-middle">###</th>
                    <th class="align-middle">{{$user_inac->nif}}</th>
                    <td class="align-middle">{{$user_inac->name}}</td>
                    <td class="align-middle">{{$user_inac->surname}}</td>
                    <td class="align-middle">{{$user_inac->email}}</td>
                    <td class="align-middle">{{$user_inac->rol}}</td>
                    <td  class="align-middle">{{$user_inac->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="clearfix w-100 d-flex justify-content-center">{{$users->links()}}</div>
</div>

@ensection