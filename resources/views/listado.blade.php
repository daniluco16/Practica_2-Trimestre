@extends('layouts.app')
@section('content')


<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-auto">

            <a href="{{route('listado_inactivos')}}" class="btn btn-info align-self-start">Ver inactivos</a>
            <a href="{{route('generar')}}" class="btn btn-danger align-self-start">Exportar a pdf</a>
        </div>

    </div>
    <form method="GET" action="{{route('listado')}}" id="buscador">

        <div class="row justify-content-center">

            <div class="form-group mt-2 mr-4">
                <label>Ordenar por: </label>
                <select class="form-control" id="ordenar">
                    <option value="name">Nombre</option>
                    <option value="surname">Apellidos</option>
                    <option value="email">Email</option>
                </select>
            </div>

            <div class="form-group mt-2">
                <label>Buscar por: </label>
                <select class="form-control" id="campo">
                    <option value="name">Nombre</option>
                    <option value="surname">Apellidos</option>
                    <option value="email">Email</option>
                </select>
            </div>

            <div class="col-auto mt-4">

                <input type="text" class="form-control" id="search">
            </div>

            <div class="form-group mt-4">

                <input  type="submit" value="Buscar" class="btn btn-success mb-1"/>

            </div> 

        </div>

    </form>

    <div class="d-flex justify-content-center">

        <table class="table table-hover table-dark w-75">
            <thead class="text-center">
                <tr>
                    <th scope="col">NIF</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($users as $user)

                @if(Auth::user())

                <tr>
                    <th class="align-middle">{{$user->nif}}</th>
                    <td class="align-middle">{{$user->name}}</td>
                    <td class="align-middle">{{$user->surname}}</td>
                    <td class="align-middle">{{$user->email}}</td>
                    <td class="align-middle">{{$user->rol}}</td>
                    <td>
                        <a href="{{route('perfil')}}" class="btn btn-primary font-weight-bold">Ver anuncio</a>
                        <a href="" class="btn btn-success font-weight-bold">Editar</a>
                        <a data-toggle="modal" data-target="#eliminar" href="#" class="btn btn-danger font-weight-bold">Borrar</a>
                    </td>
                </tr>
                @endif


                <!-- Modal -->
            <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Rechazar Profesor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Estas seguro que quieres eliminar a este usuario?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <a class="btn btn-primary" href="{{route('borrar_act' , ['id' => $user->id])}}">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>


            @endforeach

            </tbody>
        </table>

    </div>

</div>

@endsection

