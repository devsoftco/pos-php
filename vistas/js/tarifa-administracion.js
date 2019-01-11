/*==================================
EDITAR TARIFA ADMINISTRACION
==================================*/

$(document).on("click", ".btnEditarTarAdm", function() {

    var idTarAdm = $(this).attr("idTarAdm");

    var datos = new FormData();
    datos.append("idTarAdm", idTarAdm);

    $.ajax({

        url: "ajax/tarifa-administracion.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarTarifa").val(respuesta["tarifa"]);
            $("#idTarAdm").val(respuesta["id"]);
        }
    });

})


/*==================================
ACTIVAR TARIFA ADMINISTRACION
==================================*/

$(document).on("click", ".btnActivarTarAdm", function() {

    var idTarAdm = $(this).attr("idTarAdm");
    var estadoTarAdm = $(this).attr("estadoTarAdm");

    //console.log("idEps", idEps);

    var datos = new FormData();
    datos.append("activarTarId", idTarAdm);
    datos.append("activarTarAdm", estadoTarAdm);

    $.ajax({

        url: "ajax/tarifa-administracion.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: "La Tarifa Administración ha sido actualizada",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "tarifa-administracion";
                    }
                });

            }

        }

    })

    if (estadoTarAdm == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoTarAdm', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoTarAdm', 0);

    }

})

/*==================================
REVISAR SI EXISTE NOMBRE TARIFA ADMINISTRACION
==================================*/

$("#nuevoNombreTarAdm").change(function() {

    $(".alert").remove();

    var nombre = $(this).val();

    var datos = new FormData();
    datos.append("validarNombre", nombre);

    $.ajax({
        url: "ajax/tarifa-administracion.ajax.php",
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
ELIMINAR TARIFA ADMINISTRACIÓN
==================================*/

$(document).on("click", ".btnEliminarTarAfi", function() {

    var idTarAfi = $(this).attr("idTarAfi");

    swal({
        title: '¿Está seguro de borrar la Tarifa de Afiliación?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Tarifa de Afiliación!'
    }).then(function(result) {

        if (result.value) {

            window.location = "index.php?ruta=tarifa-afiliacion&idTarAfi=" + idTarAfi;

        }

    })

})