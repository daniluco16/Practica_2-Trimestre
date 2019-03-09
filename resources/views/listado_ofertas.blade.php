
@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="d-flex justify-content-center">

        <table class="table table-hover table-dark w-100 align-items-center">
            <thead class="text-center">
                <tr>
                    <th scope="col">Nombre Empresa</th>
                    <th scope="col">Teléfono de la empresa</th>
                    <th scope="col">Email de la empresa</th>
                    <th scope="col">Descripción de la oferta</th>
                    <th scope="col">Direccion de la empresa</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                
                @foreach($ofertas as $oferta)
               
                <tr>
                    <th class="align-middle">{{$oferta->nombre_empresa}}</th>
                    <td class="align-middle">{{$oferta->telefono_empresa}}</td>
                    <td class="align-middle">{{$oferta->email_empresa}}</td>
                    <td class="align-middle">{{$oferta->descripcion}}</td>
                    <td class="align-middle">{{$oferta->direccion_empresa}}</td>
                    <td>
                        <a class="btn btn-danger" href="{{route('eliminar_oferta', ['id' => $oferta->idofertas])}}"><i class="fas fa-thumbs-down"></i> No me interesa</a>
                    </td>
                </tr>
                
                @endforeach

           

            

            </tbody>
        </table>

    </div>
    
    
</div>



@endsection
