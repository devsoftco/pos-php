/*==================================
AFILIACION
==================================*/

$(document).on("click", ".btnAfiliar", function() {

    var idAfiliado = $(this).attr("idAfiliado");

    window.location = "index.php?ruta=crear-afiliacion&idAfiliado=" + idAfiliado;


})