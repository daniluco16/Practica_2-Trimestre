@extends('layouts.app')

@section('content')


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

            <tr>
                <th class="align-middle"></th>
                <td class="align-middle"></td>
                <td class="align-middle"></td>
                <td class="align-middle"></td>
                <td class="align-middle"></td>
                <td>
                    <a href="" class="btn btn-primary font-weight-bold">Ver anuncio</a>
                    <a href="" class="btn btn-success font-weight-bold">Editar</a>
                    <a href="" class="btn btn-danger font-weight-bold">Borrar</a>
                </td>
            </tr>

        </tbody>
    </table>

</div>


@endsection
