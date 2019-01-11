/*==================================
EDITAR CCF
==================================*/

$(document).on("click", ".btnEditarCcf", function() {

    var idCcf = $(this).attr("idCcf");

    var datos = new FormData();
    datos.append("idCcf", idCcf);

    $.ajax({

        url: "ajax/caja-compensaciones.ajax.php",
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
ACTIVAR CCF
==================================*/

$(document).on("click", ".btnActivarCcf", function() {

    var idCcf = $(this).attr("idCcf");
    var estadoCcf = $(this).attr("estadoCcf");

    //console.log("idEps", idEps);

    var datos = new FormData();
    datos.append("activarId", idCcf);
    datos.append("activarCcf", estadoCcf);

    $.ajax({

        url: "ajax/caja-compensaciones.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: "La CCF ha sido actualizada",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "caja-compensaciones";
                    }
                });

            }

        }

    })

    if (estadoCcf == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoCcf', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoCcf', 0);

    }

})

/*==================================
REVISAR SI EXISTE CODIGO CCF
==================================*/

$("#nuevoCodigo").change(function() {

    $(".alert").remove();

    var codigo = $(this).val();

    var datos = new FormData();
    datos.append("validarCodigo", codigo);

    $.ajax({
        url: "ajax/caja-compensaciones.ajax.php",
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
ELIMINAR CCF
==================================*/

$(document).on("click", ".btnEliminarCcf", function() {

    var idCcf = $(this).attr("idCcf");
    var codigo = $(this).attr("codigo");

    swal({
        title: '¿Está seguro de borrar la CCF?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar CCF!'
    }).then(function(result) {

        if (result.value) {

            window.location = "index.php?ruta=caja-compensaciones&idCcf=" + idCcf + "&codigo=" + codigo;

        }

    })

})