@extends('layouts.app')

@section('content')
<div class="container w-50 d-flex justify-content-center">

    <div class="row w-100 d-flex justify-content-center">


        <form action="{{route('enviar_mensaje')}}" method="POST">

            @csrf


            <div class="d-flex justify-content-center">
                <div class="d-flex justify-content-center table-wrapper-scroll-y col">

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
                                            <input type="checkbox" class="d-flex justify-content-center" name="destinatarios[]" id="<?= $contador ?>" value="{{$user->name}}">
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            @endif

                        <!--<input type="hidden" name="remitente" value="{{Auth::user()->id}}">-->
                            @endforeach

                        </tbody>
                    </table>

                </div>

                <div class="card text-center w-100 col d-flex justify-content-center">

                    <div class="card-header">
                        <div class="form-group">
                            <img src="https://image.flaticon.com/icons/svg/149/149065.svg" width="50" class="d-flex justify-content-start">
                            <label for="titulo" class="font-weight-bold">Título del Mensaje</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>

                    </div>

                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Contenido del mensaje</h5>

                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="contenido" name="contenido" required></textarea>
                        </div>

                    </div>

                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-info">
                            {{ __('Enviar') }}
                        </button>
                    </div>

                </div>

            </div>
        </form>
    </div>
</div>



@endsection


