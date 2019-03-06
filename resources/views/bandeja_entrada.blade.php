@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row w-100 d-flex justify-content-center">

        <table class="table table-hover table-dark w-100">
            <thead class="text-center">
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Remitente</th>
                    <th scope="col">Fecha de envio</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">

                <?php 
                $contador = 0;
                
                $modal = "";
                
                $modal2 = "";
                
                ?>
                
                @foreach($mensajes as $mensaje)
                
                <?php 
                $contador++;
                
                $modal = "md" . $contador;
                
                $modal2 = "ms" . $contador;
                
                ?>
                
                <tr>
                    <th class="align-middle">{{ $mensaje->titulo}}</th>
                    <td class="align-middle">{{ $mensaje->user->name}}</td>
                    <td class="align-middle">{{ $mensaje->created_at}}</td>

                    <td>
                        <a data-toggle="modal" data-target="#<?= $modal2 ?>" href="#" class="btn btn-primary font-weight-bold">Ver contenido</a>
                        <a data-toggle="modal" data-target="#<?= $modal ?>" href="#" class="btn btn-danger font-weight-bold">Eliminar Mensaje</a>
                    </td>
                </tr>

                 <!-- Modal ver -->
            <div class="modal fade" id="<?= $modal2 ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Contenido</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{$mensaje->contenido}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
                
             
                <!-- Modal eliminar-->
            <div class="modal fade" id="<?= $modal ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Mensaje</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Estas seguro que quieres eliminar este mensaje?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <a class="btn btn-primary" href="{{route('delete_mensaje', ['id' => $mensaje->id])}}">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            </tbody>
        </table>
        <div class="clearfix w-100 d-flex justify-content-center">{{$mensajes->links()}}</div>

</div>
    
    
</div>

@endsection
