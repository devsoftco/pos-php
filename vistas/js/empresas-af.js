/*==================================
EDITAR EMPRESA
==================================*/

$(document).on("click", ".btnEditarEmp", function() {

    var idEmp = $(this).attr("idEmp");

    var datos = new FormData();
    datos.append("idEmp", idEmp);

    $.ajax({

        url: "ajax/empresas-af.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarDireccion").val(respuesta["direccion"]);
            $("#idEmp").val(respuesta["id"]);
        }
    });

})


/*==================================
ACTIVAR EMPRESA
==================================*/

$(document).on("click", ".btnActivarEmp", function() {

    var idEmp = $(this).attr("idEmp");
    var estadoEmp = $(this).attr("estadoEmp");

    console.log("idEmp", idEmp);

    var datos = new FormData();
    datos.append("activarId", idEmp);
    datos.append("activarEmp", estadoEmp);

    $.ajax({

        url: "ajax/empresas-af.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: "La Empresa ha sido actualizada",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "empresas-af";
                    }
                });

            }

        }

    })

    if (estadoEmp == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoEmp', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoEmp', 0);

    }

})

/*==================================
REVISAR SI EXISTE CODIGO EPS
==================================*/

$("#nuevoCodigo").change(function() {

    $(".alert").remove();

    var codigo = $(this).val();

    var datos = new FormData();
    datos.append("validarCodigo", codigo);

    $.ajax({
        url: "ajax/eps.ajax.php",
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
ELIMINAR EMPRESA
==================================*/

$(document).on("click", ".btnEliminarEmp", function() {

    var idEmp = $(this).attr("idEmp");

    swal({
        title: '¿Está seguro de borrar la Empresa Afiliada?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Empresa!'
    }).then(function(result) {

        if (result.value) {

            window.location = "index.php?ruta=empresas-af&idEmp=" + idEmp;

        }

    })

})