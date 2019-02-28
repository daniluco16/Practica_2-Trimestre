@extends('layouts.app')

@section('content')
<div class="container w-50">
    
    <div class="card text-center">

        <div class="card-header">
            <div class="form-group">
                <img src="https://image.flaticon.com/icons/svg/149/149065.svg" width="50" class="d-flex justify-content-start">
                <label for="titulo" class="font-weight-bold">Título del Mensaje</label>
                <input type="text" class="form-control" id="titulo">
            </div>
            
            <div class="form-group">
                <label for="destino" class="font-weight-bold">Destinatario del Mensaje</label>
                <input type="text" class="form-control" id="destino">
            </div>
            
        </div>

        <div class="card-body">
            <h5 class="card-title font-weight-bold">Contenido del mensaje</h5>

            <div class="form-group">
                <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>

        </div>

        <div class="card-footer text-muted">
            <a href="#" class="btn btn-dark rounded-circle">Enviar Mensaje</a>
        </div>

    </div>



</div>



@endsection


