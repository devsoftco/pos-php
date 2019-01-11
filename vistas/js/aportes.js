/*==================================
ACTIVAR PAGO
==================================*/

$(document).on("click", ".btnActivarPagoAfi", function() {

    var idAfiliacion = $(this).attr("idAfiliacion");

    console.log("idAfiliacion", idAfiliacion);

    var datos = new FormData();

    datos.append("idAfiliacion", idAfiliacion);

    $.ajax({

        url: "ajax/aportes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#afiliado").val(respuesta["afiliado"]);
            $("#documento").val(respuesta["documento"]);
            $("#total_pagar").val(respuesta["tarifa"]);
            $("#afiliacion_id").val(respuesta["afiliacion_id"]);




        }
    });


})


/*==================================
ACTIVAR PAGO
==================================*/

$(document).on("click", ".btnActivarPagoAfi2", function() {

    var idAfiliacion = $(this).attr("idAfiliacion");
    var estadoAfiliacion = $(this).attr("estadoAfiliacion");

    //console.log("idAfiliacion", idAfiliacion);

    var datos = new FormData();
    datos.append("activarId", idAfiliacion);
    datos.append("activarPagoAfi", estadoAfiliacion);

    $.ajax({

        url: "ajax/aportes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: "El usuario ha sido actualizado",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function(result) {
                    if (result.value) {

                        window.location = "usuarios";

                    }

                });

            }


        }

    })

    if (estadoAfiliacion == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoAfiliacion', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoAfiliacion', 0);



        swal({
            title: "Afiliacion ha sido activada, ahora puede imprimir el comprobante",
            type: "success",
            confirmButtonText: "¡Cerrar!"
        }).then(function(result) {
            if (result.value) {

                window.location = "aportes-afiliacion";

            }

        });



    }

})

/*==================================
VER AFILIADO
==================================*/

$(document).on("click", ".btnPagoAporte", function() {

    var idAfiliadoA = $(this).attr("idAfiliadoA");

    console.log("idAfiliadoA", idAfiliadoA);

    var datos = new FormData();

    datos.append("idAfiliadoA", idAfiliadoA);

    $.ajax({

        url: "ajax/aportes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#afiliado").val(respuesta["afiliado"]);
            $("#documento").val(respuesta["documento"]);
            $("#periodo").val(respuesta["periodo"]);
            $("#arl_id").val(respuesta["arl_id"]);
            $("#arl_tarifas_id").val(respuesta["arl_tarifas_id"]);
            $("#tarifa_arl").val(respuesta["tarifa_arl"]);
            $("#tarifa_por_dia_arl").val(respuesta["tarifa_por_dia_arl"]);
            $("#eps_id").val(respuesta["eps_id"]);
            $("#tarifa_eps").val(respuesta["tarifa_eps"]);
            $("#tarifa_por_dia_eps").val(respuesta["tarifa_por_dia_eps"]);
            $("#afp_id").val(respuesta["afp_id"]);
            $("#tarifa_afp").val(respuesta["tarifa_afp"]);
            $("#tarifa_por_dia_afp").val(respuesta["tarifa_por_dia_afp"]);
            $("#caja_compensaciones_id").val(respuesta["caja_compensaciones_id"]);
            $("#tarifa_ccf").val(respuesta["tarifa_ccf"]);
            $("#tarifa_por_dia_ccf").val(respuesta["tarifa_por_dia_ccf"]);
            $("#tarifa_adm").val(respuesta["tarifa_administracion"]);
            $("#tarifa_cree").val(respuesta["tarifa_cree"]);
            $("#tarifa_ibc").val(respuesta["tarifa_ibc"]);
            $("#afiliacion_id").val(respuesta["afiliacion_id"]);

            if (respuesta["afp_id"] != 0) {

                var valor_afp = Number($('#tarifa_afp').val());

            } else {

                var valor_afp = 0;
            }

            if (respuesta["caja_compensaciones_id"] != 0) {

                var valor_ccf = Number($('#tarifa_ccf').val());

            } else {

                var valor_ccf = 0;
            }

            if (respuesta["arl_id"] != 0) {

                var valor_arl = Number($('#tarifa_arl').val());

            } else {

                var valor_arl = 0;
            }

            if (respuesta["dias_afiliacion"] != 1) {

                var dias = 30 - Number((respuesta["dias_afiliacion"]) - 1);

                $("#tarifa_arl").val(Math.ceil((respuesta["tarifa_por_dia_arl"]) * Number(dias)));
                $("#tarifa_eps").val(Math.ceil((respuesta["tarifa_por_dia_eps"]) * Number(dias)));
                $("#tarifa_afp").val(Math.ceil((respuesta["tarifa_por_dia_afp"]) * Number(dias)));
                $("#tarifa_ccf").val(Math.ceil((respuesta["tarifa_por_dia_ccf"]) * Number(dias)));

                var total = Number(valor_arl) + Number($('#tarifa_eps').val()) + Number(valor_afp) + Number(valor_ccf) + Number($('#tarifa_adm').val()) + Number($('#tarifa_cree').val());

                var totalPagar = Math.ceil(Number(total) / 100) * 100;


                $("#total_pagar").val(Number(totalPagar));
                $("#dias").val(Number(dias));



            } else {




                $("#tarifa_arl").val(respuesta["tarifa_arl"]);
                $("#tarifa_eps").val(respuesta["tarifa_eps"]);
                $("#tarifa_afp").val(respuesta["tarifa_afp"]);
                $("#tarifa_ccf").val(respuesta["tarifa_ccf"]);
                $("#tarifa_ibc").val(respuesta["tarifa_ibc"]);

                var total = Number(valor_arl) + Number($('#tarifa_eps').val()) + Number(valor_afp) + Number(valor_ccf) + Number($('#tarifa_adm').val()) + Number($('#tarifa_cree').val());

                var totalPagar = Math.ceil(Number(total) / 1000) * 1000;


                $("#total_pagar").val(Number(totalPagar) - 300);
                $("#dias").val(30);


            }


        }
    });


})

/*==================================
IMPRIMIR PAGO AFILIACION
==================================*/

$(".tablas").on("click", ".btnImprimirFacturaAfi", function() {

    var pagoAfi = $(this).attr("idPagoAfi");

    window.open("extensiones/tcpdf/pdf/afiliacion.php?pagoAfi=" + pagoAfi, "_blank");
})

/*==================================
IMPRIMIR PAGO APORTE
==================================*/

$(".tablas").on("click", ".btnImprimirFacturaApo", function() {

    var pagoApo = $(this).attr("idPagoApo");

    window.open("extensiones/tcpdf/pdf/aporte.php?pagoApo=" + pagoApo, "_blank");
})