@extends('layouts.app')

@section('content')

<div class="w-100 d-flex justify-content-center">

    <div class="card" style="width:400px">

        @if($user->image_path == null)
        <img class="card-img-top" src="{{ asset('img/man.png') }}" alt="da">
        @else
        <img class="card-img-top" src="{{route('ver_imagen', ['filename' => $user->image_path]) }}" alt="Card image">
        @endif
        <div class="card-body">
            <h4 class="card-title text-center">{{ $user->name . ' ' . $user->surname}}</h4>
            <p class="card-text text-center">{{ $user->rol . ' | | ' . ' ' . '  Teléfono de contacto:' . '   ' .$user->telefono_movil}}</p>
            <a data-toggle="modal" href="#modal" class="btn btn-primary d-flex justify-content-center">Ver más</a>

            @if(Auth::user()->rol == 'Admin' || Auth::user()->id == $user->id)
            <a href="{{route('ver_editar', ['id' => $user->id])}}" class="btn btn-warning d-flex justify-content-center">Editar Perfil</a>

            <a href="{{route('generar_perfil', ['id' => $user->id])}}" class="btn btn-danger d-flex justify-content-center">Exportar a pdf</a>

            @endif


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

                    <hr>
                    <h3>Formaciones Cursadas</h3>

                    @foreach(explode(';', $user->formacion) as $formacion)
                    
                    <p>{{$formacion}}</p>
                    
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection

