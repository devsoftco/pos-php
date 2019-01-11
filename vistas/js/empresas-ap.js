/*==================================
EDITAR EMPRESA
==================================*/

$(document).on("click", ".btnEditarEmpAp", function() {

    var idEmp = $(this).attr("idEmp");

    var datos = new FormData();
    datos.append("idEmp", idEmp);

    $.ajax({

        url: "ajax/empresas-ap.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarDireccion").val(respuesta["direccion"]);
            $("#editarNit").val(respuesta["nit"]);
            $("#idEmp").val(respuesta["id"]);
        }
    });

})


/*==================================
ACTIVAR EMPRESA
==================================*/

$(document).on("click", ".btnActivarEmpAp", function() {

    var idEmp = $(this).attr("idEmp");
    var estadoEmp = $(this).attr("estadoEmp");

    //console.log("idEmp", idEmp);

    var datos = new FormData();
    datos.append("activarId", idEmp);
    datos.append("activarEmp", estadoEmp);

    $.ajax({

        url: "ajax/empresas-ap.ajax.php",
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
                        window.location = "empresas-ap";
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
REVISAR SI EXISTE NIT EMPRESA
==================================*/

$("#nuevoNit").change(function() {

    $(".alert").remove();

    var nit = $(this).val();

    //console.log("nit", nit);

    var datos = new FormData();
    datos.append("validarNit", nit);

    $.ajax({
        url: "ajax/empresas-ap.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            if (respuesta) {

                $("#nuevoNit").parent().after('<div class="alert alert-warning">Este NIT ya existe en la base de datos</div>');

                $("#nuevoNit").val("");

            }

        }

    })
})


/*==================================
ELIMINAR EMPRESA
==================================*/

$(document).on("click", ".btnEliminarEmpAp", function() {

    var idEmp = $(this).attr("idEmp");

    swal({
        title: '¿Está seguro de borrar la Empresa Aportante?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Empresa!'
    }).then(function(result) {

        if (result.value) {

            window.location = "index.php?ruta=empresas-ap&idEmp=" + idEmp;

        }

    })

})