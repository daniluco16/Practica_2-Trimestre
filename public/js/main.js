var url = 'http://antiguos-alumnos.com';

    $("#buscador").submit(function () {

        $(this).attr('action', url+'/listado/'+$('#buscador #ordenar option:selected').val()
                +'/'+$("#buscador #campo option:selected").val()+'/'+$('#buscador #search').val());
    });


