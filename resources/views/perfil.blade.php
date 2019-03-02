@extends('layouts.app')

@section('content')

<div class="w-100 d-flex justify-content-center">

    <div class="card" style="width:400px">
        <img class="card-img-top" src="https://image.flaticon.com/icons/svg/236/236831.svg" alt="Card image">
        
        <div class="card-body">
            <h4 class="card-title text-center">{{ $user->name . ' ' . $user->surname}}</h4>
            <p class="card-text text-center">{{ $user->rol . ' | | ' . ' ' . '  Teléfono de contacto:' . '   ' .$user->telefono_movil}}</p>
            <a data-toggle="modal" href="#modal" class="btn btn-primary d-flex justify-content-center">Ver más</a>
            <a href="{{route('ver_editar', ['id' => $user->id])}}" class="btn btn-warning d-flex justify-content-center">Editar Perfil</a>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Datos opcionales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3> Nickname: {{$user->nick}}</h3>
                    <hr>
                    <h3> Correo electrónico: {{$user->email}}</h3>
                    <hr>
                    <h3> Cuenta de Github: {{$user->github}}</h3>
                    <hr>
                    <h3> Blog: {{$user->blog}}</h3>
                    <hr>
                    <h5>Fecha de creación de la cuenta:  {{$user->created_at}}</h5>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection

