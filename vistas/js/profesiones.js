/*==================================
EDITAR PROFESION
==================================*/

$(document).on("click", ".btnEditarPro", function() {

    var idPro = $(this).attr("idPro");

    var datos = new FormData();
    datos.append("idPro", idPro);

    $.ajax({

        url: "ajax/profesiones.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#editarNombre").val(respuesta["nombre"]);
            $("#idPro").val(respuesta["id"]);
        }
    });

})


/*==================================
REVISAR SI EXISTE NOMBRE PROFESIÖN
==================================*/

$("#nuevoNombre").change(function() {

    $(".alert").remove();

    var nombre = $(this).val();

    var datos = new FormData();
    datos.append("validarNombre", nombre);

    $.ajax({
        url: "ajax/profesiones.ajax.php",
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
ELIMINAR PROFESION
==================================*/

$(document).on("click", ".btnEliminarPro", function() {

    var idPro = $(this).attr("idPro");

    swal({
        title: '¿Está seguro de borrar la Profesión?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Profesión!'
    }).then(function(result) {

        if (result.value) {

            window.location = "index.php?ruta=profesiones&idPro=" + idPro;

        }

    })

})