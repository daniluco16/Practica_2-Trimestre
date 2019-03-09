@extends('layouts.app')


@section('content')

<div class="container">

    <div class="tab-content h-100" id="myTabContent">
        <br>
        <div class="tab-pane fade show active h-100" id="home" role="tabpanel" aria-labelledby="home-tab">

            <form action="{{route('updateCurriculum')}}" method="POST">
                @csrf

                @if($curriculum != null)
                <textarea name="contenido">
            
                {!! $curriculum->contenido !!}
                </textarea>
                @else
                <h2 class="text-muted">No tienes ningún curriculum creado para este usuario</h2>
                @endif

                <button type="submit" class="btn btn-success">
                    {{ __('Actualizar Curriculum') }}
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