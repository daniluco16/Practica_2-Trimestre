@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear oferta') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('crearOferta') }}">

                        @csrf

                        <div class="d-flex justify-content-center table-wrapper-scroll-y">

                            <table class="table table-hover table-dark w-75 table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Enviar Oferta</th>
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
                                    
                                    @if(Auth::User()->id != $user->id && $user->rol != 'Admin')
                                    <tr>

                                        <td class="align-middle">{{$user->name}}</td>
                                        <td class="align-middle">{{$user->surname}}</td>
                                        <td class="align-middle">{{$user->email}}</td>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="d-flex justify-content-center" name="ofertas[]" id="<?= $contador ?>" value="{{$user->id}}">
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                <input type="hidden" name="userOferta" value="{{$user->id}}">
                                    
                                    @endif

                                    @endforeach

                                </tbody>
                            </table>

                        </div>




                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de la Empresa') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono de la Empresa') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control" name="telefono" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email de la Empresa') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección de la Empresa') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control" name="direccion" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción de la Empresa') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" rows="5" id="descripcion" name="descripcion"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Crear Oferta') }}
                                </button>

                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection