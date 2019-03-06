
@extends('layouts.app')

@section('content')
<div class="container container-home">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">

                <div class="card-header"><strong>Opciones de Usuarios</strong></div>
                <div class="card-body h-5">

                    <div class="row justify-content-center">

                        <div class="col-md-6 mb-5" id="op1" >

                            <div class="text-center">

                                @if(Auth::user()->rol == 'Admin')<a href="{{ route('listado_activos')}}">@endif<img src="https://image.flaticon.com/icons/svg/1465/1465502.svg" width="100" height="100"></a>
                                <h2 class="mt-3">Administrar</h2>

                            </div>

                        </div>

                        <div class="col-md-6" id="op2">


                            <div class="text-center">

                                <a href=""><img src="https://image.flaticon.com/icons/svg/1470/1470920.svg" class="ml-4" width="100" height="100"></a>
                                <h2 class="mt-3">Curriculum</h2>

                            </div>


                        </div>


                    </div>

                    <div class="row justify-content-center">

                        <div class="col-md-6 mb-5" id="op1">


                            <div class="text-center">

                                <a href="{{route('mensaje')}}"><img src="https://image.flaticon.com/icons/svg/1401/1401006.svg" width="100" height="100"></a>
                                <h2 class="mt-3">Mensajes</h2>

                            </div>

                        </div>

                        <div class="col-md-6 mb-5" id="op1">


                            <div class="text-center">

                                <a href="{{route('listado')}}"><img src="https://image.flaticon.com/icons/svg/1464/1464927.svg" width="100" height="100"></a>
                                <h2 class="mt-3">Alumnos</h2>

                            </div>
                        </div>


                    </div>



                </div>
            </div>

        </div>
    </div>



</div>


@endsection
