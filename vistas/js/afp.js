/*==================================
EDITAR AFP
==================================*/

$(document).on("click", ".btnEditarAfp", function() {

    var idAfp = $(this).attr("idAfp");

    var datos = new FormData();
    datos.append("idAfp", idAfp);

    $.ajax({

        url: "ajax/afp.ajax.php",
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
ACTIVAR AFP
==================================*/

$(document).on("click", ".btnActivarAfp", function() {

    var idAfp = $(this).attr("idAfp");
    var estadoAfp = $(this).attr("estadoAfp");

    //console.log("idEps", idEps);

    var datos = new FormData();
    datos.append("activarId", idAfp);
    datos.append("activarAfp", estadoAfp);

    $.ajax({

        url: "ajax/afp.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: "La AFP ha sido actualizada",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "afp";
                    }
                });

            }

        }

    })

    if (estadoAfp == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoAfp', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoAfp', 0);

    }

})

/*==================================
REVISAR SI EXISTE CODIGO AFP
==================================*/

$("#nuevoCodigo").change(function() {

    $(".alert").remove();

    var codigo = $(this).val();

    var datos = new FormData();
    datos.append("validarCodigo", codigo);

    $.ajax({
        url: "ajax/afp.ajax.php",
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

$(document).on("click", ".btnEliminarAfp", function() {

    var idAfp = $(this).attr("idAfp");
    var codigo = $(this).attr("codigo");

    swal({
        title: '¿Está seguro de borrar la Afp?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar AFP!'
    }).then(function(result) {

        if (result.value) {

            window.location = "index.php?ruta=afp&idAfp=" + idAfp + "&codigo=" + codigo;

        }

    })

})