/*==================================
EDITAR TARIFA ARL
==================================*/

$(document).on("click", ".btnEditarTarArl", function() {

    var idTarArl = $(this).attr("idTarArl");

    var datos = new FormData();
    datos.append("idTarArl", idTarArl);

    $.ajax({

        url: "ajax/arl-tarifas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarTarifa").val(respuesta["tarifa"]);
            $("#idTarArl").val(respuesta["id"]);
        }
    });

})


/*==================================
ACTIVAR TARIFA ARL
==================================*/

$(document).on("click", ".btnActivarTarArl", function() {

    var idTarArl = $(this).attr("idTarArl");
    var estadoTarArl = $(this).attr("estadoTarArl");

    //console.log("idEps", idEps);

    var datos = new FormData();
    datos.append("activarTarId", idTarArl);
    datos.append("activarTarArl", estadoTarArl);

    $.ajax({

        url: "ajax/arl-tarifas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: "La Tarifa ARL ha sido actualizada",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "arl-tarifas";
                    }
                });

            }

        }

    })

    if (estadoTarArl == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoTarArl', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoTarArl', 0);

    }

})

/*==================================
REVISAR SI EXISTE NOMBRE TARIFA ARL
==================================*/

$("#nuevoNombre").change(function() {

    $(".alert").remove();

    var nombre = $(this).val();

    var datos = new FormData();
    datos.append("validarNombre", nombre);

    $.ajax({
        url: "ajax/arl-tarifas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            if (respuesta) {

                $("#nuevoNombre").parent().after('<div class="alert alert-warning">Este Nombre ya existe en la base de datos</div>');

                $("#nuevoNombre").val("");

            }

        }

    })
})


/*==================================
ELIMINAR TARIFA ARL
==================================*/

$(document).on("click", ".btnEliminarTarArl", function() {

    var idTarArl = $(this).attr("idTarArl");

    swal({
        title: '¿Está seguro de borrar la Tarifa Arl?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Tarifa ARL!'
    }).then(function(result) {

        if (result.value) {

            window.location = "index.php?ruta=arl-tarifas&idTarArl=" + idTarArl;

        }

    })

})