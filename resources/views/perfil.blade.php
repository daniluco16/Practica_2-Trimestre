@extends('layouts.app')

@section('content')

<div class="w-100 d-flex justify-content-center">
    
    <div class="card" style="width:400px">
    <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/img_avatar1.png" alt="Card image">
    <div class="card-body">
        <h4 class="card-title text-center">{{ $user->name . ' ' . $user->surname}}</h4>
        <p class="card-text text-center">{{ $user->rol . ' | | ' . ' ' . '  Teléfono de contacto:' . '   ' .$user->telefono_movil}}</p>
        <a href="#" class="btn btn-primary d-flex justify-content-center">Ver más</a>
    </div>
</div>
    
</div>



@endsection

