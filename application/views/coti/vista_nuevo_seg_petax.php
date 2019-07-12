<!DOCTYPE html>
<html>
<head>
  <title>Petrax Seguimiento de ventas</title>
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

<!-- Menu Principal Izquierda !-->
      <?php $this->load->view('coti/menu/menu_izquierda'); ?>
<!-- Fin Principal Izquierda !-->

<!-- Menu Principal Izquierda !-->
<?php
$datos['nombre']=$sesion['nombre'];
$datos['empresa']=$sesion['empresa'];
$this->load->view('menu/menu_superior',$datos);
?>






<div class="content-wrap">


    <main id="content" class="content" role="main">





      <!--              CLIENTE                -->
        <div class="row">
          <div class="col-md-12">
          <section class="widget" id="cliente">
                <header>
                    <h4><span class="fw-semi-bold">Cliente</span></h4>
                    <button type="button" name="button" id="nuevoCliente">Nuevo Cliente</button>
                </header>
                <div class="widget-body">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="widget-body">
                            <form id="form_cli" class="form-horizontal form-label-left" data-abide="ajax" enctype="multipart/form-data" method="post" data-parsley-validate="" novalidate="">

                            <fieldset>
                              <div class="form-group formsinmargen">
                                <label class="col-sm-4 control-label" for="tooltip-enabled">
                                  CLIENTE

                                </label>
                                <div class="col-sm-8" id="nombre_cli">
                                    <select class="select2 form-control" id="nom_cli" name="nom_cli" >
                                    </select>
                                 </div>

                              </div>



                            </fieldset>
                          </form>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="widget-body">
                            <form id="form_ven" class="form-horizontal form-label-left" data-abide="ajax" enctype="multipart/form-data" method="post" data-parsley-validate="" novalidate="">

                            <fieldset>
                              <div class="form-group formsinmargen">
                                <label class="col-sm-4 control-label" for="tooltip-enabled">
                                  VENDEDOR
                                  </label>
                                <div class="col-sm-8" id="nombre_cli">
                                    <select class="select2 form-control" id="nom_ven" name="nom_ven" >
                                    </select>
                                 </div>

                              </div>


                            </fieldset>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
            </section>
          </div>
        </div>
      <!--              FIN CLIENTE                -->




      <!--Cotizacion-->
      <div class="row">
          <div class="col-md-12">
              <section class="widget" id="cotiza">
                <header>
                    <h4><span class="fw-semi-bold">DATOS DE SEGUIMIENTO</span></h4>
                </header>
                <div class="widget-body">
                  <form id="form_coti" class="form-horizontal form-label-left" data-abide="ajax" enctype="multipart/form-data" method="post" data-parsley-validate="" novalidate="">
                    <div class="row">
                      <div class="col-md-6">
                        <fieldset>
                          <div class="form-group formsinmargen">
                            <label class="col-sm-4 control-label" for="tooltip-enabled">
                              Nombre de Contacto
                              <span class="help-block">Nombre de Contacto</span>
                            </label>
                            <div class="col-sm-8" id="">
                              <input type="text" placeholder="Nombre de contacto" id="inp_nom_con" name="inp_nom_con" class="form-control" required="required"  value="">
                             </div>

                          </div>

                          <div class="form-group formsinmargen">
                            <label class="col-sm-4 control-label" for="tooltip-enabled">
                              Funcion
                              <span class="help-block">Funcion de Contacto</span>
                            </label>
                            <div class="col-sm-8" id="">
                              <input type="text" placeholder="Ejm: Admistrador" id="inp_fun_con" name="inp_fun_con" class="form-control" required="required"  value="">
                             </div>

                          </div>

                          <div class="form-group formsinmargen">
                            <label for="hint-field" class="col-sm-4 control-label">
                              TELEFONOS
                               <span class="help-block">Telefono1/Telefono2</span>
                            </label>
                            <div class="col-sm-4">
                              <input type="number" placeholder="Ingrese telefono 1" id="inp_tel_con1" name="inp_tel_con1" class="form-control" required="required" data-parsley-id="26">
                            </div>
                            <div class="col-sm-4 margensup">
                              <input type="number" placeholder="Ingrese telefono 2" id="inp_tel_con2" name="inp_tel_con2" class="form-control" data-parsley-id="28">
                            </div>
                          </div>

                          <div class="form-group formsinmargen">
                            <label for="hint-field" class="col-sm-4 control-label">
                              Email
                              <span class="help-block">Email de contacto</span>
                            </label>
                            <div class="col-sm-8">
                              <input type="text" placeholder="Email de contacto" id="inp_ema_con" name="inp_ema_con" class="form-control" required="required"  value="">
                            </div>
                          </div>

                        </fieldset>
                      </div>
                      <div class="col-md-6">
                        <fieldset>

                          <div class="form-group formsinmargen">
                            <label for="hint-field" class="col-sm-4 control-label">
                              Origen
                              <span class="help-block">Origen de Contacto</span>

                            </label>
                            <div class="col-sm-8">
                              <select class="select2 form-control" id="ide_ori_cot" name="ide_ori_cot" required="required">

                              </select>
                            </div>
                          </div>

                          <div class="form-group formsinmargen">
                            <label class="col-sm-4 control-label" for="tooltip-enabled">
                              Estado
                              <span class="help-block">Estado de prioridad</span>
                            </label>
                            <div class="col-sm-8" id="est_coti_1">
                                <select class="select2 form-control" id="est_coti" name="est_coti" required="required">
                                </select>
                             </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>
                  </form>
                </div>
              </section>
          </div>
      </div>
      <!--Cotizacion-->



      <!--              LISTA DE PRODUCTOS                -->

      <div class="row">
          <div class="col-md-12">
              <section class="widget" >
                <div class="row">
                  <br>
                  <button type="button" class="btn btn-success btn-block" name="button" id="do">Crear</button>
                  <br>
                </div>
              </section>
          </div>
      </div>
      <!--              FIN LISTA DE PRODUCTOS                -->

    </main>
</div>



<!--MODAL ELIMINAR-->





































































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

<!-- Select 2 !-->
<script src="<?php echo base_url(); ?>vendor/jquery-autosize/jquery.autosize.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap3-wysihtml5/lib/js/wysihtml5-0.3.0.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap3-wysihtml5/src/bootstrap3-wysihtml5.js"></script>
<script src="<?php echo base_url(); ?>vendor/select2/select2.min.js"></script>

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
<script src="<?php echo base_url(); ?>js/propios.js"></script>
<script src="<?php echo base_url(); ?>js/coti/j_cot_vista_nueva_coti_petrax.js"></script>




<!-- Modal para ver Registro !-->
<div class="modal fade" id="myModalver" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel">Datos detalle de movimiento</h3>

      </div>
      <div class="modal-body">


        <table class="table table-striped">

            <tbody id="detalle_registro">

            </tbody>
        </table>



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
    <div class="modal-content">
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
              <div class="col-sm-7">
                <input id="inp_text2" name="inp_text2" class="form-control" placeholder="" required="required" value='sss' type="text">

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

<div class="modal fade" id="files_modal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <form id="" class="form-horizontal form-label-left form1" data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="">Agregar Archivos</h3>
      </div>
      <div class="modal-body">
        <input id="nom" name="accion" class="form-control" placeholder="" readonly="true" value='xxx' type="hidden">
        <input id="ide" name="ide" class="form-control" placeholder=""  value='' type="hidden">

          <legend>Archivos</legend>
          <div class="" id="chk_files">

          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="add_files">Agregar</button>
      </div>
    </div>
 </form>
  </div>
</div>
<!--MODAL ELIMINAR-->




<!--Inicio  Modal  Editar !-->
<div class="modal fade" id="modalnuevoCliente" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog ">
    <form id="form2" class="form-horizontal form-label-left form1" data-abide="ajax" enctype="multipart/form-data" method="post"  data-parsley-validate="" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="">Nuevo Cliente</h3>
      </div>
      <div class="modal-body">
        <input id="accion" name="accion" class="form-control" placeholder="" readonly="true" value='xxx' type="hidden">
        <input id="inp_text1" name="inp_text1" class="form-control" placeholder="" readonly="true"  type="hidden">

          <fieldset>

            <div class="form-group formsinmargen">
              <label for="hint-field" class="col-sm-4 control-label">
                RUC
                 <span class="help-block">DNI/CI/PASSPORT/RUC</span>
              </label>
              <div class="col-sm-8">
                <input type="text" placeholder="Ingrese # Documento" id="inp_doc_cli" name="inp_doc_cli" class="form-control" >
              </div>
            </div>
            <div class="form-group formsinmargen">
              <label for="hint-field" class="col-sm-4 control-label">
                RAZON SOCIAL
                 <span class="help-block">Nombre/Razon Social</span>
              </label>
              <div class="col-sm-8">
                <input type="text" placeholder="Nombre cliente" id="inp_nom_cli" name="inp_nom_cli" class="form-control" required="required">
              </div>
            </div>

            <div class="form-group formsinmargen">
              <label for="hint-field" class="col-sm-4 control-label">
                TELEFONOS
                 <span class="help-block">Telefono1/Telefono2</span>
              </label>
              <div class="col-sm-4">
                <input type="tel" placeholder="Ingrese telefono 1" id="inp_tel_cli1" name="inp_tel_cli1" class="form-control" >
              </div>
              <div class="col-sm-4 margensup">
                <input type="tel" placeholder="Ingrese telefono 2" id="inp_tel_cli2" name="inp_tel_cli2" class="form-control" >
              </div>

            </div>

            <div class="form-group formsinmargen">
              <label for="hint-field" class="col-sm-4 control-label">
                EMAIL
                 <span class="help-block">Ingrese su Email</span>
              </label>
              <div class="col-sm-8">
                <input type="email" placeholder="Ingrese su Correo" id="inp_ema_cli" name="inp_ema_cli" class="form-control" >
              </div>
            </div>


            <div class="form-group margensup">

              <div class="col-sm-12">
                <textarea rows="4" placeholder="Glosa" class="form-control" name="gls_obs_cli" id="gls_obs_cli" ></textarea>
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


</body>

</html>
