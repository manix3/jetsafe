<!DOCTYPE html>
<html>
<head>
  <title>SMARTPYME NUEVA COTIZACION</title>
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
      <h3 class="page-title">Nueva <span class="fw-semi-bold">Cotización</span></h3>

      <!--Cotizacion-->
      <div class="row">
          <div class="col-md-12">
              <section class="widget" id="cotiza">
                <header>
                    <h4><span class="fw-semi-bold">Cotizacion</span></h4>
                </header>
                <div class="widget-body">
                  <form id="form_coti" class="form-horizontal form-label-left" data-abide="ajax" enctype="multipart/form-data" method="post" data-parsley-validate="" novalidate="">
                    <div class="row">
                      <div class="col-md-6">
                        <fieldset>
                          <div class="form-group formsinmargen">
                            <label class="col-sm-4 control-label" for="tooltip-enabled">
                              Estado
                              <span class="help-block">Estado de Cotizacion</span>
                            </label>
                            <div class="col-sm-8" id="est_coti_1">
                                <select class="select2 form-control" id="est_coti" name="est_coti" required="required">
                                </select>
                             </div>

                          </div>
                          <div class="form-group formsinmargen">
                            <label for="hint-field" class="col-sm-4 control-label">
                              Prefijo
                            </label>
                            <div class="col-sm-8">
                              <input type="text" placeholder="Prefijo" id="prefijo" name="prefijo" class="form-control"required="required"  value="<?= isset($pre[0]->prefijo) ? strtoupper($pre[0]->prefijo) : " " ?>">
                            </div>
                          </div>
                          <div class="form-group formsinmargen">
                            <label for="hint-field" class="col-sm-4 control-label">
                              Serie
                            </label>
                            <div class="col-sm-8">
                              <input type="text" placeholder="Serie" id="serie" name="serie" class="form-control" required="required"  value="<?= isset($pre[0]->serie) ? strtoupper($pre[0]->serie) : " " ?>">
                            </div>
                          </div>
                          <div class="form-group formsinmargen">
                            <label for="hint-field" class="col-sm-4 control-label">
                              Numero
                            </label>
                            <div class="col-sm-8">
                              <input type="number" placeholder="Numero" id="numero" name="numero" class="form-control" required="required" value="<?= isset($pre[0]->numero) ? $pre[0]->numero+1 : " " ?>">
                            </div>
                          </div>
                        </fieldset>
                      </div>
                      <div class="col-md-6">
                        <fieldset>
                          <div class="form-group formsinmargen">
                            <label class="col-sm-4 control-label" for="tooltip-enabled">
                              Moneda
                              <span class="help-block">Tipo de Moneda</span>
                            </label>
                            <div class="col-sm-8" id="mone">
                                <select class="select2 form-control" id="ide_tip_moneda" name="ide_tip_moneda" required="required">
                                </select>
                             </div>

                          </div>
                          <div class="form-group formsinmargen">
                            <label for="hint-field" class="col-sm-4 control-label">
                              Fecha

                            </label>
                            <div class="col-sm-8">
                              <input type="date" placeholder="" id="fecha_ini" name="fecha_ini" class="form-control"required="required" >
                            </div>
                          </div>
                          <div class="form-group formsinmargen">
                            <label for="hint-field" class="col-sm-4 control-label">
                              Fecha de vencimiento
                            </label>
                            <div class="col-sm-8">
                              <input type="date" placeholder="" id="fecha_fin" name="fecha_fin" class="form-control" required="required">
                            </div>
                          </div>
                          <div class="form-group formsinmargen">
                            <label for="hint-field" class="col-sm-4 control-label">
                              Glosa
                            </label>
                            <div class="col-sm-8">
                              <input type="text" placeholder="Glosa" id="glosa" name="glosa" class="form-control"  >
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



      <!--              CLIENTE                -->
        <div class="row">
          <div class="col-md-12">
          <section class="widget" id="cliente">
                <header>
                    <h4><span class="fw-semi-bold">Cliente</span></h4>
                    <button type="button" name="button" id="nuevoCliente">Nuevo Cliente</button>
                </header>
                <div class="widget-body">
                <form id="form_cli" class="form-horizontal form-label-left" data-abide="ajax" enctype="multipart/form-data" method="post" data-parsley-validate="" novalidate="">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="widget-body">

                            <fieldset>
                              <div class="form-group formsinmargen">
                                <label class="col-sm-4 control-label" for="tooltip-enabled">
                                  Nombre
                                  <span class="help-block">Nombre cliente</span>
                                </label>
                                <div class="col-sm-8" id="nombre_cli">
                                    <select class="select2 form-control" id="nom_cli" name="nom_cli" >
                                    </select>
                                 </div>

                              </div>

                              <div class="form-group formsinmargen">
                                <label for="hint-field" class="col-sm-4 control-label">
                                  Apellidos
                              <span class="help-block">Apellidos de  cliente</span>
                                </label>
                                <div class="col-sm-4">
                                  <input readonly="true" type="text" placeholder="Apellido Paterno" id="inp_ape_pat" name="inp_ape_pat" class="form-control" required="required" data-parsley-id="20">
                                </div>
                                <div class="col-sm-4 margensup">
                                  <input readonly="true" type="text" placeholder="Apellido Materno" id="inp_ape_mat" name="inp_ape_mat" class="form-control" data-parsley-id="22">
                                </div>
                              </div>
                              <div class="form-group formsinmargen">
                                <label for="hint-field" class="col-sm-4 control-label">
                                  Documento
                                  <span class="help-block">DNI/PASS</span>
                                </label>
                                <div class="col-sm-8">
                                  <input type="text" placeholder="" id="doc" name="doc" class="form-control"  readonly="true">
                                </div>
                              </div>
                              <div class="form-group formsinmargen">
                                <label for="hint-field" class="col-sm-4 control-label">
                                  EMAIL
                                   <span class="help-block">Ingrese su Email</span>
                                </label>
                                <div class="col-sm-8">
                                  <input readonly="true" type="email" placeholder="Ingrese su Correo" id="mail" name="mail" class="form-control" required="required" data-parsley-id="30">
                                </div>
                              </div>
                            </fieldset>
                          </form>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <fieldset>
                            <div class="form-group formsinmargen">
                              <label for="hint-field" class="col-sm-4 control-label">
                                RUC
                                <span class="help-block">RUC Cliente</span>
                              </label>
                              <div class="col-sm-8">
                                <input readonly="true" type="text" placeholder="" id="ruc" name="ruc" class="form-control">
                              </div>
                            </div>
                            <div class="form-group formsinmargen">
                              <label for="hint-field" class="col-sm-4 control-label">
                                DIRECCION
                                 <span class="help-block">Direccion Cliente</span>
                              </label>
                              <div class="col-sm-8">
                                <input readonly="true" type="text" placeholder="Ingrese Direccion Cliente" id="dir" name="dir" class="form-control" required="required" data-parsley-id="24">
                              </div>

                            </div>
                            <div class="form-group formsinmargen">
                              <label for="hint-field" class="col-sm-4 control-label">
                                TELEFONOS
                                 <span class="help-block">Telefono1/Telefono2</span>
                              </label>
                              <div class="col-sm-4">
                                <input readonly="true" type="tel" placeholder="Ingrese telefono 1" id="inp_tel_cli1" name="inp_tel_cli1" class="form-control" required="required" data-parsley-id="26">
                              </div>
                              <div class="col-sm-4 margensup">
                                <input readonly="true" type="tel" placeholder="Ingrese telefono 2" id="inp_tel_cli2" name="inp_tel_cli2" class="form-control" data-parsley-id="28">
                              </div>
                            </div>
                          </fieldset>
                        </div>
                      </div>
                    </div>
            </section>
          </div>
        </div>

      <!--              FIN CLIENTE                -->

      <!--              PRODUCTOS                -->

      <div class="row">
          <div class="col-md-12">
              <section class="widget" id="Productos">
                <header>
                    <h4><span class="fw-semi-bold">Producto</span></h4>
                </header>
                <div class="widget-body">
                    <form id="form_prod" class="" action="" method="post">
                      <fieldset>
                        <div class="form-group">
                          <div class="col-lg-6">
                            <select class="select2 form-control input-lg" id="list_prod_u" name="list_prod_u" disabled>
                            </select>
                            <input type="hidden" readonly="true" class="form-control input-lg" id="ide_prod_selected">
                          </div>
                          <div class="col-lg-2">
                            <input type="number"  class="form-control input-lg" placeholder="Precio" id="precio">
                          </div>
                          <div class="col-lg-2">
                            <input type="number" min="1" class="form-control input-lg" placeholder="Cantidad" id="cant">
                          </div>

                          <div class="col-lg-2 ">
                            <button type="button" name="button" class="btn btn-success btn-lg" id="add">+</button>
                            <button type="button" name="button" class="btn btn-warning btn-lg" id="_files"><i class="fa fa-file-text"></i></button>
                          </div>
                        </div>
                      </fieldset>
                    </form>

                </div>
              </section>
          </div>
      </div>
      <!--              FIN PRODUCTOS                -->


      <!--              LISTA DE PRODUCTOS                -->

      <div class="row">
          <div class="col-md-12">
              <section class="widget" >

                <div class="widget-body" id="L_Productos">
                  <header>
                      <h4><span class="fw-semi-bold">Lista</span></h4>
                  </header>

                </div>


                <div class="widget-footer" id="wfoot">

                </div>

                <div class="row">
                  <br>
                  <button type="button" class="btn btn-success btn-block" name="button" id="do">COTIZAR</button>
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
<script src="<?php echo base_url(); ?>js/coti/j_cot_vista_nueva_coti.js"></script>

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
                DOCUMENTO
                 <span class="help-block">DNI/CI/PASSPORT</span>
              </label>
              <div class="col-sm-8">
                <input type="text" placeholder="Ingrese # Documento" id="inp_doc_cli" name="inp_doc_cli" class="form-control" >
              </div>
            </div>
            <div class="form-group formsinmargen">
              <label for="hint-field" class="col-sm-4 control-label">
                NOMBRE
                 <span class="help-block">Nombre cliente</span>
              </label>
              <div class="col-sm-8">
                <input type="text" placeholder="Nombre cliente" id="inp_nom_cli" name="inp_nom_cli" class="form-control" required="required">
              </div>
            </div>
            <div class="form-group formsinmargen">
              <label for="hint-field" class="col-sm-4 control-label">
                APELLIDOS
                 <span class="help-block">Paterno/Materno</span>
              </label>
              <div class="col-sm-4">
                <input type="text"  placeholder="Apellido Paterno" id="inp_ape_pat" name="inp_ape_pat" class="form-control" required="required">
              </div>
              <div class="col-sm-4 margensup">
                <input type="text"  placeholder="Apellido Materno" id="inp_ape_mat" name="inp_ape_mat" class="form-control">
              </div>
            </div>
            <div class="form-group formsinmargen">
              <label for="hint-field" class="col-sm-4 control-label">
                Fecha
                 <span class="help-block">Fecha de nacimiento del Cliente</span>
              </label>
              <div class="col-sm-8">
                <input type="date"   id="inp_fech_nac" name="inp_fech_nac" class="form-control">
              </div>
            </div>
            <div class="form-group formsinmargen">
              <label for="hint-field" class="col-sm-4 control-label">
                DIRECCION
                 <span class="help-block">Direccion Cliente</span>
              </label>
              <div class="col-sm-8">
                <input type="text"  placeholder="Ingrese Direccion Cliente" id="inp_dir_cli" name="inp_dir_cli" class="form-control" >
              </div>

            </div>
            <div class="form-group formsinmargen">
              <label for="hint-field" class="col-sm-4 control-label">
                RUC
                 <span class="help-block">RUC del Cliente</span>
              </label>
              <div class="col-sm-8">
                <input type="text"  placeholder="Ingrese RUC " id="inp_ruc_cli" name="inp_ruc_cli" class="form-control" >
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
            <div class="form-group formsinmargen">
              <label for="hint-field" class="col-sm-4 control-label">
                Facebook
                 <span class="help-block">Facbook de Cliente</span>
              </label>
              <div class="col-sm-8">
                <input type="text" placeholder="Ingrese su Correo" id="inp_fb_cli" name="inp_fb_cli" class="form-control" >
              </div>
            </div>
            <div class="form-group formsinmargen">
              <label for="hint-field" class="col-sm-4 control-label">
                Twitter
                 <span class="help-block">Ususario de Twitter</span>
              </label>
              <div class="col-sm-8">
                <input type="text" placeholder="Ingrese su Correo" id="inp_twt_cli" name="inp_twt_cli" class="form-control" >
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
