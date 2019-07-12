<!DOCTYPE html>
<html>
<head>
    <title>SIAM - Sistema de Seguridad Ciudadana  </title>
    <link href="css/ol/ol.css" rel="stylesheet">
        <link href="css/ol/ol3-layerswitcher.css" rel="stylesheet">
          <link href="css/ol/ol-popup.css" rel="stylesheet">
    <link href="css/application.min.css" rel="stylesheet">
    <link href="css/propio.css" rel="stylesheet">

        <!-- as of IE9 cannot parse css files with more that 4K classes separating in two files -->
    <!--[if IE 9]>
        <link href="css/application-ie9-part2.css" rel="stylesheet">
    <![endif]-->
    <link rel="shortcut icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <script>
        /* yeah we need this empty stylesheet here. It's cool chrome & chromium fix
         chrome fix https://code.google.com/p/chromium/issues/detail?id=167083
         https://code.google.com/p/chromium/issues/detail?id=332189
         */
    </script>
</head>
<body>
<!--
  Main sidebar seen on the left. may be static or collapsing depending on selected state.

    * Collapsing - navigation automatically collapse when mouse leaves it and expand when enters.
    * Static - stays always open.
-->
<!-- Menu Principal Izquierda !-->
      <?php $this->load->view('menu/menu_izquierda'); ?>
<!-- Fin Principal Izquierda !-->

<!-- Menu Principal Izquierda !-->
      <?php
      $datos['nombre']=$sesion['nombre'];
      $datos['empresa']=$sesion['empresa'];
$this->load->view('menu/menu_superior',$datos);
      ?>
<!-- Fin Principal Izquierda !-->


<div class="content-wrap">


    <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
    <main id="content" class="content" role="main">
<?php print_r($sesion); ?>
        <div class="row">
            <div class="col-md-8 contienemapa">
              <div class="input-group mt barrasuperior">
                  <input type="text" class="form-control" placeholder="Buscar Map">
                  <span class="input-group-btn">
                      <button type="submit" class="btn btn-default">
                          <i class="fa fa-search text-gray"></i>
                      </button>

                      <a  class="btn btn-default" id="BtnAddEvento" >
                          <i class="fa fa-map-marker text-gray"></i> Agregar Evento
                      </a>

                  </span>
              </div>
                <!-- minimal widget consist of .widget class. note bg-transparent - it can be any background like bg-gray,
                bg-primary, bg-white -->
                <section class="widget bg-transparent contienemapa2">
                    <!-- .widget-body is a mostly semantic class. may be a sibling to .widget>header or .widget>footer -->
                    <div class="widget-body">
                        <div id="map" >


                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                              <div class="clearfix">
                                  <ul id="tabs1" class="nav nav-tabs pull-left"> <!-- remove pull-left to get a cool effect too -->
                                      <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">Estadisticas</a></li>
                                      <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">Registro</a></li>
                                      <!-- <li class="dropdown">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Seguimiento <b class="caret"></b></a>
                                          <ul class="dropdown-menu">
                                              <li class=""><a href="#tab3" tabindex="-1" data-toggle="tab" aria-expanded="false">@fat</a></li>
                                              <li class=""><a href="#tab4" tabindex="-1" data-toggle="tab" aria-expanded="false">@mdo</a></li>
                                          </ul>
                                      </li>
                                  </ul> -->
                              </div>
                              <div id="tabs1c" class="tab-content mb-lg">
                                  <div class="tab-pane clearfix active" id="tab1">
                                      <section class="widget bg-transparent">
                                          <header>
                                              <h4>
                                                Estadisticas
                                                  <span class="fw-semi-bold">ONLINE</span>
                                              </h4>
                                              <div class="widget-controls widget-controls-hover">
                                                  <a href="#"><i class="glyphicon glyphicon-cog"></i></a>
                                                  <a href="#"><i class="fa fa-refresh"></i></a>
                                                  <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                                              </div>
                                          </header>
                                          <div class="widget-body">
                                              <p>
                                                  <span class="circle bg-warning"><i class="fa fa-map-marker"></i></span>
                                                <span id="nroeve">  350 </span> Eventos Registrados
                                              </p>

                                              <div id="div_stats" >

                                              </div>
                                              <!-- <div class="row progress-stats">
                                                  <div class="col-sm-9">
                                                      <h5 class="name">Eventos de Emergencia</h5>
                                                      <p class="description deemphasize">Accidentes, Violencia, Hurto</p>
                                                      <div class="progress progress-sm js-progress-animate bg-white">
                                                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                               data-width="60%"
                                                               aria-valuemax="100" style="width: 0;">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-3 text-align-center">
                                                      <span class="status rounded rounded-lg bg-body-light">
                                                          <small><span id="percent-1">75</span>%</small>
                                                      </span>
                                                  </div>
                                              </div>
                                              <div class="row progress-stats">
                                                  <div class="col-sm-9">
                                                      <h5 class="name">Eventos de Transito</h5>
                                                      <p class="description deemphasize">Accidentes, choques, semaforos</p>
                                                      <div class="progress progress-sm js-progress-animate bg-white">
                                                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="39"
                                                               data-width="39%"
                                                               aria-valuemin="0" aria-valuemax="100" style="width: 0;">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-3 text-align-center">
                                                      <span class="status rounded rounded-lg bg-body-light">
                                                          <small><span  id="percent-2">84</span>%</small>
                                                      </span>
                                                  </div>
                                              </div>
                                              <div class="row progress-stats">
                                                  <div class="col-sm-9">
                                                      <h5 class="name">Eventos Seguridad Ciudadana</h5>
                                                      <p class="description deemphasize">Ruidos molestos, Ambulantes</p>
                                                      <div class="progress progress-sm js-progress-animate bg-white">
                                                          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80"
                                                               data-width="80%"
                                                               aria-valuemin="0" aria-valuemax="100" style="width: 0;">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-3 text-align-center">
                                                      <span class="status rounded rounded-lg bg-body-light">
                                                          <small><span id="percent-3">92</span>%</small>
                                                      </span>
                                                  </div>
                                              </div> -->
                                              <h5 class="fw-semi-bold mt">Unidades Disponibles</h5>
                                              <p>Tracking: <strong>Active</strong></p>
                                              <p>
                                                  <span class="circle bg-warning"><i class="fa fa-cog"></i></span>
                                                  50 Vehiculos , 60 Motos
                                              </p>

                                          </div>
                                      </section>


                                  </div>
                                  <div class="tab-pane" id="tab2">





                                                        <div class="widget-body">
                                                            <form id="form1" class="form-horizontal form-label-left" data-abide="ajax" enctype="multipart/form-data" method="post"
                                                                  data-parsley-validate="" >
                                                                <fieldset>
                                                                    <legend><strong>Datos de</strong> Evento</legend>
                                                                    <div class="form-group formsinmargen">
                                                                        <label for="datepicker2i" class="col-sm-4 control-label">
                                                                            Fecha y Hora
                                                                        </label>
                                                                                  <div class="col-sm-8">
                                                                        <div id="datetimepicker2" class="input-group">
                                                                            <input id="datepicker2i" name="datepicker2i" type="text" class="form-control" required="required" />
                                                                            <span class="input-group-addon">
                                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                                            </span>

                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="form-group formsinmargen">
                                                                        <label for="normal-field" class="col-sm-2 control-label">latitud</label>
                                                                        <div class="col-sm-4">
                                                                            <input type="text" id="inp_lat" name="inp_lat" class="form-control" placeholder="">
                                                                        </div>
                                                                        <label for="hint-field" class="col-sm-2 control-label">
                                                                            Longitud
                                                                        </label>
                                                                        <div class="col-sm-4">
                                                                            <input type="text" id="inp_lon" name="inp_lon" class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group formsinmargen">
                                                                        <label class="col-sm-4 control-label" for="tooltip-enabled">Evento</label>
                                                                        <div class="col-sm-8">
                                                                          <select data-placeholder="Which galaxy is closest to Milky Way?"
                                                                                  data-width="auto"
                                                                                  data-minimum-results-for-search="10"
                                                                                  tabindex="-1"
                                                                                  class="select2 form-control" id="sel_tip_eve" name="sel_tip_eve" required="required">
                                                                              <option value=""></option>
                                                                              <option value="Magellanic">Large Magellanic Cloud</option>
                                                                              <option value="Andromeda">Andromeda Galaxy</option>
                                                                              <option value="Sextans">Sextans A</option>
                                                                          </select>                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group formsinmargen">
                                                                        <label class="col-sm-4 control-label" for="tooltip-enabled">Entidad </label>
                                                                        <div class="col-sm-8">
                                                                          <select data-placeholder="Which galaxy is closest to Milky Way?"
                                                                                  data-width="auto"
                                                                                  data-minimum-results-for-search="10"
                                                                                  tabindex="-1"
                                                                                  class="select2 form-control" id="sel_ent_eve" name="sel_ent_eve" required="required">
                                                                              <option value=""></option>
                                                                              <option value="Magellanic">Large Magellanic Cloud</option>
                                                                              <option value="Andromeda">Andromeda Galaxy</option>
                                                                              <option value="Sextans">Sextans A</option>
                                                                          </select>                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group formsinmargen">
                                                                        <label for="hint-field" class="col-sm-4 control-label">
                                                                            Documento
                                                                            <!-- <span class="help-block">Dni/pasaporte/otro</span> -->
                                                                        </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" id="inp_dni" name="inp_dni" class="form-control" required="required">
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group formsinmargen">
                                                                        <label for="hint-field" class="col-sm-4 control-label">
                                                                            Nombre
                                                                            <!-- <span class="help-block">Dni/pasaporte/otro</span> -->
                                                                        </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" id="inp_name" name="inp_name" class="form-control" required="required">
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group formsinmargen">
                                                                        <label for="hint-field" class="col-sm-4 control-label">
                                                                            Apellidos
                                                                            <!-- <span class="help-block">Dni/pasaporte/otro</span> -->
                                                                        </label>
                                                                        <div class="col-sm-4">
                                                                            <input type="text" id="inp_apelpat" name="inp_apelpat" class="form-control" required="required">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <input type="text" id="inp_apelmat" name="inp_apelmat" class="form-control" required="required">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group formsinmargen">
<input type="hidden" id="inp_ide_ciu" name="inp_ide_ciu" class="form-control" >
                                                                        <div class="col-sm-12">
                                                                            <textarea rows="4" class="form-control" name="gls_evento" id="gls_evento" required="required"></textarea>
                                                                          </div>
                                                                    </div>



                                                                </fieldset>
                                                                <div class="form-actions">
                                                                    <div class="row">
                                                                        <div class=" col-sm-12">
                                                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                                            <button type="button" class="btn btn-inverse">Cancelar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>


                                  </div>

                              </div>







            </div>
        </div>


        <div class="row"> <!-- Inicio tabla !-->
          <div class="col-md-12">
          <section class="widget">
                <header>
                    <h4>Eventos <span class="fw-semi-bold">Registrados</span></h4>
                    <div class="widget-controls">
                        <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                        <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </header>
                <div class="widget-body">

                    <div class="mt">
    <?php $this->load->view('reusables/tabla_eventos1'); ?>
                    </div>
                </div>
            </section>
          </div>
        </div> <!-- Fin tabla !-->
          <div class="row" id="div_stats_bottom">
          </div>


    </main>
</div>
<!-- The Loader. Is shown when pjax happens -->
<div class="loader-wrap hiding hide">
    <i class="fa fa-circle-o-notch fa-spin-fast"></i>
</div>

<!-- common libraries. required for every page-->
<script src="<?php echo base_url(); ?>vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery-pjax/jquery.pjax.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/transition.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/collapse.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/button.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/alert.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/modal.js"></script>
<script src="<?php echo base_url(); ?>vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/widgster/widgster.js"></script>
<script src="<?php echo base_url(); ?>vendor/pace.js/pace.js" data-pace-options='{ "target": ".content-wrap", "ghostTime": 1000 }'></script>
<script src="<?php echo base_url(); ?>vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>

<!-- common app js -->
<script src="<?php echo base_url(); ?>js/settings.js"></script>
<script src="<?php echo base_url(); ?>js/app.js"></script>
<script src="<?php echo base_url(); ?>js/propios.js"></script>
<!-- page specific libs -->
<script id="test" src="<?php echo base_url(); ?>vendor/underscore/underscore.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery.sparkline/index.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery.sparkline/index.js"></script>
<script src="<?php echo base_url(); ?>vendor/d3/d3.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/rickshaw/rickshaw.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/parsleyjs/dist/parsley.min.js"></script>

<script src="<?php echo base_url(); ?>js/ol/ol.js"></script>
<script src="<?php echo base_url(); ?>js/ol/ol-popup.js"></script>
<script src="<?php echo base_url(); ?>js/ol/ol3-layerswitcher.js"></script>

<script src="<?php echo base_url(); ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery-autosize/jquery.autosize.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap3-wysihtml5/lib/js/wysihtml5-0.3.0.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap3-wysihtml5/src/bootstrap3-wysihtml5.js"></script>
<script src="<?php echo base_url(); ?>vendor/select2/select2.min.js"></script>

<script src="<?php echo base_url(); ?>vendor/jasny-bootstrap/js/inputmask.js"></script>
<script src="<?php echo base_url(); ?>vendor/jasny-bootstrap/js/fileinput.js"></script>
<script src="<?php echo base_url(); ?>vendor/holderjs/holder.js"></script>
<script src="<?php echo base_url(); ?>vendor/dropzone/dist/min/dropzone.min.js"></script>



<script src="<?php echo base_url(); ?>vendor/datatables/media/js/jquery.dataTables.js"></script>
<!-- <script src="<?php echo base_url(); ?>https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
<script src="<?php echo base_url(); ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>




<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/popover.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap_calendar/bootstrap_calendar/js/bootstrap_calendar.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery-animateNumber/jquery.animateNumber.min.js"></script>
<!--
<script src="<?php echo base_url(); ?>http://maps.google.com/maps/api/js?key=AIzaSyD3U7UcjNTdj-DTdJBfI2PlPNvrrVVN8h8&v=3.2"></script>
!-->
<!-- page specific js -->
<script src="<?php echo base_url(); ?>vendor/bootstrap-sass/assets/javascripts/bootstrap/tab.js"></script>
<!-- Formularios !-->
<script src="<?php echo base_url(); ?>vendor/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

<!-- Mensajes de Alerta !-->
<script src="<?php echo base_url(); ?>vendor/underscore/underscore-min.js"></script>
<script src="<?php echo base_url(); ?>vendor/backbone/backbone.js"></script>
<script src="<?php echo base_url(); ?>vendor/messenger/build/js/messenger.js"></script>
<script src="<?php echo base_url(); ?>vendor/messenger/build/js/messenger-theme-flat.js"></script>
<script src="<?php echo base_url(); ?>vendor/messenger/docs/welcome/javascripts/location-sel.js"></script>


<script>
var agregaEve=false;

// Globales
var Gusuario=<?PHP echo $sesion['id']; ?>;
var Gentidad=<?PHP echo $sesion['ie']; ?>;
var Gruta='<?php echo base_url(); ?>';
var Gjd=1;


function tipo_icono(ti) { // Function que crea los Iconos de los Eventos

var icono='';

  switch (ti)
              {
                <?php   foreach ($iconos as $ico):?>
                 case '<?php echo $ico->ide_t_e; ?>':icono='<?php echo $ico->img_eve; ?>';
                 break;
              <?php endforeach;  ?>

                 default:  icono='sos.png'
              }
              return icono;


}


</script>
<script src="<?php echo base_url(); ?>js/index.js"></script>

<!-- Inicio Modal !-->
<div class="modal fade" id="ModalSeguimiento" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">DETALLES DEL EVENTO</h4>
      </div>
      <div class="modal-body">
<!-- Ingresamos Tabs Evento !-->
<?php $this->load->view('reusables/tabs_edicion_evento'); ?>

<!-- FIN Tabs Evento !-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-inverse" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal !-->
<!-- Inicio Modal !-->
<div class="modal fade" id="ModalVer" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">DETALLES DEL EVENTO</h4>
      </div>
      <div class="modal-body">
<!-- Ingresamos Tabs Evento !-->
<?php $this->load->view('reusables/tabs_ver_evento'); ?>

<!-- FIN Tabs Evento !-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-inverse" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal !-->
</body>
</html>
