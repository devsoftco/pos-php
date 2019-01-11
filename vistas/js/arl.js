/*==================================
EDITAR ARL
==================================*/

$(document).on("click", ".btnEditarArl", function() {

    var idArl = $(this).attr("idArl");

    var datos = new FormData();
    datos.append("idArl", idArl);

    $.ajax({

        url: "ajax/arl.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarCodigo").val(respuesta["codigo"]);
            $("#editarNit").val(respuesta["nit"]);
            $("#editarDireccion").val(respuesta["direccion"]);
        }
    });

})


/*==================================
ACTIVAR ARL
==================================*/

$(document).on("click", ".btnActivarArl", function() {

    var idArl = $(this).attr("idArl");
    var estadoArl = $(this).attr("estadoArl");

    //console.log("idEps", idEps);

    var datos = new FormData();
    datos.append("activarId", idArl);
    datos.append("activarArl", estadoArl);

    $.ajax({

        url: "ajax/arl.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: "La ARL ha sido actualizada",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "arl";
                    }
                });

            }

        }

    })

    if (estadoArl == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoArl', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoArl', 0);

    }

})

/*==================================
REVISAR SI EXISTE CODIGO ARL
==================================*/

$("#nuevoCodigo").change(function() {

    $(".alert").remove();

    var codigo = $(this).val();

    var datos = new FormData();
    datos.append("validarCodigo", codigo);

    $.ajax({
        url: "ajax/arl.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            if (respuesta) {

                $("#nuevoCodigo").parent().after('<div class="alert alert-warning">Este Codigo ya existe en la base de datos</div>');

                $("#nuevoCodigo").val("");

            }

        }

    })
})


/*==================================
ELIMINAR ARL
==================================*/

$(document).on("click", ".btnEliminarArl", function() {

    var idArl = $(this).attr("idArl");
    var codigo = $(this).attr("codigo");

    swal({
        title: '¿Está seguro de borrar la Arl?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar ARL!'
    }).then(function(result) {

        if (result.value) {

            window.location = "index.php?ruta=eps&idArl=" + idArl + "&codigo=" + codigo;

        }

    })

})