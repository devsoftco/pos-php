/*==================================
VER AFILIADO
==================================*/

$(document).on("click", ".btnAfiliar", function() {

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

            $("#verId").val(respuesta["id"]);
            $("#verNombres").val(respuesta["nombres"]);
            $("#verApellidoP").val(respuesta["apellido_paterno"]);
            $("#verApellidoM").val(respuesta["apellido_materno"]);
            $("#verTipoDocumento").html(respuesta["tipo_documento"]);
            $("#verTipoDocumento").val(respuesta["tipo_documento"]);
            $("#verDocumentoId").val(respuesta["numero_documento"]);
            $("#verTipo_Afiliado").val(respuesta["tipo_afiliado"]);

        }
    });


})

/*=================================
AGREGAR ID AFILIADO
==================================*/

$(document).on("click", ".btnAgregarRetiro", function() {

    var idAfiliacion = $(this).attr("idAfiliacion");
    var numero_documento = $(this).attr("numero_documento");

    console.log("idAfiliacion", idAfiliacion);
    console.log("numero_documento", numero_documento);

    var datos = new FormData();

    datos.append("idAfiliacion", idAfiliacion);

    $.ajax({

        url: "ajax/afiliaciones.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#idAfiliacion").val(respuesta["id"]);
            $("#numero_documento").val(respuesta["numero_documento"]);


        }
    });

})

/*=================================
AGREGAR ID AFILIADO
==================================*/

$(document).on("click", ".btnAgregarActivacion", function() {

    var idAfiliacion = $(this).attr("idAfiliacion");
    var numero_documento = $(this).attr("numero_documento");

    console.log("idAfiliacion", idAfiliacion);
    console.log("numero_documento", numero_documento);

    var datos = new FormData();

    datos.append("idAfiliacion", idAfiliacion);

    $.ajax({

        url: "ajax/afiliaciones.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#idAfiliacion2").val(respuesta["id"]);
            $("#numero_documento2").val(respuesta["documento"]);

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: '¿Está seguro de borrar el usuario?',
                    text: "¡Si no lo está puede cancelar la accíón!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, borrar usuario!'
                }).then(function(result) {

                    if (result.value) {

                        window.location = "aportes-afiliacion";

                    }

                })


            }
        }
    });

})