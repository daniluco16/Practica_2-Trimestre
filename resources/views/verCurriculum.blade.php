@extends('layouts.app')


@section('content')

<div class="container">
    @if($curriculum != null)

    {!! $curriculum->contenido !!}

    <a href="{{route('generar_pdf_curriculum' , ['id' => $curriculum->id])}}" class="btn btn-danger">Exportar a pdf</a>
    <a href="{{route('eliminarCurriculum', ['id' => $curriculum->id])}}" class="btn btn-warning">Eliminar Curriculum</a>
    @else
    <h2 class="text-muted">No tienes ningún curriculum creado para este usuario</h2>
    @endif

</div>

@endsection

