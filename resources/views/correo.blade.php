@extends('layouts.app')

@section('content')


<div class="container-fluid">

    <form method="post" action="{{route('envio_correo')}}">

        @csrf
        <div class="d-flex justify-content-center table-wrapper-scroll-y">

            <table class="table table-hover table-dark w-75 table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th scope="col">NIF</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Envio</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                    <?php
                    $contador = 0;
                    ?>


                    @foreach($users as $user)

                    <?php
                    $contador++;
                    ?>

                    @if(Auth::User()->id != $user->id)
                    <tr>
                        <th class="align-middle">{{$user->nif}}</th>
                        <td class="align-middle">{{$user->name}}</td>
                        <td class="align-middle">{{$user->surname}}</td>
                        <td class="align-middle">{{$user->email}}</td>
                        <td class="align-middle">{{$user->rol}}</td>
                        <td>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="d-flex justify-content-center" name="correo[]" id="<?= $contador ?>" value="{{$user->email}}">
                                </label>
                            </div>
                        </td>
                    </tr>
                    @endif

                    <input type="hidden" name="remitente" value="{{Auth::user()->email}}">
                    @endforeach

                </tbody>
            </table>

        </div>

        <div class="form-group row w-100">
            <label for="asunto" class="col-md-4 col-form-label text-md-right">{{ __('Asunto') }}</label>

            <div class="col-md-6 d-flex justify-content-center">
                <input id="asunto" type="text" class="form-control" name="asunto" value="" placeholder="Escribe el asunto del mensaje..." required>
            </div>
        </div>

        <div class="form-group row w-100">
            <label for="comentario" class="col-md-4 col-form-label text-md-right">{{__('Comentario')}}</label>
            <div class="col-md-6 d-flex justify-content-center">
                <textarea class="form-control" rows="5" id="comentario" name="comentario" placeholder="Escribe un mensaje aqui para enviar a otros usuarios por correo..." required></textarea>
            </div>

        </div> 

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-info">
                    {{ __('Enviar') }}
                </button>

            </div>
        </div>
    </form>



</div>


@endsection

