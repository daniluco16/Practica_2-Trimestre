@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="w-100 d-flex justify-content-center align-self-start">
        <table class="table table-hover table-dark w-75">
            <thead class="text-center">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">Fecha creación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                
                <?php 
                $contador = 0;
                
                $modal = "";
                
                ?>
                
                @foreach($users_inac as $user_inac)
                
                <?php 
                $contador++;
                
                $modal = "md" . $contador;
                
                ?>
                
                <tr>
                    <th scope="row" class="align-middle">{{$user_inac->name}}</th>
                    <td class="align-middle">{{$user_inac->surname}}</td>
                    <td class="align-middle">{{$user_inac->email}}</td>
                    <td class="align-middle">{{$user_inac->created_at}}</td>
                    @if(Auth::user()->rol == 'Admin')
                    <td>
                        <a href="" class="btn btn-warning font-weight-bold">Activar</a>
                        <a data-toggle="modal" href="#<?= $modal ?>" class="btn btn-danger font-weight-bold">Borrar</a>
                    </td>
                   @endif
                </tr>

                <!-- Modal -->
            <div class="modal fade" id="<?= $modal ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Estas seguro que quieres eliminar a este usuario?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <a class="btn btn-primary" href="{{route('borrar_inac', ['id' => $user_inac->id])}}">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>


            @endforeach

            </tbody>
        </table>
    </div>

    <div class="clearfix w-100 d-flex justify-content-center">{{$users_inac->links()}}</div>

</div>

@endsection