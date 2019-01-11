/*==================================
LIMPIAR CAMPOS MODAL
==================================*/

$('.modal').on('hidden.bs.modal', function() {
    $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
    $("label.error").remove(); //lo utilice para borrar la etiqueta de error del jquery validate
    $(".alert").remove();
});

/*==================================
SUBIENDO CEDULA PDF DEL BENEFICIARIO
==================================*/


$(".cedulaPdfBen").change(function() {

    var archivo = this.files[0];

    /*==================================
    Validar formato sea PDF
    ==================================*/

    if (archivo["type"] != "application/pdf") {
        $(".cedulaPdfBen").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato PDF!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else if (archivo["size"] > 200000000) {

        $(".cedulaPdfBen").val("");

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

            var rutaArchivo = "vistas/img/beneficiarios/default/imagen_pdf.png";

            $(".previsualizar").attr("src", rutaArchivo);
        })
    }

})

/*==================================
SUBIENDO DOCUMENTOS PDF DEL BENEFICIARIO
==================================*/


$(".nuevoPdf2").change(function() {

    var archivo2 = this.files[0];

    /*==================================
    Validar formato sea PDF
    ==================================*/

    if (archivo2["type"] != "application/pdf") {
        $(".nuevoPdf2").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato PDF!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else if (archivo2["size"] > 200000000) {

        $(".nuevoPdf2").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar mas de 20MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else {

        var datosArchivo2 = new FileReader;
        datosArchivo2.readAsDataURL(archivo2);

        $(datosArchivo2).on("load", function(event) {

            var rutaArchivo2 = "vistas/img/beneficiarios/default/imagen_pdf.png";

            $(".previsualizar2").attr("src", rutaArchivo2);
        })
    }

})

/*==================================
EDITAR BENEFICIARIO
==================================*/

$(document).on("click", ".btnEditarBeneficiario", function() {

    var idBeneficiario = $(this).attr("idBeneficiario");

    var datos = new FormData();

    datos.append("idBeneficiario", idBeneficiario);

    $.ajax({

        url: "ajax/beneficiarios.ajax.php",
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
            $("#editarTipoParentesco").html(respuesta["parentesco"]);
            $("#editarTipoParentesco").val(respuesta["parentesco"]);
            $("#editarTipoDocumento").html(respuesta["tipo_documento"]);
            $("#editarTipoDocumento").val(respuesta["tipo_documento"]);
            $("#editarDocumentoId").val(respuesta["numero_documento"]);
            $("#cedActualPdf").val(respuesta["cedula"]);
            $("#docActualPdf").val(respuesta["documentos"]);

            if (respuesta["cedula"] != "") {

                $rutaCedula = "vistas/img/beneficiarios/default/imagen_pdf.png";

                $(".previsualizar").attr("src", $rutaCedula);

            } else {

                $rutaCedula = "vistas/img/beneficiarios/default/upload.png";

                $(".previsualizar").attr("src", $rutaCedula);

            }

            if (respuesta["documentos"] != "") {

                $rutaArchivo = "vistas/img/beneficiarios/default/imagen_pdf.png";

                $(".previsualizarDoc").attr("src", $rutaArchivo);

            } else {

                $rutaArchivo = "vistas/img/beneficiarios/default/upload.png";

                $(".previsualizarDoc").attr("src", $rutaArchivo);

            }
        }
    });

})

/*==================================
ACTIVAR BENEFICIARIO
==================================*/

$(document).on("click", ".btnActivarBen", function() {

    var idBeneficiario = $(this).attr("idBeneficiario");
    var estadoBeneficiario = $(this).attr("estadoBeneficiario");

    //console.log("idEps", idEps);

    var datos = new FormData();
    datos.append("activarId", idBeneficiario);
    datos.append("activarBeneficiario", estadoBeneficiario);

    $.ajax({

        url: "ajax/beneficiarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: "El Beneficiario ha sido actualizado",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "beneficiarios";
                    }
                });

            }

        }

    })

    if (estadoBeneficiario == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoBeneficiario', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoBeneficiario', 0);

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
ELIMINAR BENEFICIARIO
==================================*/

$(document).on("click", ".btnEliminarBeneficiario", function() {

    var idBeneficiario = $(this).attr("idBeneficiario");
    var cedula = $(this).attr("cedula");
    var documentos = $(this).attr("documentos");
    var numero_documento = $(this).attr("numero_documento");

    swal({
        title: '¿Está seguro de borrar el beneficiario?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar beneficiario!'
    }).then(function(result) {

        if (result.value) {

            window.location = "index.php?ruta=beneficiarios&idBeneficiario=" + idBeneficiario + "&numero_documento=" + numero_documento + "&cedula=" + cedula + "&documentos=" + documentos;

        }

    })

})

/*==================================
AGREGAR ID AFILIADO
==================================*/

$(document).on("click", ".btnAgregarBen", function() {

    var idAfiliado = $(this).attr("idAfiliado");

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

            $("#id").val(respuesta["id"]);
        }
    });

})