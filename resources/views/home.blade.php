
@extends('layouts.app')

@section('content')
<div class="container-fluid container-home">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card  ">

                <div class="card-header">Opciones de Usuarios</div>
                <div class="card-body h-5">
                    <div class="contenedor ">

                        <div class="row justify-content-around">
                            <div class="col-md-3">
                                <div  id="op1">



                                </div>
                            </div>
                            <div class="col-md-3">

                                <div id="op2">


                                </div>
                            </div>

                            <div class="col-md-3">

                                <div id="op2">


                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            
        </div>
    </div>



</div>


@endsection
