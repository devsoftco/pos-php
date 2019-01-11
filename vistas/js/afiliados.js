/*==================================
LIMPIAR CAMPOS MODAL
==================================*/

$('.modal').on('hidden.bs.modal', function() {
    $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
    $("label.error").remove(); //lo utilice para borrar la etiqueta de error del jquery validate
    $(".alert").remove();
});

/*==================================
SUBIENDO CEDULA PDF DEL AFILIADO
==================================*/


$(".nuevoPdf").change(function() {

    var archivo = this.files[0];

    /*==================================
    Validar formato sea PDF
    ==================================*/

    if (archivo["type"] != "application/pdf") {
        $(".nuevoPdf").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato PDF!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else if (archivo["size"] > 200000000) {

        $(".nuevoPdf").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar mas de 20MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else {

        var datosArchivo = new FileReader;
        datosArchivo.readAsDataURL(archivo);

        $(datosArchivo).on("load", function(event) {

            var rutaArchivo = event.target.result;

            $(".previsualizar").attr("src", rutaArchivo);
        })
    }

})

/*==================================
EDITAR AFILIADO
==================================*/

$(document).on("click", ".btnEditarAfiliado", function() {

    var idAfiliado = $(this).attr("idAfiliado");

    //console.log("idAfiliado", idAfiliado);

    var datos = new FormData();

    datos.append("idAfiliado", idAfiliado);

    $.ajax({

        url: "ajax/afiliados.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#editarNombres").val(respuesta["nombres"]);
            $("#editarApellidoP").val(respuesta["apellido_paterno"]);
            $("#editarApellidoM").val(respuesta["apellido_materno"]);
            $("#editarTipoDocumento").html(respuesta["tipo_documento"]);
            $("#editarTipoDocumento").val(respuesta["tipo_documento"]);
            $("#editarDocumentoId").val(respuesta["numero_documento"]);
            $("#editarEmail").val(respuesta["email"]);
            $("#editarCelular").val(respuesta["celular"]);
            $("#editarFijo").val(respuesta["telefono"]);
            $("#editarDireccion").val(respuesta["direccion"]);
            $("#editarBarrio").val(respuesta["barrio"]);
            $("#editarDepartamento").html(respuesta["departamento"]);
            $("#editarDepartamento").val(respuesta["departamento"]);
            $("#editarFechaNacimiento").val(respuesta["fecha_nacimiento"]);
            $("#actualPdf").val(respuesta["cedula"]);

            if (respuesta["cedula"] != "") {

                $(".previsualizar").attr("src", respuesta["cedula"]);
            }

        }
    });

})

/*==================================
VER AFILIADO
==================================*/

$(document).on("click", ".btnVerAfiliado", function() {

    var idAfiliado = $(this).attr("idAfiliado");

    var datos = new FormData();

    datos.append("idAfiliado", idAfiliado);

    $.ajax({

        url: "ajax/afiliados.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#verNombres").val(respuesta["nombres"]);
            $("#verApellidoP").val(respuesta["apellido_paterno"]);
            $("#verApellidoM").val(respuesta["apellido_materno"]);
            $("#verTipoDocumento").html(respuesta["tipo_documento"]);
            $("#verTipoDocumento").val(respuesta["tipo_documento"]);
            $("#verDocumentoId").val(respuesta["numero_documento"]);
            $("#verEmail").val(respuesta["email"]);
            $("#verCelular").val(respuesta["celular"]);
            $("#verFijo").val(respuesta["telefono"]);
            $("#verDireccion").val(respuesta["direccion"]);
            $("#verBarrio").val(respuesta["barrio"]);
            $("#verDepartamento").html(respuesta["departamento"]);
            $("#verDepartamento").val(respuesta["departamento"]);
            $("#verFechaNacimiento").val(respuesta["fecha_nacimiento"]);
            $("#actualPdf").val(respuesta["cedula"]);

            if (respuesta["cedula"] != "") {

                $(".previsualizar").attr("src", respuesta["cedula"]);
            }
        }
    });





})

/*==================================
ACTIVAR AFILIADO
==================================*/

$(document).on("click", ".btnActivarAf", function() {

    var idAfiliado = $(this).attr("idAfiliado");
    var estadoAfiliado = $(this).attr("estadoAfiliado");

    //console.log("idEps", idEps);

    var datos = new FormData();
    datos.append("activarId", idAfiliado);
    datos.append("activarAfiliado", estadoAfiliado);

    $.ajax({

        url: "ajax/afiliados.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: "El Afiliado ha sido actualizado",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "eps";
                    }
                });

            }

        }

    })

    if (estadoAfiliado == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoAfiliado', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoAfiliado', 0);

    }

})

/*==================================
REVISAR SI EXISTE AFILIADO
==================================*/

$("#nuevoDocumentoId").change(function() {

    $(".alert").remove();

    var afiliado = $(this).val();

    var datos = new FormData();
    datos.append("validarAfiliado", afiliado);

    $.ajax({
        url: "ajax/afiliados.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            if (respuesta) {

                $("#nuevoDocumentoId").parent().after('<div class="alert alert-warning">Este afiliado ya existe en la base de datos</div>');

                $("#nuevoDocumentoId").val("");

            }

        }

    })
})

/*==================================
ELIMINAR AFILIADO
==================================*/

$(document).on("click", ".btnEliminarAfiliado", function() {

    var idAfiliado = $(this).attr("idAfiliado");
    var cedula = $(this).attr("cedula");
    var numero_documento = $(this).attr("numero_documento");

    swal({
        title: '¿Está seguro de borrar el afiliado?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar afiliado!'
    }).then(function(result) {

        if (result.value) {

            window.location = "index.php?ruta=afiliados&idAfiliado=" + idAfiliado + "&numero_documento=" + numero_documento + "&cedula=" + cedula;

        }

    })

})


/*==================================
SUBIENDO ANTECEDENTE PDF DEL AFILIADO
==================================*/


$(".nuevoAntecedente").change(function() {

    var archivo = this.files[0];

    /*==================================
    Validar formato sea PDF
    ==================================*/

    if (archivo["type"] != "application/pdf") {
        $(".nuevoAntecedente").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato PDF!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else if (archivo["size"] > 200000000) {

        $(".nuevoAntecedente").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar mas de 20MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else {

        var datosArchivo = new FileReader;
        datosArchivo.readAsDataURL(archivo);

        $(datosArchivo).on("load", function(event) {

            var rutaArchivo = event.target.result;

            $(".previsualizar").attr("src", rutaArchivo);
        })
    }

})

/*==================================
AGREGAR ID AFILIADO
==================================*/

$(document).on("click", ".btnAgregarAnt", function() {

    var idAfiliado = $(this).attr("idAfiliado");

    //console.log("idAfiliado", idAfiliado);

    var datos = new FormData();

    datos.append("idAfiliado", idAfiliado);

    $.ajax({

        url: "ajax/beneficiarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#idAnt").val(respuesta["id"]);
            $("#numero_documento").val(respuesta["numero_documento"]);
        }
    });

})