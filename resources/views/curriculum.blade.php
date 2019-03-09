@extends('layouts.app')


@section('content')

<div class="container h-100">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-file-alt"></i> Añadir Curriculum</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('modCurriculum')}}"><i class="fas fa-edit"></i> Editar Curriculum</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('verCurriculum', ['id'=> Auth::user()->id])}}"><i class="fas fa-minus-circle"></i> Ver Curriculum</a>
        </li>
    </ul>
    <div class="tab-content h-100" id="myTabContent">
        <br>
        <div class="tab-pane fade show active h-100" id="home" role="tabpanel" aria-labelledby="home-tab">

            <form action="{{route('addCurriculum')}}" method="POST">
                @csrf

                <textarea name="contenido">
            <hr>    
            <h1><strong>Datos Personales</strong></h1>
            <hr>
            
            @if($user->image_path == null)
            <img src='{{asset('img/man.png')}}' width='100'>
            @else
            <img src='{{route('ver_imagen', ['filename' => $user->image_path]) }}' width='100'>
            @endif

                    <h3><strong>Nombre y apellidos: {{$user->name . ' ' . $user->surname}}</strong></h3>
                    <h3><strong>Dirección:</strong></h3>
                    <h3><strong>Localidad:</strong></h3>
                    <h3><strong>Teléfono:  {{$user->telefono_movil}}</strong></h3>
                    <h3><strong>Fecha de nacimiento: </strong> dd/mm/yyyy</h3>
                    <h3><strong>Sexo: </strong></h3>
                    <hr>
                    <h1><strong>Formación Académica</strong></h1>
                    <h3><strong>{{$user->formacion }}</strong></h3>
                    <hr>
                    <h1><strong>Experiencia Laboral</strong></h1>
                    <hr>
                    <h3><strong>Formación Académica: </strong></h3>
                    <h3><strong>Lenguaje de Programación: </strong></h3>
                    <h3><strong>Competencias: </strong></h3>
                    <h3><strong>Información adicional: </strong></h3>

                </textarea>
                
                <button type="submit" class="btn btn-warning">
                    {{ __('Añadir Curriculum') }}
                </button>    

            </form>
            @section('js')
            <script>

                CKEDITOR.replace('contenido',
                        {
                            height: 600,
                            filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
                            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                        });

                CKFinder.setupCKEditor(editor);
            </script>

            @endsection

        </div>
    
        </div>

    </div>







@endsection
