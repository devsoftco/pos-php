<?php

$afiliaciones = ControladorAfiliaciones::ctrMostrarCantidadAfiliaciones();
$totalAfiliaciones = ControladorAportes::ctrMostrarCantidadAfiliacionesMes();
$totalAportes = ControladorAportes::ctrMostrarCantidadAportesPorPagar();


?>


<div class="col-lg-3 col-xs-6">

    <!-- small box -->

    <div class="small-box bg-aqua">

        <div class="inner">

            <h3><?php echo $afiliaciones["total_afiliaciones"]; ?></h3>

            <p>Afiliaciones Activas</p>

        </div>

        <div class="icon">

            <i class="ion ion-person"></i>

        </div>

            <a href="afiliaciones" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>

        </div>

    </div>

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">

          <!-- small box -->

            <div class="small-box bg-green">

                <div class="inner">

                    <h3><?php echo $totalAfiliaciones["total_pago_afiliaciones"]; ?></h3>

                    <p>Total por Afiliaciones</p>

                </div>

                <div class="icon">

                    <i class="ion ion-stats-bars"></i>

                </div>

                <a href="aportes-afiliacion" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

        </div>

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-yellow">

                <div class="inner">

                    <h3><?php echo $totalAportes["por_pagar"]; ?></h3>

                    <p>Afiliados por Pagar</p>
                </div>

                <div class="icon">

                    <i class="ion ion-person-add"></i>

                </div>

                <a href="aportes" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

        </div>

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">

            <!-- small box -->

            <div class="small-box bg-red">

                <div class="inner">

                    <h3>65</h3>

                    <p>Afiliados </p>

                </div>

                <div class="icon">

                    <i class="ion ion-pie-graph"></i>

                </div>

                <a href="afiliados" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>

            </div>

        </div>