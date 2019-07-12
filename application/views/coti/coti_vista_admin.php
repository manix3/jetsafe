<!DOCTYPE html>
<html>
<head>
  <title>SEGUIMIENTO</title>
    <link href="<?php echo base_url(); ?>css/ol/ol.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/ol/ol3-layerswitcher.css" rel="stylesheet">
          <link href="<?php echo base_url(); ?>css/ol/ol-popup.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/application.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/propio.css" rel="stylesheet">

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
<style media="screen">

.arrastrable{
  z-index: 10;
  margin-bottom: 10px;
  border: solid 1px #e0e0e0;
  background-color: #fff;
  cursor: pointer;
}
.widget-body {
  z-index: 0;
  padding-bottom: 70%;

}

.suelta{
  padding-bottom: 9em;
}

  #mdl_width{
    width: 80% !important;
  }


  #footer {
  background-color: #252525;
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 100px;
  /* margin-left: 12%; */
  /* box-shadow: 20px -4px 14px 0px #000; */
  color: #fff;
  /* z-index: 0; */
  display: none;
  }


  #trash{
    text-align: center;
    margin: 10% 6%;
    font-size: 28px;
    padding: 2px;
    /* width: 200px; */
    /* height: 50%; */
    /* margin-left: 36%; */
    border-radius: 10px;
    background-color: #ec0707;
    /* transform: scale(1.2); */
  }

</style>
<!-- Menu Principal Izquierda !-->
      <?php $this->load->view('coti/menu/menu_izquierda'); ?>
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


        <div class="row">


          <div class="col-md-4">
            <section class="widget">
              <header>
                <h4><span class="fw-semi-bold">E</span>mitido</h4>
              </header>
              <div class="widget-body">
                <div class="suelta">
                  <ul id="3" class="news-list stretchable" >

                  </ul>
                </div>
              </div>
            </section>
          </div>


          <div class="col-md-4">
              <section class="widget">
                <header>
                    <h4><span class="fw-semi-bold">P</span>roceso</h4>
                </header>
                <div class="widget-body">
                  <div class="suelta">
                  <ul class="news-list stretchable" id="1" >

                  </ul>
                </div>

                </div>
            </section>
          </div>



          <div class="col-md-4">
            <section class="widget">
              <header>
                  <h4><span class="fw-semi-bold">L</span>ogrado</h4>
              </header>
              <div class="widget-body">
                  <div class="suelta">
                    <ul id="2" class="news-list stretchable" >

                    </ul>
                  </div>
              </div>
            </section>
          </div>

        </div>
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
<script src="<?php echo base_url(); ?>jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>jquery-ui/touch.min.js"></script>
<!-- <script src="vendor/fullcalendar/fullcalendar.js"></script> -->






<script>

// Globales
var Gusuario=<?PHP echo $sesion['id']; ?>;
var Gentidad=<?PHP echo $sesion['ie']; ?>;
var Gruta='<?php echo base_url(); ?>';
//alert(Gruta);
var Gjd=0;



function vermodal() {
    $('#myModalver').modal('show');
}



</script>
<script src="<?php echo base_url(); ?>js/coti/j_cot_vista_admin.js"></script>
<script src="<?php echo base_url(); ?>js/propios.js"></script>
<!-- <script src="<?php echo base_url(); ?>js/coti/calendar_cot.js"></script> -->

<!-- Modal para ver Registro !-->
<div class="modal fade" id="myModalver" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog " id="mdl_width">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel">Detalle de Cotización</h3>

      </div>
      <div class="modal-body">

        <div class="clearfix">
            <ul id="tabs1" class="nav nav-tabs pull-left"> <!-- remove pull-left to get a cool effect too -->
                <li class="active" id="tab1_li"><a href="#tab1" data-toggle="tab" aria-expanded="true">Detalle</a></li>
                <!-- <li class="" id="tab2_li"><a href="#tab2" data-toggle="tab" aria-expanded="false">Calendario</a></li> -->
                <!-- <li class="" id="tab3_li"><a href="#tab3" data-toggle="tab" aria-expanded="false">Otros</a></li> -->
            </ul>
          </div>
          <div id="tabs1c" class="tab-content mb-lg">
            <div class="tab-pane clearfix active" id="tab1">
                <div class="row">
                  <div class="col-md-6 ">
                    <section class="">
                    <div class="">
                        <table class="table table-striped">
                          <tbody id="grilla_datos_cliente">

                          </tbody>
                        </table>
                        <legend>Productos</legend>
                        <table class="table table-striped" style="overflow-y: auto">
                          <thead>
                              <th>#</th>
                              <th>Nombre</th>
                              <th>Cant</th>
                              <th>Precio</th>
                              <th>Total</th>
                          </thead>
                          <tbody id="grid_prod">

                          </tbody>
                        </table>
                      </div>
                    </section>
                    <hr>
                  </div>
                  <div class="col-md-6" style="overflow-y: auto" id="esp_seguimiento">

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6" style="overflow-y: auto">

                    <div class="" id="meh">
                      <h4>SubTotal:  <span id="s"></span></h4>
                      <h4>IGV: <span id="i"></span></h4>
                      <h4>Total <span id="t"></span></h4>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="" id="nw_ev" style="display:none;">
                        <form class="" action="index.html" method="post" id="form_nw_eve">
                          <fieldset>
                              <legend>Nuevo evento</legend>
                              <div class="form-group">
                                <input type="hidden" name="inp_text1" id="inp_text1" placeholder="Titulo" value=""  required="true"  class="form-control">
                              </div>
                              <div class="form-group">
                                <input type="text" name="inp_text2" id="inp_text2" placeholder="Titulo" value=""   required="true" class="form-control">
                              </div>
                              <div class="form-group">
                                <input type="text" name="inp_text3" id="inp_text3" placeholder="Estado" value=""   required="true" class="form-control">
                              </div>
                              <div class="form-group">
                                <input type="date" name="inp_text4" id="inp_text4"  value="" class="form-control"  required="true" >
                              </div>
                              <div class="form-group">
                                <textarea  name="inp_text5" id="inp_text5"  value="" class="form-control"></textarea>
                              </div>
                          </fieldset>
                      </div>
                      <div class="pull-right">
                        <div class="" id="ef_1">
                          <br>
                          <button type="button" name="button" class="btn btn-primary" id="btn_nw_ev">Nuevo Evento</button>
                        </div>
                        <div class="" id="ef_2" style="display:none">
                          <br>
                          <button type="button" name="button" class="btn btn-default" id="clse">Cerrar</button>
                          <button type="submit" name="button" class="btn btn-primary" id="">Guardar</button>
                        </form>
                        </div>

                      </div>
                  </div>
                </div>
            </div>
            <div class="tab-pane clearfix " id="tab2">
              <!-- <legend>Agenda de negocio</legend>
              <section class="widget">
                        <div class="widget-body">
                            <div class="calendar-controls">
                                <div class="btn-group ">
                                    <button class="btn btn-default" id="calender-prev"><i class="fa fa-angle-left"></i></button>
                                    <button class="btn btn-default" id="calender-next"><i class="fa fa-angle-right"></i></button>
                                </div>
                                <div id="calendar-switcher" class="btn-group pull-right" data-toggle="buttons">
                                  <?php  if ($sesion['nivel'] < 2) {   ?>
                                      <span class="fa fa-pencil"></span>
                                  <?php } ?>
                                </div>
                            </div>
                            <div id="calendar" class="calendar"></div>
                        </div>
                    </section> -->
            </div>
            <div class="tab-pane clearfix " id="tab3">

            </div>
          </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
<!--Fin Modal para ver Registro !-->




<!--Inicio  Modal  Editar !-->
<div class="modal fade" id="myModaledita" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <form id="" class="form-horizontal form-label-left form1" data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModaleditaLabel">Datos Estado Evento</h3>
      </div>
      <div class="modal-body">
        <input id="accion" name="accion" class="form-control" placeholder="" readonly="true" value='xxx' type="hidden">

          <fieldset>

            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Id</label>
              <div class="col-sm-7">
                <input id="inp_text1" name="inp_text1" class="form-control" placeholder="" readonly="true" value='xxx' type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Nombre</label>
              <div class="col-sm-12">
                <input id="inp_text2" name="inp_text2" class="form-control" placeholder="" required="required" value='sss' type="text">

              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Simbolo</label>
              <div class="col-sm-7">
                <input id="inp_text3" name="inp_text3" class="form-control" placeholder="" required="required" value='sss' type="text">

              </div>
            </div>


          </fieldset>




      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </form>


  </div>
</div>
<!--Fin Modal Editar !-->

<!--MODAL ELIMINAR-->

<div class="modal fade" id="myModalborrar" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <form id="" class="form-horizontal form-label-left form1" data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="">Eliminar detalle de Movimineto</h3>
      </div>
      <div class="modal-body">


        <p>¿Esta seguro de eliminar este Detalle?</p>

        <input id="nom" name="accion" class="form-control" placeholder="" readonly="true" value='xxx' type="hidden">
        <input id="ide" name="ide" class="form-control" placeholder=""  value='' type="hidden">


      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Si</button>
      </div>
    </div>
 </form>
  </div>
</div>
<!--MODAL ELIMINAR-->




<!--MODAL DE EL CALENDARIO-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-border">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title fw-bold mt" id="myModalLabel17">Edit Event</h4>
            </div>
            <div class="modal-body">
                <p>One fine body…</p>
            </div>
            <div class="modal-footer no-border">
                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-border">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title fw-bold mt" id="myModalLabel18">Nueva Actividad</h4>
                <p class="fs-mini text-muted mt-sm">
                    Ingrese los detalles de la actividad
                </p>
            </div>
            <div class="modal-body bg-gray-lighter">
                <div class="form-group">
                  <label for="">Tipo de Actividad</label><br>
                  <div class="row">
                    <div class="col-lg-3">
                      <label for="cd">
                          <div class="fc-event fc-event-hori fc-event-draggable fc-event-start fc-event-end ui-draggable ui-draggable-handle" style="left: 719px; background-color: #3275e6; color: #fff; height:23px; top: 42px;" unselectable="on">
                            <div class="fc-event-inner">
                              <span class="fc-event-title">Clase Diaria</span>
                            </div>
                            <div class="ui-resizable-handle ui-resizable-e">
                            &nbsp;&nbsp;&nbsp;
                          </div>
                        </div>
                      </label>
                        <input type="radio" id="cd" class="form-control input-no-border" name="tipo" value="cd" style="display:none;">
                    </div>
                    <div class="col-lg-3">
                      <label for="cp">
                        <div class="fc-event fc-event-hori fc-event-draggable fc-event-start fc-event-end ui-draggable ui-draggable-handle" style="left: 719px; background-color: #4bb343; color: #fff; height:23px; top: 42px;" unselectable="on">
                          <div class="fc-event-inner">
                            <span class="fc-event-title">Campeonato</span>
                          </div>
                          <div class="ui-resizable-handle ui-resizable-e">
                          &nbsp;&nbsp;&nbsp;
                        </div>
                      </div>
                    </label>
                        <input type="radio" id="cp" class="form-control input-no-border" name="tipo" value="cp" style="display:none;">
                    </div>
                    <div class="col-lg-3">
                      <label for="pt">
                        <div class="fc-event fc-event-hori fc-event-draggable fc-event-start fc-event-end ui-draggable ui-draggable-handle" style="left: 719px; background-color: #503cc3; color: #fff; height:23px; top: 42px;" unselectable="on">
                          <div class="fc-event-inner">
                            <span class="fc-event-title">Curso</span>
                          </div>
                          <div class="ui-resizable-handle ui-resizable-e">
                          &nbsp;&nbsp;&nbsp;
                        </div>
                      </div></label>
                        <input type="radio" id="pt" class="form-control input-no-border" name="tipo" value="pt" style="display:none;">
                    </div>
                    <div class="col-lg-3">
                      <label for="ot">
                        <div class="fc-event fc-event-hori fc-event-draggable fc-event-start fc-event-end ui-draggable ui-draggable-handle" style="left: 719px; background-color: #ca4141; color: #fff; height:23px; top: 42px;" unselectable="on">
                          <div class="fc-event-inner">
                            <span class="fc-event-title">Otro</span>
                          </div>
                          <div class="ui-resizable-handle ui-resizable-e">
                          &nbsp;&nbsp;&nbsp;
                        </div>
                      </div>
                      </label>
                    <input type="radio" id="ot" class="form-control input-no-border" name="tipo" value="ot" style="display:none;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="event-name">Nombre</label>
                    <input type="text" id="event-name" class="form-control input-no-border" placeholder="Nombre de la actividad">
                </div>
                <div class="form-group">
                  <label for="event-name">Entrada</label>
                    <input type="time" id="entrada" class="form-control input-no-border" placeholder="Hora de Entrada">
                </div>
                <div class="form-group">
                  <label for="event-name">Salida</label>
                    <input type="time" id="salida" class="form-control input-no-border" placeholder="Hora de Salida">
                </div>
                <div class="form-group">
                  <label for="event-name">Lugar</label>
                    <select type="time" id="lug" class="form-control input-no-border" placeholder="Hora de Salida"></select>
                </div>
                <div class="form-group">
                  <label for="event-name">Grupo <button type="button" name="button" id="nwg" class="btn btn-primary btn-xs mb-xs">+</button>  </label>
                  <div class="" style="display: none;" id="ngp">
                    <select id="prof" class="form-control " ></select><br>
                    <select id="cat" class="form-control " ></select><br>
                    <input type="text" id="nv_grup" class="form-control " placeholder="Nuevo grupo"><br>
                  </div>
                    <select id="grup" class="form-control input-no-border" ></select>
                </div>
                <div class="form-group" id="pg" style="display: none;">
                  <label for="event-name">Pago</label>
                    <input  id="nwpg" class="form-control input-no-border" placeholder="Pago">
                </div>
                <div class="form-group">
                  <label for="event-name">Descripcion</label>
                    <textarea  id="des" class="form-control input-no-border" placeholder="Descripcion"> </textarea>
                </div>
                <div class="form-group">
                  <label for="event-name">url</label>
                    <input type="text" id="url" class="form-control input-no-border" placeholder="Link dela Actividad">
                </div>
            </div>
            <div class="modal-footer no-border">
                <button data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button data-dismiss="modal" id="create-event" class="btn btn-success">OK</button>
            </div>
        </div>
    </div>
</div>

<!--MODAL DE EL CALENDARIO-->


</body>

</html>
