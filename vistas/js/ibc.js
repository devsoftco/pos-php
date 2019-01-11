/*==================================
EDITAR IBC
==================================*/

$(document).on("click", ".btnEditarIbc", function() {

    var idIbc = $(this).attr("idIbc");

    var datos = new FormData();
    datos.append("idIbc", idIbc);

    $.ajax({

        url: "ajax/ibc.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarTarifa").val(respuesta["tarifa"]);
            $("#idIbc").val(respuesta["id"]);
        }
    });

})


/*==================================
ACTIVAR IBC
==================================*/

$(document).on("click", ".btnActivarIbc", function() {

    var idIbc = $(this).attr("idIbc");
    var estadoIbc = $(this).attr("estadoIbc");

    //console.log("idEps", idEps);

    var datos = new FormData();
    datos.append("activarIbcId", idIbc);
    datos.append("activarIbc", estadoIbc);

    $.ajax({

        url: "ajax/ibc.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: "El IBC ha sido actualizada",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "ibc";
                    }
                });

            }

        }

    })

    if (estadoIbc == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoIbc', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoIbc', 0);

    }

})



/*==================================
ELIMINAR IBC
==================================*/

$(document).on("click", ".btnEliminarIbc", function() {

    var idIbc = $(this).attr("idIbc");

    swal({
        title: '¿Está seguro de borrar IBC?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar IBC!'
    }).then(function(result) {

        if (result.value) {

            window.location = "index.php?ruta=ibc&idIbc=" + idIbc;

        }

    })

})