/*==================================
EDITAR TARIFA ARL
==================================*/

$(document).on("click", ".btnEditarTipo", function() {

    var idTipo = $(this).attr("idTipo");

    var datos = new FormData();
    datos.append("idTipo", idTipo);

    $.ajax({

        url: "ajax/tipo-afiliado.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarPorcentajeEps").val(respuesta["porcentaje_eps"]);
            $("#editarPorcentajeAfp").val(respuesta["porcentaje_afp"]);
            $("#editarPorcentajeCcf").val(respuesta["porcentaje_ccf"]);
            $("#idTipo").val(respuesta["id"]);
        }
    });

})


/*==================================
ACTIVAR TIPO AFILIADO
==================================*/

$(document).on("click", ".btnActivarTipo", function() {

    var idTipo = $(this).attr("idTipo");
    var estadoTipo = $(this).attr("estadoTipo");

    //console.log("idEps", idEps);

    var datos = new FormData();
    datos.append("activarTipoId", idTipo);
    datos.append("activarTipo", estadoTipo);

    $.ajax({

        url: "ajax/tipo-afiliado.ajax.php",
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
                        window.location = "tipo-afiliado";
                    }
                });

            }

        }

    })

    if (estadoTipo == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoTipo', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoTipo', 0);

    }

})

/*==================================
REVISAR SI EXISTE NOMBRE TIPO AFILIADO
==================================*/

$("#nuevoNombreTipo").change(function() {

    $(".alert").remove();

    var nombre = $(this).val();

    var datos = new FormData();
    datos.append("validarNombreTipo", nombre);

    $.ajax({
        url: "ajax/tipo-afiliado.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            if (respuesta) {

                $("#nuevoNombreTipo").parent().after('<div class="alert alert-warning">Este Nombre ya existe en la base de datos</div>');

                $("#nuevoNombreTipo").val("");

            }

        }

    })
})


/*==================================
ELIMINAR TIPO AFILIADO
==================================*/

$(document).on("click", ".btnEliminarTipo", function() {

    var idTipo = $(this).attr("idTipo");

    swal({
        title: '¿Está seguro de borrar el Tipo Afiliado?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Tipo Afiliado!'
    }).then(function(result) {

        if (result.value) {

            window.location = "index.php?ruta=tipo-afiliado&idTipo=" + idTipo;

        }

    })

})