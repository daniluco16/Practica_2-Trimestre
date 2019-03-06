@extends('layouts.app')

@section('content')

<form action="{{route('insertFormacion')}}" method="post">

    @csrf

    <div class="container w-25">

        <div class="card">
            <div class="card-header">{{__('Datos de formación')}}</div>
            <div class="card-body">

                <div class="form-group">


                    <select class="form-control" name="familia" id="familia">


                        <option value="" selected disabled>Familias Profesionales</option>

                        @foreach($familias as $familia)

                        <option value="{{$familia->id}}">{{$familia->nombre}}</option>

                        @endforeach
                    </select>


                </div>


                <div class="form-group">               

                    <select class="form-control" name="ciclo" id="ciclo">
                        <option value="" selected disabled>Ciclos</option>

                    </select>
                </div>

                <div class="botones">
                    <button type="submit" class="btn btn-dark" name="submit">Agregar formación</button>
                </div>

            </div>


        </div>

    </div>


</form>

@endsection

@section('js')
<script>

    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#familia').change(function () {


            var familia = $('#familia').val();

            console.log(familia);

            if (familia !== '')
            {

                var selectFamilia = $('#familia option:selected').val();

                console.log(selectFamilia);

                $.ajax({

                    url: "/getCiclos",
                    method: "POST",
                    data: {'familia': selectFamilia},
                    success: function (data)
                    {
                        var ciclos = data;
                        
                        $("#ciclo").empty();
                        
                        for(var i = 0; i < ciclos.length; i++){
                            
                            $("#ciclo").append("<option value='"+ ciclos[i].nombre +"'>"+ ciclos[i].nombre +"</option");         
                        }
                        
                    }
                });

            } else {

                $('#ciclo').html('<option value="">Ciclos</option>');
            }
        });
    });

</script>




@endsection
