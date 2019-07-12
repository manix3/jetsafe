<?php date_default_timezone_set( 'America/lima' ) ?>
  <!-- CONTENIDO -->


  <div class="content-wrap">


      <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
      <main id="content" class="content" role="main">

        <h1 class="page-title mb-xlg mt-lg">Bienvenido Jesus  <small> Tus Servicios del Dia</small> <small><div class="pull-right"><?= date('Y-m-d') ?></div></small> </h1>

        <div class="row" id="acces">

                    <div class="col-md-3 col-sm-6" id="boton1">
                        <section class="widget bg-primary text-white">
                            <div class="widget-body clearfix">
                                <div class="row">
                                    <div class="col-xs-3" >
                                        <span class="widget-icon">
                                            <i class="glyphicon glyphicon-globe"></i>
                                        </span>
                                    </div>
                                    <div class="col-xs-9">
                                        <h5 class="no-margin">TOTAL SERVICIOS DIA </h5>
                                        <p class="h2 no-margin fw-normal">0</p>
                                    </div>
                                </div>
                                <!--<div class="row">
                                    <div class="col-xs-6">
                                        <h5 class="no-margin">Registrations</h5>
                                        <p class="value4">+830</p>
                                    </div>
                                    <div class="col-xs-6">
                                        <h5 class="no-margin">Bounce Rate</h5>
                                        <p class="value4">4.5%</p>
                                    </div>
                                </div>-->
                            </div>
                        </section>
                    </div>
                    <div class="col-md-3 col-sm-6" id="boton2">
                        <section class="widget bg-info text-white">
                            <div class="widget-body clearfix">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <span class="widget-icon" >
                                            <i class=" glyphicon glyphicon-user"></i>
                                        </span>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="live-tile carousel ha" data-mode="carousel" data-speed="750" data-delay="3000" data-height="57" style="height: 57px;">
                                            <div class="slide ha active" style="transition-property: transform; transition-duration: 750ms; transition-timing-function: ease; transform: translate(0%, 0%) translateZ(0px);">
                                                <h5 class="no-margin">SERVICIOS PENDIENTES</h5>
                                                <p class="h2 no-margin fw-normal">0</p>
                                            </div>
                                            <div class="slide ha" style="transform: translate(0%, -100%) translateZ(0px); transition-duration: 750ms; transition-property: transform; transition-timing-function: ease;">
                                                <h5 class="no-margin">VISITS YESTERDAY</h5>
                                                <p class="h2 no-margin fw-normal">11,885</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="row">
                                    <div class="col-xs-6">
                                        <h5 class="no-margin">De HOY</h5>
                                        <div class="live-tile carousel ha" data-mode="carousel" data-speed="750" data-delay="3000" data-height="25" style="height: 25px;">
                                            <div class="slide ha active" style="transition-property: transform; transition-duration: 750ms; transition-timing-function: ease; transform: translate(0%, 0%) translateZ(0px);">
                                                <p class="value4">2</p>
                                            </div>
                                            <div class="slide ha" style="transform: translate(0%, -100%) translateZ(0px); transition-duration: 750ms; transition-property: transform; transition-timing-function: ease;">
                                                <p class="value4">20.1%</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <h5 class="no-margin">Pasados</h5>
                                        <div class="live-tile carousel ha" data-mode="carousel" data-speed="750" data-delay="3000" data-height="26" style="height: 26px;">
                                            <div class="slide ha active" style="transition-property: transform; transition-duration: 750ms; transition-timing-function: ease; transform: translate(0%, 0%) translateZ(0px);">
                                                <p class="value4">3</p>
                                            </div>
                                            <div class="slide ha" style="transform: translate(0%, -100%) translateZ(0px); transition-duration: 750ms; transition-property: transform; transition-timing-function: ease;">
                                                <p class="value4">2.3%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                            </div>
                        </section>
                    </div>
                    <div class="col-md-3 col-sm-6" id="boton3">
                        <section class="widget bg-gray text-white">
                            <div class="widget-body clearfix">
                                <div class="live-tile carousel ha" data-mode="carousel" data-speed="750" data-delay="3000" data-height="57" style="height: 57px;">

                                    <div class="fade-back">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <span class="widget-icon">
                                                    <i class="glyphicon glyphicon-ok-sign"></i>
                                                </span>
                                            </div>
                                            <div class="col-xs-9">
                                                <h5 class="no-margin">SERVICIOS EN PROGRESO</h5>
                                                <p class="h2 no-margin fw-normal">0</p>
                                            </div>
                                        </div>
                                        <!--<div class="row">
                                            <div class="col-xs-6">
                                                <h5 class="no-margin">Ultima Hora</h5>
                                                <p class="value4">7</p>
                                            </div>
                                            <div class="col-xs-6">
                                                <h5 class="no-margin">Ayer</h5>
                                                <p class="value4">145</p>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-3 col-sm-6" id="boton4">
                        <section class="widget bg-success text-white">
                            <div class="widget-body clearfix">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <span class="widget-icon">
                                            <i class="glyphicon glyphicon-remove-circle"></i>
                                        </span>
                                    </div>
                                    <div class="col-xs-9">
                                        <h5 class="no-margin">SERVICIOS ENTREGADO</h5>
                                        <p class="h2 no-margin fw-normal">0</p>
                                    </div>
                                </div>
                                <!--<div class="row">
                                    <div class="col-xs-6">
                                        <h5 class="no-margin">Ultimo Mes</h5>
                                        <p class="value4">141</p>
                                    </div>
                                    <div class="col-xs-6">
                                        <h5 class="no-margin">Ultima Semana</h5>
                                        <p class="value4">25</p>
                                    </div>
                                </div>-->
                            </div>
                        </section>
                    </div>
                </div>





            <div class="row"> <!-- Inicio tabla !-->
              <div class="col-md-12">
              <section class="widget">
                    <header>
                        <h4>SERVICIOS <span class="fw-semi-bold">REGISTRADOS</span></h4>
                          <a href="tcservicios/nuevo" class="btn btn-primary " id="newOrder" >Generar Orden de Trabajo</a>


                        <div class="widget-controls">
                            <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                            <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                            <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="widget-body">

                        <div class="mt" style="overflow-x: auto;"  id="tablaSee">
                          <table id="datatable-table" class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th>Id</th>

                                <th>Servicio</th>
                                <th class="no-sort hidden-xs">Placa</th>
                                <th class="hidden-xs">Modelo</th>
                                <th class="hidden-xs"> Color</th>
                                <th class="no-sort">Nombre</th>
                                <th class="no-sort">Fecha Servicio</th>
                                <th class="no-sort">Estado</th>
                                <th class="no-sort"></th>
                                <th class="no-sort"></th>

                                  <th class="no-sort"></th>

                                <th class="no-sort"></th>

                              </tr>
                            </thead>
                              <tbody id="grilladatos">

                              </tbody>
                          </table>
                        </div>
                    </div>
                </section>
              </div>
            </div> <!-- Fin tabla !-->



            <h2 class="page-title mb-xlg mt-lg">Reporte de servicios - <small> Ayer <?= date('Y-m-d', strtotime('yesterday')) ?></small> </h2>

            <div class="row">

              <div class="col-md-4">
                <section class="widget">
                      <header>
                          <h4>N° SERVICIOS <span class="fw-semi-bold">REGISTRADOS</span></h4>
                      </header>
                      <div class="widget-body">
                        <canvas id="donutLastDay" width="100" height="100"></canvas>
                      </div>
                 </section>
              </div>

              <div class="col-md-8">
                <section class="widget">
                  <header>
                      <h4>N° DE SERVICIOS POR <span class="fw-semi-bold">TIPO</span></h4>
                  </header>
                  <div class="widget-body"  style="max-height: 350px ">
                    <canvas id="barLastDay" height="130" ></canvas>
                  </div>
                </section>
              </div>




            </div>


            <h2 class="page-title mb-xlg mt-lg">Reporte de servicios - <small> Semana <?= date('Y-m-d',strtotime('monday this week')) ?> - <?= date('Y-m-d',strtotime('sunday')) ?></small> </h2>

            <div class="row">


              <div class="col-md-8">
                <section class="widget">
                  <header>
                      <h4>TOTAL SERVICIOS EN LA<span class="fw-semi-bold"> SEMANA</span></h4>
                  </header>
                  <div class="widget-body">
                      <canvas id="lineWeek" height="130" ></canvas>
                  </div>
                </section>
              </div>

              <div class="col-md-4">
                <section class="widget">
                      <header>
                          <h4>N° SERVICIOS <span class="fw-semi-bold">REGISTRADOS POR TIPO</span></h4>
                      </header>
                      <div class="widget-body">
                        <canvas id="donutWeek" height="300"></canvas>
                      </div>
                 </section>
              </div>

              <div class="col-md-12">
                <section class="widget">
                  <header>
                    <h4><span class="fw-semi-bold">%</span> de Ingresos</h4>
                  </header>
                  <div class="widget-body" style="max-height:350px;">
                      <canvas id="lineWeekPercent" height="90"></canvas>
                </div>
                  <div class="widget-footer">
                      <h2><strong>Total:</strong> S/ <span>180,345.00</span></h2>
                  </div>
                </section>
              </div>


            </div>



      </main>

  </div>

  <!-- CONTENIDO -->








<!--MODAL ELIMINAR-->
<div class="modal fade" id="myModalborrar" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <form id="frm_delete" class="form-horizontal form-label-left form1" data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="">Eliminar Orden de Trabajo</h3>
      </div>
      <div class="modal-body">


        <p>¿Esta seguro de eliminar esta Orden de trabajo?</p>

        <!-- <input id="nom" name="accion" class="form-control" placeholder="" readonly="true" value='xxx' type="hidden"> -->
        <input id="ide" name="ide" class="form-control" placeholder=""  value='' type="hidden">


      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary" id="btn_del">Si</button>
      </div>
    </div>
 </form>
  </div>
</div>
<!--MODAL ELIMINAR-->







<!-- CAN'T TOUCH THIS -->

<?php $this->load->view('includes/scripts') ?>

<!-- CAN'T TOUCH THIS -->


<script>

  const base_url = '<?= base_url() ?>'


  function jalar_data() {
  } // Fin Funcion jalar_data


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>js/j_tc_vista_dashboard_reportes.js"></script>
