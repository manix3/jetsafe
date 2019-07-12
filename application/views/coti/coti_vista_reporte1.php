<!DOCTYPE html>
<html>
<head>
  <title>PETRAX -Seguimiento de ventas</title>
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
    <link rel="stylesheet" href="<?= base_url() ?>css/propio.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

    <script>
        /* yeah we need this empty stylesheet here. It's cool chrome & chromium fix
         chrome fix https://code.google.com/p/chromium/issues/detail?id=167083
         https://code.google.com/p/chromium/issues/detail?id=332189
         */
    </script>
</head>
<body>
  <style media="screen">

    #mdl_width{
      width: 80% !important;
    }
  </style>
<!-- Menu Principal Izquierda !-->
      <?php $this->load->view('coti/menu/menu_izquierda'); ?>
<!-- Fin Principal Izquierda !-->

<!-- Menu Principal Izquierda !-->
<?php
$datos['nombre']=$sesion['nombre'];
$datos['empresa']=$sesion['empresa'];
$this->load->view('menu/menu_superior_petrax',$datos);
?>
<!-- Fin Principal Izquierda !-->


<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
    <main id="content" class="content" role="main">





        <div class="row"> <!-- Inicio tabla !-->
          <div class="col-md-12">
          <section class="widget">
                <header>
                    <h4><span class="fw-semi-bold">Seguimiento Clientes no atendidos</span></h4>

                </header>
                <div class="widget-body ">

                    <div class="mt " style="min-height: 200px;">
                      <div id="loader2" class="loader"></div>

                      <table id="datatable-table" class="table table-striped table-hover d-none ">
                        <thead>
                          <tr>
                            <th class="hidden-xs"width="40px">Id </th>
                                <th class="hidden-xs">Vendedor</th>
                            <th class="hidden-xs">Empresa</th>
                            <th class="hidden-xs">Gls</th>
                              <th class="hidden-xs">Contacto</th>
                            <th class="hidden-xs">Cargo</th>
                            <th class="hidden-xs">Telefono</th>
                            <th class="hidden-xs">Email</th>
                            <th class="hidden-xs">Ultimo Contacto</th>
                            <th class="hidden-xs">Proximo Contacto</th>

                            <th class="hidden-xs">Estado</th>

                            <th class="no-sort" width="10px"></th>
                            <th class="no-sort" width="10px"></th>
                            <th class="no-sort" width="10px"></th>
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


        <div class="row">
          <div class="col-md-12">
            <section class="widget">

              <header>
                <h3>Filtrar</h3>
              </header>
              <div class="widget-body">
                <div class="form-group" id="filtrar">
                  <select name="vendors" id="vendors" class="form-control">

                  </select>
                </div>
              </div>
            </section>
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



<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>





<script>

// Globales
var Gusuario=<?PHP echo $sesion['id']; ?>;
var Gentidad=<?PHP echo $sesion['ie']; ?>;
var Gruta='<?php echo base_url(); ?>';
//alert(Gruta);
var Gjd=0;

const hoy = '<?= Date('Y-m-d') ?>'

var date
var ses_vendedor;

function vermodal() {
  alert('hola');
    $('#myModalver').modal('show');
}

</script>

<script src="<?php echo base_url(); ?>js/coti/j_cot_vista_reporte1.js"></script>

<!-- Modal para ver Registro !-->
<div class="modal fade" id="myModalver" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog " id="mdl_width">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel">Detalle de Seguimiento</h3>

      </div>
      <div class="modal-body">


                <div class="row">
                  <div class="col-md-6 ">
                    <section class="">
                    <div class="">
                        <table class="table table-striped">
                          <tbody id="grilla_datos_cliente">

                          </tbody>
                        </table>

                      </div>
                    </section>
                    <hr>
                    <div class="" id="nw_ev" style="display:none;">
                        <form class=""  method="post" id="form_nw_eve">
                          <fieldset>
                              <legend>Nuevo evento de Seguimiento</legend>

                              <div class="form-group">
                                <input type="hidden" name="inp_text1" id="inp_text1" placeholder="Titulo" value=""  required="true"  class="form-control">
                              </div>

                              <div class="form-group" >
                                <div class="col-md-6">
                                  <label for="normal-field" class="col-sm-12 control-label" style=" margin-top: 20px;">Nombre de contacto </label>
                                  <input type="text" placeholder="Nombre de contacto" id="inp_nom_con" name="inp_nom_con" class="form-control" required="required"  value="">
                                </div>
                                <div class="col-md-6">
                                  <label for="normal-field" class="col-sm-12 control-label" style=" margin-top: 20px;">Funcion del contacto (Ej. Gerente comercial)</label>
                                  <div class="col-sm-12">
                                    <input type="text" placeholder="Ejm: Admistrador" id="inp_fun_con" name="inp_fun_con" class="form-control" required="required"  value="">
                                  </div>
                                </div>
                              </div>

                              <div class="form-group" >
                                <div class="col-md-6">
                                  <label for="normal-field" class="col-sm-12 control-label" style=" margin-top: 20px;">Telefono1 </label>
                                  <input type="number" placeholder="Ingrese telefono 1" id="inp_tel_con1" name="inp_tel_con1" class="form-control" required="required" data-parsley-id="26">
                                </div>

                                <div class="col-md-6">
                                  <label for="normal-field" class="col-sm-12 control-label" style=" margin-top: 20px;">Email</label>
                                  <div class="col-sm-12">
                                    <input type="text" placeholder="Email de contacto" id="inp_ema_con" name="inp_ema_con" class="form-control" required="required"  value="">
                                  </div>
                                </div>
                              </div>





                              <!-- <div class="form-group" >

                                <div class="col-md-6"><input type="text" name="inp_text2" id="inp_text2" placeholder="Titulo" value=""   required="true" class="form-control"></div>
                                <div class="col-md-6"><input type="text" name="inp_text3" id="inp_text3" placeholder="Estado" value=""   required="true" class="form-control"></div>
                              </div> -->


                              <div class="form-group" >
                                <div class="col-md-6">
                                  <label for="normal-field" class="col-sm-12 control-label" style=" margin-top: 20px;">Fecha </label>
                                  <input type="date" name="inp_text4" id="inp_text4"   value="" class="form-control"  required="true" readonly="true">
                                </div>
                                <div class="col-md-6">
                                    <label style=" margin-top: 20px;" for="normal-field" class="col-sm-12 control-label">Tipo de Primer Contacto</label>
                                      <select class="form-control" id="inp_text11" name="inp_text11">

                                      </select>
                                </div>
                              </div>


                              <div class="form-group" >

                                <div class="col-md-6">
                                  <label for="normal-field" class="col-sm-12 control-label" style=" margin-top: 20px;">Fecha proximo contacto</label>
                                  <div class="col-sm-12">
                                    <input type="text" name="inp_text10" id="inp_text10"  value="" class="form-control"  required="true" >
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label style=" margin-top: 20px;" for="normal-field" class="col-sm-12 control-label">Tipo de Contacto Futuro</label>

                                    <select class="form-control" id="inp_text12" name="inp_text12">

                                    </select>

                                </div>

                              </div>


                              <div class="form-group" >
                                <label style=" margin-top: 20px;" for="normal-field" class="col-sm-12 control-label">Prioridad</label>
                                <div class="col-sm-12">
                                  <select class="form-control" id="inp_text13" name="inp_text13">

                                  </select>
                                </div>
                              </div>


                              <div class="form-group" >
                                <div class="col-md-12">
                                  <label style=" margin-top: 20px;" for="normal-field" class="col-sm-12 control-label">Glosa</label>
                                  <textarea  name="inp_text5" id="inp_text5"  value="" class="form-control"></textarea>
                                </div>
                              </div>

                              <div class="form-group" >
                                <label style=" margin-top: 20px;" for="normal-field" class="col-sm-12 control-label">Recordarme en: <i>(Min)</i></label>
                                <div class="col-sm-12">
                                  <input type="number" name="inp_text14" id="inp_text14"  value="0" class="form-control"  required="true" >
                                </div>
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
                  <div class="col-md-6" style="overflow-y: auto" id="esp_seguimiento">

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

<!-- Modal para ver Registro  no sirve !-->

<!--Inicio  Modal  Editar !-->
<div class="modal fade" id="myModaledita" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <form id="for_edi_seg" class="form-horizontal form-label-left form1" data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModaleditaLabel">Datos Estado Evento</h3>
      </div>
      <div class="modal-body">
        <input id="accion" name="accion" class="form-control" placeholder="" readonly="true" value='xxx' type="hidden">

          <fieldset>

            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">ID Seguimiento</label>
              <div class="col-sm-7">
                <input id="inp_text1" name="inp_text1" class="form-control" placeholder="" readonly="true" value='xxx' type="text">
              </div>
            </div>
            <div class="form-group">
              <label for="normal-field" class="col-sm-4 control-label">Vendedor</label>
              <div class="col-sm-7">
                <select name="vendedor" id="vendedor" class="form-control">

                </select>
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
        <h3 class="modal-title" id="">Eliminar Cotizacion</h3>
      </div>
      <div class="modal-body">


        <p>¿Esta seguro de eliminar esta Cotizacion?</p>

        <input id="nom" name="accion" class="form-control" placeholder="" readonly="true" value='xxx' type="hidden">
        <input id="ide_cot" name="ide_cot" class="form-control" placeholder=""  value='' type="hidden">


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


</body>

</html>
